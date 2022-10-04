<template>
    <div class="product-card">
        <div class="image">
            <img :src=' content.photo != null ? "/storage/Phones/"+content.photo : "/storage/system/default_phone.webp"' alt="" style="padding: 2px">
        </div>
        <div class="description-section">
            <h5 class="mb-[10px]" style="color: #1555EC;font-weight: bolder">{{ content.name }}</h5>
            <p style="color: var(--text-grey);max-height: 75px;overflow: hidden;display: inline-block" class="pb-[2px] mr-[10px]">Size: {{ content.size }} | </p>
            <p style="color: var(--text-grey);max-height: 75px;overflow: hidden;display: inline-block" class="pb-[2px] mr-[10px]">Storage: {{ content.storage }} | </p>
            <p style="color: var(--text-grey);max-height: 75px;overflow: hidden;display: inline-block" class="pb-[2px] mr-[10px]">Front Camera: {{ content.front }} | </p>
            <p style="color: var(--text-grey);max-height: 75px;overflow: hidden;display: inline-block" class="pb-[2px] mr-[10px]">Rear Camera: {{ content.back }}</p>
            <div class="info flex" style="align-items: center">
                <div class="badge mr-[20px]">{{ content.site_one }}</div>
                <p class="price mr-[50px]" style="color: mediumspringgreen; font-weight: bolder">{{ content.site_one_price }}</p>
<!--                <div :class="['price mr-[50px]', parseInt(content.price) > 0 ? '' :'high-light-price']"  style="color: var(&#45;&#45;orange)">Ksh {{ parseInt(content.price) > 0 ?numberWithCommas(parseInt(content.price)):"Check for Price"  }}</div>-->
            </div>
            <div class="info flex" style="align-items: center">
                <div class="badge mr-[20px]">{{ content.site_two }}</div>
                <p class="price mr-[50px]" style="color: mediumspringgreen; font-weight: bolder">{{ content.site_two_price }}</p>
<!--                <div :class="['price mr-[50px]', parseInt(content.price) > 0 ? '' :'high-light-price']"  style="color: var(&#45;&#45;orange)">Ksh {{ parseInt(content.price) > 0 ?numberWithCommas(parseInt(content.price)):"Check for Price"  }}</div>-->
            </div>
            <slot name="deleter">

            </slot>
        </div>
        <div class="card-details w-[200px] pt-[30px]" >
            <div @click="visit_product(content.ecom1)" class="shop-at flex items-center mb-[10px]">
                <div class="icon w-[25px] h-[25px] p-[1px] mr-[5px]">
                    <img src="/storage/system/cart.png" alt="">
                </div>
                <p style="font-size: 0.9em">Shop at {{ content.site_one }}</p>
            </div>
            <div @click="visit_product(content.ecom2)" class="shop-at flex items-center">
                <div class="icon w-[25px] h-[25px] p-[1px] mr-[5px]">
                    <img src="/storage/system/cart.png" alt="">
                </div>
                <p style="font-size: 0.9em">Shop at {{ content.site_two }}</p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'product-card',
    props:['content'],
    methods:{
        visit_product(link){
            location.href = link
        },
        numberWithCommas(x) {
            var parts = x.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }
    }
}
</script>

<style scoped lang="scss">

.high-light-price{
    color: red !important;
}

.product-card {
    width: 100%;
    height: 230px;
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #e7e7e7;
    overflow: hidden;
    background-color: white;
    transition: all ease 0.1s;

    &:hover {
        cursor: pointer;
        transform: scale(1.02);
        box-shadow: 0 0 6px lightgrey;
    }

    &:active {
        transform: scale(0.99);
    }

    .image {
        width: 210px;
        height: 210px;
    }

    .description-section {
        width: calc(100% - 210px - 150px);
        height: 100%;
        padding: 20px 40px;

    }

}

.action-btn-account {
    width: 100%;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: flex-end;

    .remove {
        border-radius: 50%;
        width: 30px;
        height: 30px;
        background-color: var(--theme-red);
    }
}


</style>
