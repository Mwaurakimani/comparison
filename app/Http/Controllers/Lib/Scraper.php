<?php

namespace App\Http\Controllers\Lib;

use App\Models\watch;
use Symfony\Component\DomCrawler\Crawler;
use function PHPUnit\Framework\isEmpty;


class Scraper
{

    public function handle($links)
    {
        //create a placeholder for the data collected
        $data = [];

        if ($links == null) {
            return [];
        }

        foreach ($links as $link) {
            try {
                //get the xml doc
                $html = file_get_contents($link['link']);


                //create a crawler
                $crawler = new Crawler($html);

                if (!isset($link['card_selector'])) {
                    throw new \Exception('One of the links does not conform to standard.');
                }


                //crawl the site
                $crawler->filter($link['card_selector'])->each(function ($node) use (&$data, $link) {
                    //single product holder
                    $product = [];


                    if (array_key_exists('title_tag', $link) && $link['title_tag'] != null) {
                        $product['name'] = $node->filter($link['title_tag'])->text();
                    }


                    if (array_key_exists('product_description_tag', $link) && $link['product_description_tag'] != null) {
                        $product['description'] = $node->filter($link['product_description_tag'])->first()->text();
                    }


                    if (array_key_exists('price_tag', $link) && $link['price_tag'] != null) {
                        if (array_key_exists('tagger', $link) && $link['tagger'] == true) {
                            $product['price'] = $node->filter('.prc')->eq(0)->text();

                            $price = strtoupper($product['price'] );

                            $price = preg_replace('/[A-Z]+/', '', $price);


                            $price =  (int)str_replace(",","",$price);
                            $product['price'] =$price;
                        } else {
                            $product['price'] = $node->filter($link['price_tag'])->eq(1)->text();
                            $price = strtoupper($product['price'] );
                            $price = preg_replace('/[A-Z]+/', '', $price);

                            $price = (int)$price;
                            $product['price'] =$price;
                        }
                    }

                    if (array_key_exists('tagger', $link) && $link['tagger'] == true) {
                        $url = $link['link'];
                        $url_array = explode('/', $url);
                        $url_domain = "https://" . $url_array[2];
                        $path = $node->attr('href');
                        $site_location = $url_domain . $path;

                        $product['site_location'] = $site_location;
                    } else {
                        $product['site_location'] = $node->attr('href');
                    }


                    if (array_key_exists('site_location', $product) && $product['site_location'] != null) {
                        if (array_key_exists('tagger', $link) && $link['tagger'] == true) {
                            $url = $link['link'];
                            $url_array = explode('/', $url);
                            $product['site_domain'] = "https://" . $url_array[2];
                            $url_domain = explode(".", $url_array[2]);
                            $site_name = $url_domain[1];
                            $product['site_name'] = $site_name;
                        } else {
                            $site_host_array = explode('/', $product['site_location']);
                            $product['site_domain'] = $site_host_array[2];
                            $domain = $site_host_array[2];
                            $domain_array = explode(".", $domain);
                            $site_name = $domain_array[0];
                            $product['site_name'] = $site_name;
                        }

                    }


                    if (array_key_exists('product_image_selector', $link) && $link['product_image_selector'] != null) {
                        if (array_key_exists('tagger', $link) && $link['tagger'] == true) {
                            $product['product_image'] = $node->filter($link['product_image_selector'])->attr('data-src');
                        } else {
                            $product['product_image'] = "http://".$product['site_domain'].''.$node->filter($link['product_image_selector'])->attr('src');
                        }
                    }

                    if ($product['name']) {
                        array_push($data, $product);
                    }

                });
            } catch (\Exception $e) {
                return array(
                    "status" => 1,
                    "data" => [],
                    "message" => $e->getMessage()
                );
            }
        }


        return array(
            "status" => 0,
            "data" => $data,
            "message" => "success"
        );;
    }

    public function scrap_product($url)
    {

        try {
            $html = file_get_contents($url);

            $crawler = new Crawler($html);

            $data = [];

            $domain = explode('/',$url)[2];

            if(strpos($domain,"jumia")){
                $product = $crawler->filter('main')->each(function ($node) use ($data, $url) {

                    $product = [];

                    $product['name'] = $node->filter('section > .row > .col10  h1')->text();
                    $product['description'] = null;

                    $product['price'] = $node
                        ->filter('section > .row > .col10 > .-phs')
                        ->eq(0)
                        ->filter('div > span')->eq(0)->text();

                    $price = strtoupper($product['price'] );

                    $price = preg_replace('/[A-Z]+/', '', $price);

                    $price =  (int)str_replace(",","",$price);
                    $product['price'] =$price;


                    $product['product_image'] = $node->filter('section ')
                        ->eq(0)
                        ->filter('img')->eq(0)->attr('data-src');

                    $product['site_location'] = $url;

                    $url_split = explode('/', $url);
                    $product['site_domain'] = $url_split[2];
                    $dom = explode('.', $url_split[2]);
                    $product['site_name'] = $dom[1];

                    return $product;
                });
            }else{
                $product = $crawler->filter('.product-section-display')->each(function ($node) use ($data, $url) {

                    $product = [];



                    $product['name'] = $node->filter('.title')->text();
                    $product['description'] = $node->filter('.description')->text();
                    $product['price'] = $node->filter('.price-display > p')->text();
                    $product['product_image'] = $node->filter('.cropper > img')->attr('src');
                    $product['site_location'] = $url;

                    $url_split = explode('/', $url);
                    $product['site_domain'] = $url_split[2];
                    $dom = explode('.', $url_split[2]);
                    $product['site_name'] = $dom[0];

                    return $product;
                });
            }

            return $product[0];
        } catch (\Exception $e) {
            $string = $e->getMessage();

            dd($string);

            if (strpos($string, 'Failed to open stream')) {
                $watch = watch::where('product_link', $url)->first();
                $watch->delete();
            }
        }
    }
}
