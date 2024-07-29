<template>
    <div class="main-layout card-bg-1">
        <div class="container d-flex flex-column">
            <div class="row no-gutters align-items-center justify-content-center min-vh-100">
                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="text-center">
                        <h1 class="font-weight-bold">Welcome To ChatAPP</h1>
                        <p class="text-dark mb-3">Register as User</p>
                    </div>
                    <form class="mb-3" @submit.prevent="register()">
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" v-model="user.name" class="form-control form-control-md" id="name" placeholder="Enter your name">
                            <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email Address</label>
                            <input type="email" v-model="user.email" class="form-control form-control-md" id="email" placeholder="Enter your email">
                            <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" v-model="user.password" class="form-control form-control-md" id="password" placeholder="Enter your password">
                            <small class="text-danger" v-if="errors.password">{{ errors.password[0] }}</small>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="sr-only">Confirm Password</label>
                            <input type="password" v-model="user.password_confirmation" class="form-control form-control-md" id="password_confirmation" placeholder="Enter your confirm password">
                        </div>

                        <button v-if="isLoading" class="btn btn-secondary btn-lg btn-block text-uppercase font-weight-semibold" type="button">Loading...</button>
                        <button v-else class="btn btn-primary btn-lg btn-block text-uppercase font-weight-semibold" type="submit">Sign up</button>
                    </form>

                    <p>Already have an account? <router-link class="font-weight-semibold" :to="{name: 'Login'}">Sign in</router-link>.</p>
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
                isLoading: false,
                user: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                },
                errors:[],
            }
        },

        mounted() {
            if (this.$store.getters.isLoggedIn === true) {
                this.$router.push({ path: `/` });
            }
        },

        methods:{
            register() {
                this.isLoading = true;
                http.post('register', this.user).then((response) => {
                    this.isLoading = false;
                    this.$tAlert('success', response.data.message)
                    this.$router.push({ name: 'Login' });
                }).catch((error) => {
                    this.$tAlert('error', error.response.statusText)
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors
                    }
                    this.isLoading = false;
                });
            }
        }
    }
</script>
