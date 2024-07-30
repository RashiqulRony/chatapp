
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
            state.chatLists = rqsData.chat_list;
        }
    },
    actions: {
        chatLists(context, rqsData) {
            context.commit("CHAT_LISTS", rqsData);
            return Promise.resolve(rqsData);
        },
    },
};

export default chats;
