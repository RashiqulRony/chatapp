<template>
    <main class="main main-visible">
        <!-- Chats Page Start -->
        <div class="chats">
            <div class="chat-body">
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
        </div>
    </main>
</template>

<script>
import ChatHeader from "./ChatHeader.vue";
import ChatBody from "./ChatBody.vue";
import ChatFooter from "./ChatFooter.vue";

    export default {
        components: {
            ChatHeader,
            ChatBody,
            ChatFooter
        },
        mounted() {

        }
    }
</script>
