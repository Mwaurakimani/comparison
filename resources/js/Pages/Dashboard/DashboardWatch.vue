<template>
    <div class="panel">
        <div v-if="watches.length > 0" class="holder">
            <product-card v-for="item in watches" :content="item">
                <template v-slot:deleter>
                    <div class="action-btn-account">
                        <div @click.stop="remove_from_watch(item)" class="remove" title="Remove from watch List">
                            <img src="/storage/system/trash.png" alt="">
                        </div>
                    </div>
                </template>
            </product-card>
        </div>
        <div v-else class="holder">
            <p class="no-watch">No items in your watch list</p>
        </div>
    </div>
</template>

<script>
import ProductCard from "../../AppComponents/ProductCard.vue";

export default {
    name: "DashboardWatch",
    props:['content'],
    data(){
        return {
            watches:this.content
        }
    },
    components: {
        ProductCard
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

.no-watch{
    width: 100%;
    height: 300px;
    text-align: center;
    line-height: 300px;
    font-size: 1.5em;
}

.panel {
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: white;
    padding: 20px;
    border-radius: 8px;

    .holder {
        width: 100%;
        border: 1px solid #e7e7e7;
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
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5px;
    }
}

</style>
