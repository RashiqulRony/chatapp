

const chats = {
    state: {
        chatLists: [],
        chatStart: '',
    },
    getters: {
        chatLists: (state) => {
            return state.chatLists;
        },
        chatStart: (state) => {
            return state.chatStart;
        }
    },
    mutations: {
        CHAT_LISTS: (state, request) => {
            state.chatLists = request.data;
        },
        CHAT_START: (state, request) => {
            state.chatStart = request;
        },
    },
    actions: {
        chatLists(context) {
             axios.get('get-chat-lists').then((response) => response.data).then((response) => {
                 context.commit("CHAT_LISTS", response);
                 return Promise.resolve(response);
            }).catch((error) => {
                this.$tAlert('error', error.response.statusText)
            });
        },
        chatStart(context, request) {
            context.commit("CHAT_START", request);
            return Promise.resolve(request);
        },
    },
};

export default chats;
