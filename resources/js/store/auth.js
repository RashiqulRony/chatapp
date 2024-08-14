const authInfo = localStorage.getItem("__AUTH_INFO");
const accessToken = localStorage.getItem("__ACCESS_TOKEN");

const auth = {
    state: {
        authInfo: authInfo ? JSON.parse(authInfo) : null,
        accessToken: accessToken ? accessToken : '',
        refreshToken: authInfo ? JSON.parse(authInfo).refreshToken : '',
        isLoggedIn: !!authInfo,
    },
    getters: {
        isLoggedIn: (state) => {
            return state.isLoggedIn;
        },
        authUser: (state) => {
            return state.authInfo;
        },
        authId: (state) => {
            return state.authInfo.id;
        },
        accessToken: (state) => {
            return state.accessToken;
        },
        refreshToken: (state) => {
            return state.refreshToken;
        },
    },
    mutations: {
        LOGIN_SUCCESS: (state, request) => {
            localStorage.setItem("__AUTH_INFO", JSON.stringify(request.user));
            localStorage.setItem("__ACCESS_TOKEN", request.token);
            state.isLoggedIn = true;
            state.authInfo = request;
            state.accessToken = request.token;
            state.refreshToken = request.refreshToken;
        },
        UPDATE_PROFILE : (state, request) => {
            localStorage.setItem("__AUTH_INFO", JSON.stringify(request.data));
            state.authInfo = request.data;
        },
        UPDATE_TOKEN: (state, request) => {
            state.accessToken = request.token;
            state.refreshToken = request.token;
            localStorage.setItem("__ACCESS_TOKEN", request.token);
        },
        LOGOUT: (state) => {
            localStorage.removeItem("__AUTH_INFO");
            localStorage.removeItem("__ACCESS_TOKEN");
            state.isLoggedIn = false;
            state.authInfo = null;
            state.accessToken = "";
            state.refreshToken = "";
        },
    },
    actions: {
        login(context, request) {
            context.commit("LOGIN_SUCCESS", request);
            return Promise.resolve(request);
        },
        logout(context) {
            return context.commit("LOGOUT");
        },
        updateProfile(context, request) {
            context.commit("UPDATE_PROFILE", request);
            return Promise.resolve(request);
        },
        refreshToken(context, request) {
            localStorage.removeItem("__ACCESS_TOKEN");
            context.commit("UPDATE_TOKEN", request);
            return Promise.resolve(request);
        },
    },
};

export default auth;
