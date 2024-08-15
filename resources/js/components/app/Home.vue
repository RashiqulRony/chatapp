<template>
    <Sidebar v-on:openchat="openChat($event)" />
    <main class="main">
        <div class="chats">
            <div class="chat-body" v-if="$store.getters.chatStart && ($store.getters.navBar === 'chat' || $store.getters.navBar === 'group')">
                <ChatHeader />
                <ChatBody />
                <ChatFooter v-on:sendmessage="connect()" />
            </div>
            <Profile v-else-if="$store.getters.navBar === 'profile'" />
            <div class="d-flex flex-column justify-content-center text-center h-100 w-100" v-else>
                <div class="container">
                    <div class="avatar avatar-lg mb-2">
                        <img v-if="$store.getters.authUser.image" class="avatar-img" :src="'/storage/users/'+$store.getters.authUser.image" :alt="$store.getters.authUser.name">
                        <img v-else class="avatar-img" :src="'/assets/media/avatar/user.png'" :alt="$store.getters.authUser.name">
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
import Profile from "../app/Profile.vue";
import http from "../../config/http.js";

export default {
    components: {Sidebar, ChatBody, ChatHeader, ChatFooter, Profile },
    data() {
        return {

        }
    },


    mounted() {

    },

    watch: {

    },


    methods: {
        connect() {
            let vm = this;
            vm.getChatMessage();
            window.Echo.channel("testChannel")
                .listen('TestEvent', e => {
                    console.log(e)
                    vm.getChatMessage();
                });
        },

        openChat($event) {
            this.$store.dispatch("chatStart", $event)
            this.getChatUser()
        },

        async getChatUser () {
            await http.post('get-chat-info', this.$store.getters.chatStart).then((response) => response.data).then((response) => {
                this.$store.dispatch("chatRoom", response.data.room)
                this.$store.dispatch("chatUser", response.data.chat_user)
                this.getChatMessage()
            }).catch((error) => {
                this.$tAlert('error', error.response.statusText)
            });
        },

        async getChatMessage() {
            let data = {
                receiver_id : this.$store.getters.chatUser.id,
                chat_room_id: this.$store.getters.chatRoom.id
            }
            await http.post('get-messages', data).then((response) => response.data).then((response) => {
                this.$store.dispatch("chatMessages", response.data)
            }).catch((error) => {
                this.$tAlert('error', error.response.statusText)
            });
        },


    }
}
</script>
