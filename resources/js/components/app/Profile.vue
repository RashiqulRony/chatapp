<template>
    <div class="profile">
        <div class="container p-0">
            <div class="row">
                <div class="col">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-1">Account</h6>
                            <p class="mb-0 text-muted small">Update personal &amp; contact information</p>
                        </div>

                        <form @submit.prevent="updateProfile()">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control form-control-md" v-model="user.name" id="name" placeholder="Name">
                                            <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input type="text" class="form-control form-control-md" v-model="user.mobile" id="mobile" placeholder="Mobile number">
                                            <small class="text-danger" v-if="errors.mobile">{{ errors.mobile[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control form-control-md" v-model="user.email" id="email" placeholder="Email">
                                            <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="profileImage">Profile Image (300x300)</label>
                                            <input type="file" class="form-control form-control-md" id="profileImage" @change="imagePreview($event)" accept="image/*">
                                            <small class="text-danger" v-if="errors.image">{{ errors.image[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea type="text" class="form-control form-control-md" v-model="user.address" id="address" placeholder="Type your address"></textarea>
                                            <small class="text-danger" v-if="errors.address">{{ errors.address[0] }}</small>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="card-header text-center">
                                            <h6 class="mb-1">Social network profiles</h6>
                                            <p class="mb-0 text-muted small">Update personal &amp; contact information</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="github">Github</label>
                                            <input type="text" class="form-control form-control-md" v-model="user.github" id="github" placeholder="Ex: https://github.com/username">
                                            <small class="text-danger" v-if="errors.github">{{ errors.github[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="gitlab">Gitlab</label>
                                            <input type="text" class="form-control form-control-md" v-model="user.gitlab" id="gitlab" placeholder="Ex: https://gitlab.com/username">
                                            <small class="text-danger" v-if="errors.gitlab">{{ errors.gitlab[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="bitbucket">Bitbucket</label>
                                            <input type="text" class="form-control form-control-md" v-model="user.bitbucket" id="bitbucket" placeholder="Ex: https://bitbucket.org/username">
                                            <small class="text-danger" v-if="errors.bitbucket">{{ errors.bitbucket[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="linkedin">Linkedin</label>
                                            <input type="text" class="form-control form-control-md" v-model="user.linkedin" id="linkedin" placeholder="Ex: https://bd.linkedin.com/in/username">
                                            <small class="text-danger" v-if="errors.linkedin">{{ errors.linkedin[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-1">Password</h6>
                            <p class="mb-0 text-muted small">Update personal &amp; contact information</p>
                        </div>

                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="current-password">Current Password</label>
                                            <input type="password" class="form-control form-control-md" id="current-password" placeholder="Current password" autocomplete="on">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="new-password">New Password</label>
                                            <input type="password" class="form-control form-control-md" id="new_password" placeholder="New password" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="repeat-password">Repeat Password</label>
                                            <input type="password" class="form-control form-control-md" id="repeat-password" placeholder="Repeat password" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="button" class="btn btn-primary">Update</button>
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
            user: {
                name: this.$store.getters.authUser.name,
                email: this.$store.getters.authUser.email,
                mobile: this.$store.getters.authUser.mobile,
                address: this.$store.getters.authUser.address,
                github: this.$store.getters.authUser.github,
                gitlab: this.$store.getters.authUser.gitlab,
                bitbucket: this.$store.getters.authUser.bitbucket,
                linkedin: this.$store.getters.authUser.linkedin,
            },
            errors: []
        }
    },

    mounted() {
        console.log(this.$store.getters.authUser)
    },

    methods: {
        async updateProfile() {
            let postData = new FormData();
            let image = document.getElementById("profileImage").files[0];
            if (image !== undefined) {
                if (image.type === 'image/jpeg' || image.type === 'image/png' || image.type === 'image/jpg') {
                    postData.append('image', image);
                } else {
                    alert('This file is not an image')
                }
            }
            postData.append('name', this.user.name);
            postData.append('email', this.user.email);
            postData.append('mobile', this.user.mobile);
            postData.append('address', this.user.address);
            postData.append('github', this.user.github);
            postData.append('gitlab', this.user.gitlab);
            postData.append('bitbucket', this.user.bitbucket);
            postData.append('linkedin', this.user.linkedin);

            await http.post('update-profile', postData).then((response) => response.data).then((response) => {
                this.$store.dispatch('imgPreview', '')
                this.$store.dispatch('updateProfile', response)
                this.$tAlert('success', response.message)
            }).catch((error) => {
                this.$store.dispatch('imgPreview', '')
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors
                }
                this.$tAlert('error', error.response.statusText)
            });
        },

        imagePreview (e) {
            this.$imagePreview(e, 'profileImage', 'profile')
        }
    }
}
</script>
