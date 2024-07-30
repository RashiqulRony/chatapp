<template>
    <div class="chats-tab-open">
        <div class="main-layout">
            <Navigation />
            <Sidebar />
            <router-view ></router-view>
            <Appbar />
        </div>
    </div>
</template>

<script>
    import Navigation from "../app/share/Navigation.vue";
    import Sidebar from "../app/share/Sidebar.vue";
    import Appbar from "../app/share/Appbar.vue";
    import http from "../../config/http.js"

    export default {
        components:{
            Navigation,
            Sidebar,
            Appbar,
        },
        mounted() {
            this.refreshToken()
        },

        methods: {
            refreshToken() {
                http.get('refresh-token').then((response) => {
                    this.$store.dispatch("refreshToken", response.data)
                }).catch((error) => {
                    // this.$store.dispatch("logout")
                    this.$tAlert('error', error.response.statusText)
                });
            }
        }
    }
</script>
