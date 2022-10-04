<template>
    <nav class="home-nav">
        <div class="left-panel flex items-center h-[50px]" style="cursor: pointer">
            <Link :href="'/'" as="img" src="/storage/system/home-icon.png" class=" h-[50px] p-[1px]" alt=""></Link>
            <h2>Web Scrapper - DEMO</h2>
        </div>
        <div class="right-panel">
            <Link :href="'/'" class="btn border-r">{{ "my name" }}</Link>
            <div class="w-[1px] bg-white h-[30px] ml-[5px] mr-[20px]"></div>
            <Link @click.prevent="logOut" class="btn border-r bg-white" style="color: var(--theme-primary) !important;">
                Log Out
            </Link>
        </div>
    </nav>
    <div class="header">
        <h1>Account</h1>
    </div>
    <div class="content-display">
        <div class="nav-tap">
            <ul>
                <Link @click="navigate_dashboard('Account')" as="li" :href="route('account')"
                      :class="[this.navigationStore.$state.current_page == 'Account' ? 'active-tag': '']"><span></span>
                    <p>Account</p></Link>
<!--                <Link @click="navigate_dashboard('Search')" as="li" :href="route('search')"-->
<!--                      :class="[this.navigationStore.$state.current_page == 'Search' ? 'active-tag': '']"><span></span>-->
<!--                    <p>Search</p></Link>-->
                <Link @click="navigate_dashboard('phones')" as="li" :href="route('phones')"
                      :class="[this.navigationStore.$state.current_page == 'Watch' ? 'active-tag': '']"><span></span>
                    <p>Phones</p></Link>
<!--                <Link @click="navigate_dashboard('Preference')" as="li" :href="route('preference')"-->
<!--                      :class="[this.navigationStore.$state.current_page == 'Preference' ? 'active-tag': '']">-->
<!--                    <span></span>-->
<!--                    <p>Preference</p></Link>-->
            </ul>
        </div>
        <div class="content">
            <slot></slot>
        </div>
    </div>
</template>

<script>

import axios from "axios";
import {useDashboardNavigationStore} from "../Store/DashboardNavigationStore";

export default {
    setup() {
        const navigationStore = useDashboardNavigationStore();

        return {navigationStore}
    },
    name: "Layout",
    props: ['user'],
    methods: {
        logOut() {
            axios.post(route('logout'))
        },
        navigate_dashboard(page) {
            this.navigationStore.navigate(page);
        }
    },
}
</script>
<style scoped lang="scss">


.home-nav {
    width: 100%;
    height: 50px;
    background-color: var(--theme-primary);
    display: flex;
    justify-content: space-between;
    color: white;
    margin-bottom: 30px;

    .left-panel {
        display: flex;
        align-items: center;
        margin-left: 50px;

        img {
            width: 40px;
            height: 40px;
            padding: 5px;
            margin-right: 20px;

            &:hover {
                transform: scale(1.1);
                border-bottom: 2px solid white;
            }
        }
    }

    .right-panel {
        height: 100%;
        margin-right: 50px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
}

.header {
    padding-left: 50px;
    font-size: 1.5em;
    font-weight: bolder;
    color: var(--text-dark-grey);
    margin-bottom: 20px;
}

.content-display {
    margin: auto;
    width: 1200px;
    height: calc(100vh - 129px);
    display: flex;

    .nav-tap {
        width: 200px;
        border-right: 1px solid lightgrey;
        padding: 10px;
        height: fit-content;

        ul {
            li {
                padding-left: 10px;
                height: 40px;
                display: flex;
                align-items: center;

                span {
                    margin-right: 10px;
                    width: 12px;
                    height: 12px;
                    border-radius: 50%;
                    background-color: var(--theme-primary);
                    display: block;
                    visibility: hidden;
                }

                p {
                    color: var(--text-dark-grey);
                }

                &:hover {
                    cursor: pointer;
                    background-color: var(--theme-primary);

                    span {
                        background-color: white;
                    }

                    p {
                        color: white;
                    }
                }

            }

            .active-tag {
                span {
                    visibility: visible;
                }

                p {
                    color: var(--theme-primary);
                }

                &:hover {
                    color: white;

                    p {
                        color: white;
                    }
                }
            }

        }

    }

    .content {
        width: calc(100% - 200px);
        height: 100%;
        padding: 20px;
        overflow: auto;
    }
}

</style>
