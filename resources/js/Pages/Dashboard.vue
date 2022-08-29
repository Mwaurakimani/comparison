<template>
    <p>Dashboard</p>
</template>

<script>

import {useDashboardNavigationStore} from "../Store/DashboardNavigationStore";

export default {
    setup(){
        let nav_store = useDashboardNavigationStore()

        return {nav_store}
    },
    name: "dashboard",
    components:{},
    mounted() {
        this.nav_store.navigate('Dashboard');
    }
}
</script>
<style scoped lang="scss">

</style>
