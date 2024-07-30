

const chats = {
    state: {
        chatLists: [],
    },
    getters: {
        chatLists: (state) => {
            return state.chatLists;
        }
    },
    mutations: {
        CHAT_LISTS: (state, rqsData) => {
            state.chatLists = rqsData.data;
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
    },
};

export default chats;
