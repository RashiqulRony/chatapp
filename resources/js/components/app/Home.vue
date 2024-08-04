<template>
    <Sidebar v-on:openchat="openChat($event)" />
    <main class="main">
        <div class="chats">
            <div class="chat-body" v-if="$store.getters.chatStart">
                <!-- Header -->
                <ChatHeader />
                <!-- Header End -->

                <!-- Chat Content Start-->
                <ChatBody />
                <!-- Chat Content End-->

                <!-- Chat Footer Start-->
                <ChatFooter />
                <!-- Chat Footer End-->
            </div>
            <div class="d-flex flex-column justify-content-center text-center h-100 w-100" v-else>
                <div class="container">
                    <div class="avatar avatar-lg mb-2">
                        <img class="avatar-img" :src="'/assets/media/avatar/4.png'" alt="">
                    </div>
                    <h5>Welcome, {{ $store.getters.authUser.name }}!</h5>
                    <p class="text-muted">Please select a chat to Start messaging.</p>

                    <button class="btn btn-outline-primary no-box-shadow" data-toggle="modal" data-target="#startConversation">
                        Start a conversation
                    </button>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import ChatFooter from "./chats/ChatFooter.vue";
import ChatHeader from "./chats/ChatHeader.vue";
import ChatBody from "./chats/ChatBody.vue";
import Sidebar from "../app/share/Sidebar.vue";
import http from "../../config/http.js";

export default {
    components: {Sidebar, ChatBody, ChatHeader, ChatFooter },
    data() {
        return {
            chat_user: ''
        }
    },


    mounted() {

    },

    methods: {
        openChat($event) {
            this.$store.dispatch("chatStart", $event)
            this.getChatUser()
            alert('ddd')
        },

        async getChatUser () {
            await http.post('get-chat-info', this.$store.getters.chatStart).then((response) => response.data).then((response) => {
                console.log(response)
            }).catch((error) => {
                this.$tAlert('error', error.response.statusText)
            });
        }
    }
}
</script>
