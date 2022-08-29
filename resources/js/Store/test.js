import {defineStore} from "pinia/dist/pinia";

export const useTestStore = defineStore('test',{
    state: () => {
        return {
            counter : 1
        }
    },

    getters: {
        Counter: (state) => {
            return state.counter
        },
        doubleCounter: (state) => {
            return (userID,st = state) => {
                console.log(userID+" : "+ state.counter) };
        }
    }

})
