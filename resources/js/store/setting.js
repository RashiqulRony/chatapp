const setting = {
    state: {
        navBar: 'chat',
        imgPreview: '',
    },
    getters: {
        navBar: (state) => {
            return state.navBar;
        },
        imgPreview: (state) => {
            return state.imgPreview;
        }
    },
    mutations: {
        NAV_BAR: (state, request) => {
            state.navBar = request;
        },
        IMG_PREVIEW: (state, request) => {
            state.imgPreview = request;
        }
    },
    actions: {
        navBar(context, request) {
            context.commit("NAV_BAR", request);
            return Promise.resolve(request);
        },
        imgPreview(context, request) {
            context.commit("IMG_PREVIEW", request);
            return Promise.resolve(request);
        },
    },
};

export default setting;
