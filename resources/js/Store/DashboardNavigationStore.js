import {defineStore} from "pinia/dist/pinia";

export const useDashboardNavigationStore = defineStore('NavigationStore',{
    state: () => {
        return {
            current_page: "Dashboard",
        }
    },

    actions: {
        navigate(page){
            this.current_page = page
        }
    }
})
