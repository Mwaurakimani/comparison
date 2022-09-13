<template>
    <div class="panel">
        <div class="heading-pan mb-[20px]">
            <Link class="btn" as="button" :href="route('create_phone')" >Add</Link>
        </div>
        <div class="content" v-if="phones && phones.length > 0" >
            <div v-for="phone in phones" class="phone">
                <div class="image p-[2px] flex align-middle">
                    <img v-if="phone.photo"  :src="'/storage/Phones/'+phone.photo" alt="" style="height: 100%;object-fit: contain; object-position: center">
                    <img  v-else src="/storage/system/default_phone.webp" alt="" style="height: 100%;object-fit: contain; object-position: center">
                </div>
                <p>{{ phone.name }}</p>
                <Link as="button" style="display: block;margin: auto" class="btn ml-[20px] " :href="route('edit_phone',[phone.id])" >Edit</Link>
            </div>
        </div>

    </div>
</template>

<script>

export default {
    name: "DashboardPhones",
    components:[],
    props:['phones'],
    data(){
        return {
            watches:this.content
        }
    },
    methods:{
        remove_from_watch(item){
            axios.post(route('remove_item_from_watch',item.id)).then((res) => {
                if(res.data = true){
                    this.watches = this.watches.filter(i => i.id != item.id)
                }
            })
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
    height: calc(100% - 50px);
    flex-wrap: wrap;
    justify-content: space-around;
    overflow: auto;
    &>div{
        margin-bottom: 20px;
    }
}

.phone {
    width: 200px;
    height: 270px;
    border-radius: 8px;
    box-shadow: 0 0 6px lightgrey;
    overflow: hidden;
    .image{
        width: 100%;
        height: 170px;
    }

    p{
        padding: 15px;
        font-weight: bolder;
        color: grey;
    }
}

</style>
