<template>
    <div class="chat-content p-2" id="messageBody">
        <div class="container">
            <div class="message-day" v-for="(chats, group) in $store.getters.chatMessages">

                <div class="message-divider sticky-top pb-2" :data-label="group">&nbsp;</div>

                <template v-for="(chat, index) in chats">
                    <div v-if="chat.sender_id === $store.getters.authId" class="message self">
                        <div class="message-wrapper">
                            <div class="message-content"><span>{{ chat.message }}</span></div>
                        </div>
                        <div class="message-options">
                            <div class="avatar avatar-sm">
                                <img v-if="$store.getters.authUser.image" :src="'/storage/users/'+$store.getters.authUser.image" :alt="$store.getters.authUser.name">
                                <img v-else :src="'/assets/media/avatar/user.png'" :alt="$store.getters.authUser.name">
                            </div>

                            <span class="message-date">Just now</span>

                            <div class="dropdown">
                                <a class="text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg class="hw-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/>
                                    </svg>
                                </a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                        </svg>
                                        <span>Copy</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                        <span>Edit</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                                        </svg>
                                        <span>Replay</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="hw-18 rotate-y mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                                        </svg>
                                        <span>Forward</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center text-danger" href="#">
                                        <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-else class="message">
                        <div class="message-wrapper">
                            <div class="message-content"><span>{{ chat.message }}</span></div>
                        </div>
                        <div class="message-options">
                            <div class="avatar avatar-sm">
                                <img v-if="$store.getters.chatUser.image" :src="'/storage/users/'+$store.getters.chatUser.image" :alt="$store.getters.chatUser.name">
                                <img v-else :src="'/assets/media/avatar/user.png'" :alt="$store.getters.chatUser.name">
                            </div>

                            <span class="message-date">Just now</span>

                            <div class="dropdown">
                                <a class="text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg class="hw-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/>
                                    </svg>
                                </a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                        </svg>
                                        <span>Copy</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                                        </svg>
                                        <span>Replay</span>
                                    </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                        <svg class="hw-18 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                        </svg>
                                        <span>Favourite</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- Scroll to finish -->
        <div class="chat-finished" id="chat-finished"></div>
    </div>
</template>

<script>
    export default {
        mounted() {

        }
    }
</script>

<style scoped>
.chat-body .chat-content {
    /* flex: 2; */
    -ms-overflow-style: none;
    /* scrollbar-width: none; */
    /* overflow-y: auto; */
    /* overflow-x: hidden; */
    height: calc(100vh - 150px)!important;
    overflow-y: auto;
}
</style>
