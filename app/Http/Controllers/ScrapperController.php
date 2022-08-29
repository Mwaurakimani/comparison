<?php

namespace App\Http\Controllers;

use App\Models\Preference;
use App\Models\Search;
use Goutte\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Lib\Scraper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ScrapperController extends Controller
{
    public function scrapper(Request $request)
    {
        $search_term = $request['term'];
        $filter = $request['filter'];

        if (Auth::user()) {
            $search = $this->add_search($search_term);
        }

        $term = Str::of($search_term)->slug('-');

        $links = [
            [
                "link" => "http://eccomerceone.local/?search=${term}",
                "card_selector" => ".content-display > .product-card",
                "title_tag" => "h4",
                "product_description_tag" => "p",
                "price_tag" => "p",
                "product_image_selector" => ".product-image > img"
            ],
            [
                "link" => "http://eccomercetwo.local/?search=${term}",
                "card_selector" => ".content-display > .product-card",
                "title_tag" => "h4",
                "product_description_tag" => "p",
                "price_tag" => "p",
                "product_image_selector" => ".product-image > img"
            ],//
            [
                "link" => "https://www.jumia.co.ke/catalog/?q=${term}",
                "card_selector" => ".core",
                "title_tag" => ".name",
                "price_tag" => ".prc",
                "product_image_selector" => ".img-c > img",
                "tagger" => true
            ],
        ];

        $scraper = new Scraper(new Client());

        $items = $scraper->handle($links);


        if (Auth::user()) {
            $search->items_found = count($items['data']);
            $search->save();

            $items['data'] = $this->apply_pref_filter($items);

            if($filter != null){
                switch ($filter){
                    case "price-descending":
                        $items['data'] = $this->sort_by_price("Highest-Lowest", collect($items['data']));
                        break;
                    case "A-Z":
                        $items['data'] = $this->sort_by_alphabet("A-Z", collect($items['data']));
                        break;
                    case "Z-A":
                        $items['data'] = $this->sort_by_alphabet("Z-A", collect($items['data']));
                        break;
                    default:
                        $items['data'] = $this->sort_by_price("Lowest-highest", collect($items['data']));
                        break;
                }
            }
        }else{

            $items['data'] = $this->sort_by_price("Lowest-highest", collect($items['data']));

            if($filter != null){
                switch ($filter){
                    case "price-descending":
                        $items['data'] = $this->sort_by_price("Highest-Lowest", collect($items['data']));
                        break;
                    case "A-Z":
                        $items['data'] = $this->sort_by_alphabet("A-Z", collect($items['data']));
                        break;
                    case "Z-A":
                        $items['data'] = $this->sort_by_alphabet("Z-A", collect($items['data']));
                        break;
                    default:
                        $items['data'] = $this->sort_by_price("Lowest-highest", collect($items['data']));
                        break;
                }
            }
        }

        return $items;

    }

    public function add_search($search_term)
    {
        $search = new Search();

        $search->term = $search_term;
        $search->items_found = 0;
        $search->user_id = Auth::user()->id;

        $search->save();

        return $search;
    }

    public function apply_pref_filter($items)
    {
        $data = $items['data'];
        $data = collect($data);
        $collection = $data;

        $price_pref = Preference::where('user_id', Auth::user()->id)->where('key', 'Price')->get();

        if (count($price_pref) > 0) {
            $collection = $this->sort_by_price($price_pref[0]->option, $data);
        }

        $alphabet_pref = Preference::where('user_id', Auth::user()->id)->where('key', 'alphabetic')->get();

        if (count($alphabet_pref) > 0) {
            $collection = $this->sort_by_alphabet($alphabet_pref[0]->option, $data);
        }

        return ($collection);
    }

    public function sort_by_price($price_option, $collection)
    {

        //sanitize data
        $collection = $collection->map(function ($item, $index) {

            $price = strtoupper($item['price']);
            $price = preg_replace('/[A-Z]+/', '', $price);

            $price = (int)$price;

            $item['price'] = $price;

            return $item;

        });

        //sort
        $data_match =  match ($price_option) {
            'Highest-Lowest' =>$collection->sortByDesc('price'),
            default =>$collection->sortBy('price'),
        };

        $arr = [];

        collect($data_match)->map(function ($item,$key) use (&$arr) {
            array_push($arr,$item);
        });

        return $arr;
    }

    public function sort_by_alphabet($alphabet_option, $collection)
    {
        //sort
        $data_match =  match ($alphabet_option) {
            'Z-A' =>  $collection->sortByDesc('name'),
            default =>  $collection->sortBy('name'),
        };


        $arr = [];


        collect($data_match)->map(function ($item,$key) use (&$arr) {
            array_push($arr,$item);
        });

        return $arr;
    }
}
