<template>
    <div class="panel">
        <div v-if="searches" class="holder">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Search term</th>
                    <th scope="col">Items Found</th>
                    <th scope="col">Date</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(search,index) in searches">
                    <th scope="row">{{ index + 1 }}</th>
                    <td>{{ search.term }}</td>
                    <td>{{ search.items_found }}</td>
                    <td>{{ convert_date(search.created_at) }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div v-else class="display-content">
            <p>Welcome back. Please enter a search term to display items.</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "DashboardSearch",
    props:['searches'],
    components: {},
    methods:{
        convert_date(date){
            let d = new Date(date);


            return d.getDate()+
                "/"+(d.getMonth()+1)+
                "/"+d.getFullYear()
        }
    }
}
</script>

<style lang="scss" scoped>
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

        thead {
            color: white;
            background-color: var(--theme-primary);
        }
    }
}

.display-content {
    height: 300px;
    border: 1px solid #e7e7e7;
    background-color: white;
    display: flex;
    align-items: center;
    justify-content: center;

    p{
        font-weight: bolder;
        font-size: 1.4em;
        color: grey;
    }
}
</style>
