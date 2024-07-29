<template>
    <div class="main-layout card-bg-1">
        <div class="container d-flex flex-column">
            <div class="row no-gutters align-items-center justify-content-center min-vh-100">
                <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                    <div class="text-center">
                        <h1 class="font-weight-bold">Welcome To ChatAPP</h1>
                        <p class="text-dark mb-3">Login Your Panel</p>
                    </div>
                    <form class="mb-3" @submit.prevent="login()">
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
                        <div class="form-group d-flex justify-content-between">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked="" id="checkbox-remember">
                                <label class="custom-control-label text-muted font-size-sm" for="checkbox-remember">Remember me</label>
                            </div>
                            <a class="font-size-sm" href="#">Reset password</a>
                        </div>

                        <button v-if="isLoading === 0" class="btn btn-primary btn-lg btn-block text-uppercase font-weight-semibold" type="submit">Sign in</button>
                        <button v-else-if="isLoading === 1" class="btn btn-secondary btn-lg btn-block text-uppercase font-weight-semibold" type="button">Loading...</button>
                        <button v-else-if="isLoading === 2" class="btn btn-success btn-lg btn-block text-uppercase font-weight-semibold" type="button">Redirecting...</button>
                    </form>

                    <p>Don't have an account? <router-link class="font-weight-semibold" :to="{name: 'Register'}">Sign up</router-link>.</p>
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
                isLoading: 0,
                user: {
                    email: '',
                    password: ''
                },
                errors:[],
            }
        },

        mounted() {
            if (this.$store.getters.isLoggedIn === true) {
                this.$router.push({ path: `/` });
            }
        },

        methods: {
            login(){
                this.isLoading = 1;
                http.post('login', this.user).then((response) => {
                    this.isLoading = 2;
                    this.$store.dispatch("login", response.data)
                    window.location.reload()
                }).catch((error) => {
                    this.$tAlert('error', error.response.statusText)
                    if (error.response.status === 422 || error.response.status === 401) {
                        this.errors = error.response.data.errors
                    }
                    this.isLoading = 0;
                });
            }
        }
    }
</script>
