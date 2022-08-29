<template>
    <div class="accounts-tab">
        <form @submit.prevent.stop="update_user_info" action="">
            <div class="input-group">
                <label for="">Username</label>
                <input type="text" v-model="auth_user.name" required>
            </div>
            <div class="input-group">
                <label for="">Email</label>
                <input type="text" v-model="auth_user.email" required>
            </div>
            <button type="submit" class="btn">Update Details</button>
        </form>
        <form action="">
            <div class="input-group">
                <label for="">Password</label>
                <input type="text">
            </div>
            <div class="input-group">
                <label for="">New Password</label>
                <input type="text">
            </div>
            <div class="input-group">
                <label for="">Confirm Password</label>
                <input type="text">
            </div>
            <button class="btn">Update Password</button>
        </form>
    </div>
</template>

<script>
import axios from "axios";
import {useDashboardNavigationStore} from "../../Store/DashboardNavigationStore";

export default {
    setup(){
        let navStore = useDashboardNavigationStore()

        return {navStore}
    },
    name: "DashboardAccount",
    components: {},
    data() {
        return {
            auth_user: this.$inertia.form({
                ...this.$attrs.user
            })
        }
    },
    methods: {
        update_user_info() {
            axios.post(route('update_user', this.auth_user.id),this.auth_user).then((res) => {
                if(res.data == true){
                    alert("Updated successfully");
                }
            })
        }
    },
    mounted() {
        this.navStore.navigate('Account');
    }
}
</script>

<style scoped lang="scss">

.accounts-tab {
    width: 100%;
    padding-bottom: 40px;
    background-color: white;
    border-radius: 8px;
    border: 1px solid #e7e7e7;
    padding-top: 20px;

    form {
        margin: auto;
        width: 700px;
        margin-bottom: 100px;

        .input-group {
            display: flex;
            width: 100%;
            height: 40px;
            align-items: center;
            margin-bottom: 10px;

            label {
                width: 180px;
                color: var(--theme-primary);
            }

            input {
                height: 35px;
                width: 400px;
                border: 1px solid #e7e7e7;
                border-radius: 8px;
            }
        }

        button {
            display: block;
            margin: auto;
        }
    }
}

</style>
