<template>
    <main class="main">
        <div class="chats">
            <div class="d-flex flex-column justify-content-center text-center h-100 w-100">
                <div class="container">
                    <div class="avatar avatar-lg mb-2">
                        <img class="avatar-img" src="../../../assets/media/avatar/4.png" alt="">
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
