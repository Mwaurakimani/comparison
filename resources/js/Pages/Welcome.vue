<template>
    <div class="body-banner">
        <div class="banner-container">
            <nav>
                <div class="left-panel">
                    <img src="/storage/system/home-icon.png" alt="">
                    <h2>Web Scrapper - DEMO</h2>
                </div>
                <div class="right-panel">
                    <a href="/" class="btn border-r">Top Offers</a>
                    <Link v-if="$attrs.user" :href="route('dashboard')" href="/dashboard" class="btn border-r">Account
                    </Link>
                    <Link v-else :href="route('login')" href="/dashboard" class="btn border-r">Log In</Link>
                    <Link v-if="$attrs.user === null" :href="route('register')" href="/dashboard" class="btn border-r">
                        Register
                    </Link>
                </div>
            </nav>
        </div>
    </div>

    <div class="w-[100%] h-[110px]" style="background-color: var(--theme-dark)">
        <form @submit.prevent="" action="" class="flex h-[100%]" style="align-items: center;justify-content: center">
            <input type="search" class="block mr-[20px] w-[350px]" v-model="search_term">
            <button type="submit" class="btn h-[40px]" @click="scrap">Search</button>
        </form>
    </div>
    <div class="w-[100%] h-[180px] flex items-center mb-[100px]"
         style="background-color: var(--theme-primary);flex-direction: column">
        <h3 class="block w-[100%] text-center p-[20px] text-white" style="font-size: 1.5em">Find the best Price</h3>
        <p class="w-[600px] text-center text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime
            mollitia,
            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum</p>
    </div>
    <div class="filter-bar">
        <div class="input-group">
            <label> Sort Results:</label>
            <select name="" id="" v-model="filter_stat" >
                <option value="price-descending" >Price Descending</option>
                <option value="price-accending" >Price Accending</option>
                <option value="A-Z" >A-Z</option>
                <option value="Z-A" >Z-A</option>
            </select>
        </div>
    </div>
    <div class="display-content" v-if="content.status == 1 && content.length > 0">


        <product-card v-for="item in content.data" :content="item">
            <template v-slot:deleter>
                <div class="action-btn-account">
                    <div class="add_to_watch_list" title="Remove from watch List">
                        <button @click.stop="add_to_watch_list(item)" class="btn">Watch</button>
                    </div>
                </div>
            </template>
        </product-card>
    </div>

    <div class="display-content" v-else-if="content.status == 1 && content.length == 0">
        <p>No item matching your search term was found</p>
    </div>

    <div class="display-content" v-else-if="content.status == 0 ">
        <p>Welcome back. Please enter a search term to display items.</p>
    </div>




    <footer class="h-[300px] w-[100%]" style="background-color: var(--theme-dark)">

    </footer>
</template>

<script>

import ProductCard from "../AppComponents/ProductCard.vue";
import axios from "axios";

export default {
    name: "welcome",
    components: {ProductCard},
    data() {
        return {
            content: {
                data:null,
                length:0,
                status:0
            },
            filter_stat: null,
            search_term: null
        }
    },
    methods: {
        scrap() {
            axios.post(route('scrapper_controller'),{
                "term":this.search_term,
                "filter":this.filter_stat
            })
                .then((response) => {
                    console.log(response.data.status == 0 )

                    let count = Object.keys(response.data.data).length


                    if (response.data.status == 0 && count) {
                        this.content.data = response.data.data
                        this.content.length = count
                        this.content.status = 1
                    } else if (response.data.status == 0 && count) {
                        this.content.data = response.data.data
                        this.content.length = count
                        this.content.status = 1
                    } else {
                        throw new Error(response.data.message)
                    }
                }).catch((e) => {
                console.log(e)
            });
        },
        add_to_watch_list(content) {
            axios.post(route('add_to_watch_list'), content).then((response) => {
                console.log(response)
            }).catch((e) => {
                if (e.response.status == 401) {
                    alert("Please Log in to allow product watch")
                    window.location.href = '/login'
                }
            })
        }
    }
}
</script>
<style scoped lang="scss">

.display-content{
    &>p{
        width: 100%;
        height: 300px;
        text-align: center;
        line-height: 300px;
        font-size: 1.5em;
    }
}

.body-banner {
    width: 100%;
    height: 700px;
    background-color: grey;
    background-image: url("/public/storage/system/banner.webp");
    background-size: cover;
    background-repeat: no-repeat;

    .banner-container {
        width: 100%;
        height: 100%;
        background-image: linear-gradient(180deg,
            rgba(66, 65, 65, 0.8) 1%,
            rgb(68, 68, 68, 0.5) 4%,
            rgba(222, 215, 215, 0) 10%,
            rgba(222, 215, 215, 0) 90%);

        nav {
            width: 100%;
            height: 50px;
            display: flex;
            justify-content: space-between;
            color: white;

            .left-panel {
                display: flex;
                align-items: center;
                margin-left: 50px;

                img {
                    width: 40px;
                    height: 40px;
                    padding: 5px;
                    margin-right: 20px;
                }
            }

            .right-panel {
                height: 100%;
                margin-right: 50px;
                display: flex;
                align-items: center;
                justify-content: space-between;

                a {
                    margin: 0 5px;
                }
            }
        }


    }
}

.display-content {
    width: 1000px;
    margin: auto;
    border: 1px solid #e7e7e7;
    background-color: white;
    margin-bottom: 20px;
}

.action-btn-account {
    margin-top: 10px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    width: 100%;
    height: 40px;

}

.filter-bar{
    width: 1000px;
    height: 50px;
    margin: auto;
    border: 1px solid #e7e7e7;
    background-color: white;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    label{
        display: block;
        margin: 0 20px;
        padding: 0pc;
        line-height: 50px;
    }
    select{
        align-self: center;
        height: 90%;
    }
}
</style>
