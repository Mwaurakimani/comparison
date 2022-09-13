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

    <div class="compare-bar">
        <div class="filler">
            <div class="spacer">

            </div>
            <ul>
                <h1>Body</h1>
                <li><p>Dimension</p></li>
                <li><p>Weight</p></li>
                <h1>Display</h1>
                <li><p>Size</p></li>
                <li><p>Resolution</p></li>
                <h1>Memory</h1>
                <li><p>RAM</p></li>
                <li><p>Storage</p></li>
                <h1>Camera</h1>
                <li><p>Front</p></li>
                <li><p>Back</p></li>
            </ul>
        </div>
        <div class="comparison-pan">
            <phone-panel>

            </phone-panel>
            <phone-panel>

            </phone-panel>
        </div>
    </div>

<!--    <footer class="h-[300px] w-[100%]" style="background-color: var(&#45;&#45;theme-dark)">-->
<!--    </footer>-->
</template>

<script>

import phonePanel from "../AppComponents/phonePanel.vue";

export default {
    name: "welcome",
    components: {phonePanel}
}
</script>
<style scoped lang="scss">

.compare-bar{
    width: 1200px;
    margin: auto;
    margin-top: 40px;
    margin-bottom: 20px;
    background-color: white;
    display: flex;
    justify-content: space-between;

    .filler{
        width: 300px;
        height: 100%;
        background-color: lightgrey;

        .spacer{
            width: 100%;
            height: 370px;
        }
         &>ul{
             h1{
                 height: 30px;
                 padding: 5px;
                 font-weight: bolder;
             }
             li{
                 height: 44px;
                 border-bottom: 1px solid lightgrey;
                 p{
                     line-height: 44px;
                     padding-left: 20px;
                 }
             }
         }
    }
    .comparison-pan{
        width: calc(100% - 300px);
        height: 100%;
        display: flex;
    }




}




.body-banner {
    width: 100%;
    height: 700px;
    background-color: grey;
    background-image: url("/public/storage/system/banner.webp");
    background-size: cover;
    background-repeat: no-repeat;
    margin-bottom: 20px;

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
</style>
