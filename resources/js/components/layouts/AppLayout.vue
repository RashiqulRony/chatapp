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
    export default {
        components:{
            Navigation,
            Sidebar,
            Appbar,
        },
        mounted() {

        }
    }
</script>
