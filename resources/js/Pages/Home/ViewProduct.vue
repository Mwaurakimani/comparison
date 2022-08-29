<template>
    <nav class="home-nav">
        <div class="left-panel flex items-center h-[50px]" style="cursor: pointer">
            <img src="/storage/system/home-icon.png" class=" h-[50px] p-[1px]" alt="">
            <h2>Web Scrapper - DEMO</h2>
        </div>
        <div class="right-panel">
            <a href="/" class="btn border-r">Top Offers</a>
            <a href="/" class="btn border-r">Account</a>
        </div>
    </nav>

    <div class="route-display w-[100%] pl-[100px] mb-[20px]">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
        </nav>

    </div>

    <div class="product-details-sections">
        <div class="product-section">
            <div class="product-details-section">
                <div class="image-section">
                    <img src="/storage/system/laptop.jpg" alt="">
                </div>
                <div class="details-section">
                    <h3 class="mb-[10px]" style="color: #1555EC;font-weight: bolder;font-size: 1.3em">HP Spectra X 360 Core i7  4GB RAM 1TB </h3>
                    <p style="color: var(--text-grey)" class="pb-[20px]"  >Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,molestiae quas vel
                        sint commodi repudiandae consequuntur voluptatum laborum</p>
                    <div class="stock-value flex items-center mb-[15px]">
                        <h5 class="p-[10px] pl-[0px] " >Stock Remaining :</h5>
                        <p style="color: var(--text-grey)">20</p>
                    </div>
                    <div class="product-info flex mb-[20px] justify-between">
                        <div class="info flex" style="align-items: center">
                            <div class="price mr-[50px]" style="color: var(--orange)">Ksh 300,000</div>
                            <div class="badge">Jumia</div>
                        </div>
                        <div class="card-details w-[150px] flex items-center justify-center">
                            <div class="shop-at flex items-center">
                                <div class="icon w-[25px] h-[25px] p-[1px] mr-[5px]">
                                    <img src="/storage/system/cart.png" alt="">
                                </div>
                                <p style="font-size: 0.9em">Buy at Jumia</p>
                            </div>
                        </div>
                    </div>
                    <div  class="action-section flex">
                        <button class="btn"  style="color: white" >Add to Wish List</button>
                    </div>
                </div>

            </div>
            <div class="product-review-section w-[300px]">
                <h5>Reviews</h5>
                <ul class="review-holder">
                    <li>
                        <h6>Usernmae: </h6>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum</p>
                    </li>
                    <li>
                        <h6>Usernmae: </h6>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum</p>
                    </li>
                    <li>
                        <h6>Usernmae: </h6>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum</p>
                    </li>
                    <li>
                        <h6>Usernmae: </h6>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                            molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="similar-section">
            <h5>Suggestions</h5>
            <ul>
                <li style="width: 280px; border: 1px solid #e7e7e7;margin:auto;margin-bottom: 20px">
                    <div class="image mb-[10px]">
                        <img src="/storage/system/laptop.jpg" alt="">
                    </div>
                    <h3 class="mb-[10px] text-center" style="color: #1555EC;font-weight: bolder">HP Spectra X 360 Core i7  4GB RAM 1TB </h3>
                    <div class="info-box flex pb-[10px]" style="flex-wrap: wrap;justify-content: center">
                        <div class="info flex mb-[10px]" style="align-items: center">
                            <div class="price mr-[50px]" style="color: var(--orange)">Ksh 300,000</div>
                            <div class="badge">Jumia</div>
                        </div>
                        <div class="card-details w-[150px] flex items-center justify-center">
                            <div class="shop-at flex items-center">
                                <div class="icon w-[25px] h-[25px] p-[1px] mr-[5px]">
                                    <img src="/storage/system/cart.png" alt="">
                                </div>
                                <p style="font-size: 0.9em">Buy at Jumia</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="width: 280px; border: 1px solid #e7e7e7;margin:auto;margin-bottom: 20px">
                    <div class="image mb-[10px]">
                        <img src="/storage/system/laptop.jpg" alt="">
                    </div>
                    <h3 class="mb-[10px] text-center" style="color: #1555EC;font-weight: bolder">HP Spectra X 360 Core i7  4GB RAM 1TB </h3>
                    <div class="info-box flex pb-[10px]" style="flex-wrap: wrap;justify-content: center">
                        <div class="info flex mb-[10px]" style="align-items: center">
                            <div class="price mr-[50px]" style="color: var(--orange)">Ksh 300,000</div>
                            <div class="badge">Jumia</div>
                        </div>
                        <div class="card-details w-[150px] flex items-center justify-center">
                            <div class="shop-at flex items-center">
                                <div class="icon w-[25px] h-[25px] p-[1px] mr-[5px]">
                                    <img src="/storage/system/cart.png" alt="">
                                </div>
                                <p style="font-size: 0.9em">Buy at Jumia</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="width: 280px; border: 1px solid #e7e7e7;margin:auto;margin-bottom: 20px">
                    <div class="image mb-[10px]">
                        <img src="/storage/system/laptop.jpg" alt="">
                    </div>
                    <h3 class="mb-[10px] text-center" style="color: #1555EC;font-weight: bolder">HP Spectra X 360 Core i7  4GB RAM 1TB </h3>
                    <div class="info-box flex pb-[10px]" style="flex-wrap: wrap;justify-content: center">
                        <div class="info flex mb-[10px]" style="align-items: center">
                            <div class="price mr-[50px]" style="color: var(--orange)">Ksh 300,000</div>
                            <div class="badge">Jumia</div>
                        </div>
                        <div class="card-details w-[150px] flex items-center justify-center">
                            <div class="shop-at flex items-center">
                                <div class="icon w-[25px] h-[25px] p-[1px] mr-[5px]">
                                    <img src="/storage/system/cart.png" alt="">
                                </div>
                                <p style="font-size: 0.9em">Buy at Jumia</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="width: 280px; border: 1px solid #e7e7e7;margin:auto;margin-bottom: 20px">
                    <div class="image mb-[10px]">
                        <img src="/storage/system/laptop.jpg" alt="">
                    </div>
                    <h3 class="mb-[10px] text-center" style="color: #1555EC;font-weight: bolder">HP Spectra X 360 Core i7  4GB RAM 1TB </h3>
                    <div class="info-box flex pb-[10px]" style="flex-wrap: wrap;justify-content: center">
                        <div class="info flex mb-[10px]" style="align-items: center">
                            <div class="price mr-[50px]" style="color: var(--orange)">Ksh 300,000</div>
                            <div class="badge">Jumia</div>
                        </div>
                        <div class="card-details w-[150px] flex items-center justify-center">
                            <div class="shop-at flex items-center">
                                <div class="icon w-[25px] h-[25px] p-[1px] mr-[5px]">
                                    <img src="/storage/system/cart.png" alt="">
                                </div>
                                <p style="font-size: 0.9em">Buy at Jumia</p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "ViewProduct.vue"
}
</script>

