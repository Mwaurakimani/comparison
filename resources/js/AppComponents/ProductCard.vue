<template>
    <div class="product-card" @click="visit_product(content.site_location)">
        <div class="image">
            <img :src="content.product_image" alt="">
        </div>
        <div class="description-section">
            <h5 class="mb-[10px]" style="color: #1555EC;font-weight: bolder">{{ content.name }}</h5>
            <p style="color: var(--text-grey);max-height: 75px;overflow: hidden" class="pb-[20px]">{{ content.description }}</p>
            <div class="info flex" style="align-items: center">
                <div :class="['price mr-[50px]', parseInt(content.price) > 0 ? '' :'high-light-price']"  style="color: var(--orange)">Ksh {{ parseInt(content.price) > 0 ?numberWithCommas(parseInt(content.price)):"Check for Price"  }}</div>
                <div class="badge">{{ content.site_name }}</div>
            </div>
            <slot name="deleter">

            </slot>
        </div>
        <div class="card-details w-[150px] flex items-center justify-center">
            <div class="shop-at flex items-center">
                <div class="icon w-[25px] h-[25px] p-[1px] mr-[5px]">
                    <img src="/storage/system/cart.png" alt="">
                </div>
                <p style="font-size: 0.9em">Buy at {{ content.site_name }}</p>
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
    height: 210px;
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
