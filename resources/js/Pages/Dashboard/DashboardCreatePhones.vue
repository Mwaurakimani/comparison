<template>
    <div class="panel">
        <div class="heading-pan mb-[20px]">
            <Link :href="route('phones')" as="button" class="btn" >List Phones</Link>
            <button v-if="phone"  class="btn" @click="update_phone" >Update</button>
            <button v-else class="btn" @click="add_phone" >Create</button>
        </div>
        <div class="content">
            <div class="image-section">
                <div class="image-display">
                    <img v-if="phone && phone.photo"  :src="'/storage/Phones/'+phone.photo" alt="" style="height: 100%;object-fit: contain; object-position: center">
                    <img  v-else src="/storage/system/default_phone.webp" alt="" style="height: 100%;object-fit: contain; object-position: center">
                </div>
                <div class="enter-image">
                    <label class="font-semibold p-[10px]">Select Phone thumb</label>
                    <input type="file"  @input="phone_form.avatar = $event.target.files[0]">
                </div>
            </div>
            <div class="details-section">
                <ul>
                    <h2>Description</h2>
                    <li>
                        <p>Name</p>
                        <input type="text" v-model="phone_form.name" >
                    </li>

                </ul>
                <ul>
                    <h2>Body</h2>
                    <li>
                        <p>Dimensions</p>
                        <input type="text" v-model="phone_form.dimensions" >
                    </li>
                    <li>
                        <p>Weight</p>
                        <input type="text" v-model="phone_form.weight" >
                    </li>
                </ul>
                <ul>
                    <h2>Display</h2>
                    <li>
                        <p>Size</p>
                        <input type="text" v-model="phone_form.size" >
                    </li>
                    <li>
                        <p>Resolution</p>
                        <input type="text" v-model="phone_form.resolution" >
                    </li>
                </ul>
                <ul>
                    <h2>Performance</h2>
                    <li>
                        <p>RAM</p>
                        <input type="text" v-model="phone_form.ram" >
                    </li>
                    <li>
                        <p>Storage</p>
                        <input type="text" v-model="phone_form.storage" >
                    </li>
                </ul>
                <ul>
                    <h2>Camera</h2>
                    <li>
                        <p>Front</p>
                        <input type="text" v-model="phone_form.front" >
                    </li>
                    <li>
                        <p>Back</p>
                        <input type="text" v-model="phone_form.back" >
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="panel mt-[20px]">
        <h1 style="font-weight: bolder; font-size: 1.2em;margin-bottom: 20px" >Links</h1>
        <div class="input-group">
            <label for="">Ecommerce 1</label>
            <input type="text" v-model="phone_form.ecom1">
        </div>
        <div class="input-group">
            <label for="">Ecommerce 2</label>
            <input type="text" v-model="phone_form.ecom2">
        </div>
    </div>
</template>

<script>

export default {
    name: "DashboardCreatePhones",
    components:[],
    props:['phone'],
    data(){
        return {
            phone_form: this.$inertia.form({
                name: this.phone && this.phone.name ? this.phone.name : null,
                dimensions: this.phone && this.phone.dimensions ? this.phone.dimensions : null,
                weight: this.phone && this.phone.weight ? this.phone.weight : null,
                size: this.phone && this.phone.size ? this.phone.size : null,
                resolution: this.phone && this.phone.resolution ? this.phone.resolution : null,
                ram: this.phone && this.phone.ram ? this.phone.ram : null,
                storage: this.phone && this.phone.storage ? this.phone.storage : null,
                front: this.phone && this.phone.front ? this.phone.front : null,
                back: this.phone && this.phone.back ? this.phone.back : null,
                ecom1: this.phone && this.phone.ecom1 ? this.phone.ecom1 : null,
                ecom2: this.phone && this.phone.ecom2 ? this.phone.ecom2 : null,
                avatar: null
            })
        }
    },
    methods:{
        add_phone(item){
            this.phone_form.post(route('add_phone'))
        },
        update_phone(){
            this.phone_form.post(route('update_phone',[this.phone.id]))
        }
    }
}
</script>


<style scoped lang="scss">
.panel {
    width: 100%;
    height: 94%;
    background-color: white;
    padding: 20px;
    border-radius: 8px;


    .holder {
        width: 100%;
        border: 1px solid #e7e7e7;
    }
}

.heading-pan{
    width: 100%;
    display: flex;
    button{
        margin-right: 20px;
    }
}

.content{
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    overflow: auto;
    .image-section{
        width: 40%;
        height: 100%;

        .image-display{
            width: 200px;
            height: 250px;
            margin: auto;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .enter-image{
            width: 90%;
            height: 100px;
            margin: auto;
        }
    }

    .details-section{
        width: 60%;
        height: 100%;
        ul{
            margin-bottom: 10px;
            h2{
                font-weight: bolder;
            }
            li{
                padding-left: 20px;
                height: 40px;
                display: flex;
                p{
                    line-height: 40px;
                    width: 200px;
                }
                input{
                    width: 300px;
                    padding: 5px;
                    height: 35px;
                    border-radius: 3px;
                    border: 1px solid lightgrey;
                }
            }
        }
    }

}


.panel{
    .input-group{
        width: 800px;
        height: 80px;
        display: flex;
        align-items: center;
        label{
            width: 150px;
        }
        input{
            width: 500px;
            border-radius: 5px !important;
            border: 1px solid lightgrey;
        }
    }
}

</style>
