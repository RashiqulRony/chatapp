const setting = {
    state: {
        navBar: 'chat',
    },
    getters: {
        navBar: (state) => {
            return state.navBar;
        }
    },
    mutations: {
        NAV_BAR: (state, request) => {
            state.navBar = request;
        }
    },
    actions: {
        navBar(context, request) {
            context.commit("NAV_BAR", request);
            return Promise.resolve(request);
        },
    },
};

export default setting;
