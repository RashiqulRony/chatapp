import { createStore } from 'vuex'
import auth from "./auth";
import chats from "./chats";

const store = createStore({
    modules: {
        auth: auth,
        chats: chats,
    },
});

export default store
