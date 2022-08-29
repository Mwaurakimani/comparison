<template>
    <div class="preference-element">
        <div class="input-section">
            <h1>Please Select a preference</h1>
            <ul>
                <li  style="display: flex;align-items: center"
                    v-for="(item,index) in sort_options"
                     :class="['h-[40px]',is_active(item.name,item.option)]"
                     @click="add_preference(item.name,item.option)">

                    <span class="ml-[20px]  mr-[20px]">{{ item.name }}</span>
                    <span>{{ item.option }}</span>
                    <span class="active_badge">active</span>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import {useDashboardNavigationStore} from "../../Store/DashboardNavigationStore";

export default {
    setup(){
        let navStore = useDashboardNavigationStore()

        return {navStore}
    },
    name: "DashboardPref",
    props:['prefs'],
    components: {},
    data() {
        return {
            sort_options: [
                {
                    name: "alphabetic",
                    option: "A-Z",
                },
                {
                    name: "alphabetic",
                    option: "Z-A"
                },
                {
                    name: "Price",
                    option: "Lowest-highest",
                },
                {
                    name: "Price",
                    option: "Highest-Lowest"
                },
            ],
            preferences:this.prefs
        }
    },
    methods: {
        add_preference(key, option) {
            let data = {
                key: key,
                option: option
            }

            axios.post(route('add_sort_option', this.$attrs.user), {data: data}).then((res) => {
                window.location.reload()
            })
        },
        is_active(Pref_key,Pref_value){
            let ret_value = ''

            if(this.preferences.length){
                for(let item of this.preferences){
                    let key = item.key
                    let option = item.option

                    if(Pref_key == key && Pref_value == option){
                        ret_value = 'active'
                    }
                }
            }

            return ret_value
        }
    },
    mounted() {
        this.navStore.navigate('Preference');
    }
}
</script>

<style lang="scss" scoped>
.preference-element {
    width: 100%;
    height: 700px;
    background-color: white;
    border-radius: 8px;
    padding-top: 20px;
    padding-bottom: 40px;

    .input-section {
        width: 100%;
        height: 300px;

        h1 {
            padding: 20px;
            font-weight: bolder;
        }

        ul {
            li{
                &:hover{
                    background-color: grey;
                    color: white;
                }
                .active_badge{
                    display: none;
                }
            }
            .active {
                background-color: var(--theme-primary);
                color: white;

                .active_badge {
                    display: block;
                    margin-left: 100px;
                    padding: 1px 5px;
                    background-color: white;
                    color: var(--theme-primary);
                    border-radius: 20px;

                }
            }
        }
    }

    .pref-content {
        width: 100%;
        height: 300px;
        padding: 20px;

        .pill-display {
            background-color: var(--theme-primary);
            padding: 5px 15px;
            border-radius: 20px;
            justify-content: flex-start;
            display: inline-flex;
            align-items: center;
            color: white;
            margin: 10px 15px;

            span {
                display: none;
                margin-left: 10px;
                width: 15px;
                height: 15px;
                background-color: var(--theme-red);
                border-radius: 50%;
                cursor: pointer;
                transition: all ease 0.25s;
            }
        ;

            &:hover {

                span {
                    display: block;
                }
            }
        }
    }

}
</style>
