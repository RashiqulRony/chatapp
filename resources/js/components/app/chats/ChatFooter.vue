<template>
    <div class="chat-footer">
        <div class="attachment">
            <div class="dropdown">
                <button class="btn btn-secondary btn-icon btn-minimal btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">
                        <svg class="hw-20 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>Gallery</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="hw-20 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                        </svg>
                        <span>Audio</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="hw-20 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                        <span>Document</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="hw-20 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <span>Contact</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="hw-20 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Location</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="hw-20 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>Poll</span>
                    </a>
                </div>
            </div>
        </div>

        <textarea class="form-control" @keydown.ctrl.enter="sendMessage()" v-model="message" rows="1" placeholder="Type your message here..."></textarea>
        <div @click="sendMessage()" class="btn btn-primary btn-icon send-icon rounded-circle text-light mb-1" role="button">
            <svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        </div>
    </div>
</template>

<script>
    import http from "../../../config/http.js";

    export default {
        data() {
            return {
                message: ''
            }
        },
        mounted() {
            /*setTimeout(function () {
                $("#messageInput").emojioneArea();
            }, 500)*/

        },

        methods: {
            async sendMessage() {
                if (this.message) {
                    let data = {
                        chat_room_id : this.$store.getters.chatRoom.id,
                        receiver_id : this.$store.getters.chatUser.id,
                        message : this.message
                    };
                    await http.post('create-message', data).then((response) => response.data).then((response) => {
                        this.$store.dispatch("chatLists")
                        this.$emit('sendmessage', response.data);
                        this.message = '';
                    }).catch((error) => {
                        console.log(error)
                        this.$tAlert('error', error.response.statusText)
                    });
                } else {
                    this.$tAlert('warning', "Your message is empty.")
                }
            }


        }
    }
</script>
