<template>
    <div class="section">
        <div class="heading-section">
            <form @submit.prevent action="">
                <div class="input-group">
                    <input type="text" @keyup="search_phone" v-model="phone_key">
                </div>
                <button class="btn" >
                    Add
                </button>
            </form>
            <div v-if="phone_search_list && phone_search_list.length > 0" class="drop-down-panel">
                <div  v-for="phone in phone_search_list" class="phone" @click="phone_selected(phone.id)">
                    <div class="img-section">
                        <img v-if="phone.photo"  :src="'/storage/Phones/'+phone.photo" alt="" style="height: 100%;object-fit: contain; object-position: center">
                        <img  v-else src="/storage/system/default_phone.webp" alt="" style="height: 100%;object-fit: contain; object-position: center">
                    </div>
                    <p>{{ phone.name }}</p>
                </div>
            </div>
        </div>
        <div v-if="match_phone" class="phone-display">
            <div class="title-section font-bold pl-[50px]">{{ match_phone.name }}</div>
            <div class="img-section">
                <img v-if="match_phone.photo"  :src="'/storage/Phones/'+match_phone.photo" alt="" style="height: 100%;object-fit: contain; object-position: center">
                <img  v-else src="/storage/system/default_phone.webp" alt="" style="height: 100%;object-fit: contain; object-position: center">
            </div>
            <div class="sect body-section">
                <p>{{ match_phone.dimensions }}</p>
                <p>{{ match_phone.weight }}</p>
            </div>
            <div class="spacer-tab"></div>
            <div class="sect body-section">
                <p>{{ match_phone.size }}</p>
                <p>{{ match_phone.resolution }}</p>
            </div>
            <div class="spacer-tab"></div>
            <div class="sect body-section">
                <p>{{ match_phone.ram }}</p>
                <p>{{ match_phone.storage }}</p>
            </div>
            <div class="spacer-tab"></div>
            <div class="sect body-section">
                <p>{{ match_phone.front }}</p>
                <p>{{ match_phone.back }}</p>
            </div>
        </div>
        <div v-if="match_phone" class="shops">
            <a  v-if="match_phone.price1" class="shop-elem" :href="match_phone.ecom1">
                <p>Ecommerce site</p>
                <span>{{ match_phone.price1 }}</span>
            </a>
            <a  v-if="match_phone.price2" class="shop-elem" :href="match_phone.ecom2">
                <p>Dummy site 2</p>
                <span>{{ match_phone.price2 }}</span>
            </a>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "phonePanel",
    props: ['selectedPhone'],
    watch:{
        selectedPhone(newData,oldData){
            this.phone_selected(newData)
        }
    },
    data(){
        return {
            phone_search_list:null,
            phone_key:null,
            match_phone:null,
        }
    },
    methods:{
        search_phone(){
            axios.post(route('fetch_phone'),{
                term: this.phone_key
            }).then((res) => {
                if(res.data && res.data.length > 0){
                    this.phone_search_list = res.data
                }
            })
        },
        phone_selected(id){
            axios.post(route('phone_selected'),{
                id: id
            }).then((res) => {
                this.phone_search_list = null,
                this.phone_key = null,
                this.match_phone = res.data
            })
        }
    },
    mounted() {
        if(this.selectedPhone){
            this.phone_selected(this.selectedPhone)
        }
    }
}
</script>

<style scoped lang="scss">
.section:nth-of-type(1){
    border-right: 1px solid lightgrey;
}

.section{
    width: 50%;
    .heading-section{
        width: 100%;
        height: 60px;
        background-color: grey;
        overflow: visible;
        position: relative;

        form{
            width: 100%;
            height: 100%;
            display: flex;
            padding: 10px;
            .input-group:first-of-type{
                width: 100%;
                input{
                    border-radius: 8px;
                    padding: 5px;
                    width: 100%;
                    margin-right: 5px;
                }
            }
        }
        .drop-down-panel{
            z-index: 1000;
            width: 100%;
            background-color: white;
            box-shadow: 3px 0px 6px lightgrey;

            .phone{
                height: 60px;
                width: 100%;
                margin: auto;
                display: flex;
                align-items: center;
                background-color: white;

                &:hover{
                    background-color: lightgrey;
                    cursor: pointer;
                }

                .img-section{
                    margin: 0px 10px;
                    width: 60px;
                    height: 60px;
                    padding: 1px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
            }
        }
    }
    .phone-display{
        width: 100%;
        padding: 10px;
        background-color: white;

        .title-section{
            width: 100%;
            height: 40px;
            margin-bottom: 10px;
        }

        .img-section{
            width: 200px;
            height: 270px;
            margin: auto;
            margin-bottom: 10px;
        }

        .sect{
            p{
                text-align: center;
                height: 43px;
                line-height: 44px;
                border-bottom: 1px solid lightgrey;
                color: grey;
                font-size: 0.8em;
            }
        }

        .spacer-tab{
            height: 32px;
        }


    }
    .shops{
        width: 110%;
        display: flex;
        flex-direction: column;
        .shop-elem{
            display: flex;
            width: 100%;
            height: 50px;
            line-height: 50px;
            p{
                padding-left:20px;
                width: 200px;
            }
        }
    }
}
</style>
