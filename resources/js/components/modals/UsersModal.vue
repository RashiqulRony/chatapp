<template>
    <div class="modal modal-lg-fullscreen fade" id="startConversation" tabindex="-1" role="dialog" aria-labelledby="startConversationLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-dialog-zoom">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="startConversationLabel">New Chat</h5>
                    <button @click="closeModal()" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-0 hide-scrollbar">
                    <div class="row">
                        <div class="col-12">
                            <!-- Search Start -->
                            <form class="form-inline w-100 p-2 border-bottom" @submit.prevent="getUsers()">
                                <div class="input-group w-100 bg-light">
                                    <input type="text" v-model="key" class="form-control form-control-md search border-right-0 transparent-bg pr-0" placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="input-group-text transparent-bg border-left-0" type="submit" role="button">
                                            <!-- Default :: Inline SVG -->
                                            <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-12">
                            <ul class="list-group list-group-flush" v-if="users.length > 0">
                                <li class="list-group-item" v-for="(user, index) in users" :key="index">
                                    <div class="media">
                                        <div class="avatar avatar-online mr-2">
                                            <img v-if="user.image" :src="'/storage/users/'+user.image" :alt="user.name">
                                            <img v-else :src="'/assets/media/avatar/user.png'" :alt="user.name">
                                        </div>
                                        <div class="media-body">
                                            <h6 class="text-truncate">
                                                <a href="#" class="text-reset">{{ user.name }}</a>
                                            </h6>
                                            <p class="text-muted mb-0">{{ user.email }}</p>
                                        </div>

                                        <div class="media-options">
                                            <button class="btn btn-outline-primary no-box-shadow" disabled v-if="user.id === $store.getters.authUser.id">
                                                Yourself
                                            </button>
                                            <button @click="createConversation(user.id)" class="btn btn-outline-primary no-box-shadow" title="Start Conversation" v-else>
                                                <svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item" v-show="loadExists">
                                    <div class="media justify-content-center">
                                        <button @click="loadMore(nextPage)" class="btn btn-outline-primary no-box-shadow">
                                            Load More
                                        </button>
                                    </div>
                                </li>

                            </ul>
                            <ul class="list-group list-group-flush" v-else>
                                <li class="list-group-item">
                                    <div class="media justify-content-center">
                                        User Not Fund
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import http from "../../config/http.js";

export default {
        data() {
            return {
                users: [],
                key: '',
                loadExists: false,
                nextPage: 0,
            }
        },

        mounted() {
            this.getUsers()
        },

        methods: {
            async getUsers() {
                await http.get('get-users?key='+this.key).then((response) => response.data).then((response) => {
                    this.users = response.data.data;
                    if (response.data.current_page < response.data.last_page) {
                        this.loadExists = true
                        this.nextPage = response.data.current_page + 1
                    } else {
                        this.loadExists = false
                    }
                }).catch((error) => {
                    this.$tAlert('error', error.response.statusText)
                });
            },

            async loadMore(nextPage) {
                await http.get('get-users?key='+this.key+'&page='+nextPage).then((response) => response.data).then((response) => {
                    if (response.data.current_page < response.data.last_page) {
                        this.loadExists = true
                        this.nextPage = response.data.current_page + 1
                    } else {
                        this.loadExists = false
                    }
                    response.data.data.forEach(data => {
                        this.users.push(data)
                    })

                }).catch((error) => {
                    this.$tAlert('error', error.response.statusText)
                });
            },

            async closeModal () {
                this.key = '';
                await this.getUsers();
            },

            createConversation: async function (userId) {
                await http.post('create-room', {user_id: userId}).then((response) => response.data).then((response) => {
                    this.$store.dispatch("chatLists")
                    this.users = this.users.filter(x => { return x.id !== userId })
                    this.$tAlert('success', response.message)
                }).catch((error) => {
                    this.$tAlert('error', error.response.statusText)
                });
            }
        }
    }
</script>
