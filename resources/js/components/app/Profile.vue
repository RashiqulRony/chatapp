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

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control form-control-md" id="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" class="form-control form-control-md" id="mobile" placeholder="Mobile number">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control form-control-md" id="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="image">Profile Image (300x300)</label>
                                        <input type="file" class="form-control form-control-md" id="image" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea type="text" class="form-control form-control-md" id="address" placeholder="Type your address"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="button" class="btn btn-primary">Update</button>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="mb-1">Social network profiles</h6>
                            <p class="mb-0 text-muted small">Update personal &amp; contact information</p>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="github">Github</label>
                                        <input type="text" class="form-control form-control-md" id="github" placeholder="Ex: https://github.com/username">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="gitlab">Gitlab</label>
                                        <input type="text" class="form-control form-control-md" id="gitlab" placeholder="Ex: https://gitlab.com/username">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="bitbucket">Bitbucket</label>
                                        <input type="text" class="form-control form-control-md" id="bitbucket" placeholder="Ex: https://bitbucket.org/username">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="linkedin">Linkedin</label>
                                        <input type="text" class="form-control form-control-md" id="linkedin" placeholder="Ex: https://bd.linkedin.com/in/username">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="button" class="btn btn-primary">Update</button>
                        </div>
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
export default {

    data() {
        return {

        }
    },

    mounted() {

    },

    methods: {

    }
}
</script>
