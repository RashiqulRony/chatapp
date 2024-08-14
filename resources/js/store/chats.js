

const chats = {
    state: {
        chatLists: [],
        chatStart: '',
        chatRoom: '',
        chatUser: '',
        chatMessages: [],
    },
    getters: {
        chatLists: (state) => {
            return state.chatLists;
        },
        chatStart: (state) => {
            return state.chatStart;
        },
        chatRoom: (state) => {
            return state.chatRoom;
        },
        chatUser: (state) => {
            return state.chatUser;
        },
        chatMessages: (state) => {
            return state.chatMessages;
        }
    },
    mutations: {
        CHAT_LISTS: (state, request) => {
            state.chatLists = request.data;
        },
        CHAT_START: (state, request) => {
            state.chatStart = request;
        },
        CHAT_ROOM: (state, request) => {
            state.chatRoom = request;
        },
        CHAT_USER: (state, request) => {
            state.chatUser = request;
        },
        CHAT_MESSAGES: (state, request) => {
            state.chatMessages = request;
        }
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
        chatRoom(context, request) {
            context.commit("CHAT_ROOM", request);
            return Promise.resolve(request);
        },
        chatUser(context, request) {
            context.commit("CHAT_USER", request);
            return Promise.resolve(request);
        },
        chatMessages(context, request) {
            context.commit("CHAT_MESSAGES", request);
            return Promise.resolve(request);
        }
    },
};

export default chats;