<style scoped lang="scss">

.home-nav {
    width: 100%;
    height: 50px;
    background-color: var(--theme-dark);
    display: flex;
    justify-content: space-between;
    color: white;
    margin-bottom: 70px;

    .left-panel {
        display: flex;
        align-items: center;
        margin-left: 50px;

        img {
            width: 40px;
            height: 40px;
            padding: 5px;
            margin-right: 20px;

            &:hover{
                transform: scale(1.1);
                border-bottom: 2px solid white;
            }
        }
    }
    .right-panel{
        height: 100%;
        width: 220px;
        margin-right: 50px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
}

.product-details-sections{
    margin: auto;
    max-width:1300px ;
    display: flex;
    justify-content: space-around;
    flex-direction: row;


    .product-section{
        width: calc(100% - 300px - 30px);
        height: 100%;

        .product-details-section,.product-review-section{
            width: 100%;
            background-color: white;
            border-radius: 8px;
            border: 1px solid #e7e7e7;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }

        .product-details-section{
            display: flex;
            .image-section{
                flex-shrink: 0;
                margin-top: 20px;
                margin-left: 20px;
                width: 250px;
                border-radius: 5px;
                border:1px solid #e7e7e7;
                margin-right: 40px;
                height: fit-content;
            }
            .details-section{
                padding-top: 20px;
                width: 100%;
                flex-grow: 1;
                padding-left: 10px;
                .action-section{
                    margin: auto;
                    width: 90%;
                    height: 40px;
                    display: flex;
                    align-items: center;
                    justify-content: flex-end;
                }
            }
        }

        .product-review-section{
            max-height: 500px;
            overflow: auto;
            position: relative;
            h5{
                position: sticky;
                top: 0px;
                padding: 20px;
                color: var(--theme-primary);
                font-weight: bolder;
                background-color: white;
                margin-bottom: 5px;
            }

            .review-holder{
                height: 100%;
                padding:0px 20px;

                li{
                    border-bottom: 1px solid #e7e7e7;
                    padding-bottom: 15px;
                    h6{
                        padding: 0px 10px 10px 0px;
                        font-weight: bolder;
                    }
                    P{
                        font-size: 0.9em;
                        padding: 0px 0px 5px 15px;
                    }
                }
            }
        }
    }

    .similar-section{
        width: 300px;
        align-items: stretch;
        background-color: white;
        border-radius: 8px;
        border: 1px solid #e7e7e7;
        max-height: 480px;
        overflow: auto;
        h5{
            position: sticky;
            top: 0px;
            padding: 20px;
            color: var(--theme-primary);
            font-weight: bolder;
            background-color: white;
            margin-bottom: 5px;
        }
    }
}

</style>
