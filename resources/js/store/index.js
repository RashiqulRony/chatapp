import { createStore } from 'vuex'
import auth from "./auth";
import chats from "./chats";
import setting from "./setting.js";

const store = createStore({
    modules: {
        auth: auth,
        chats: chats,
        setting: setting,
    },
});

export default store
