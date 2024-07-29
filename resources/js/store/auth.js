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
        accessToken: (state) => {
            return state.accessToken;
        },
        refreshToken: (state) => {
            return state.refreshToken;
        },
    },
    mutations: {
        LOGIN_SUCCESS: (state, rqsData) => {
            localStorage.setItem("__AUTH_INFO", JSON.stringify(rqsData));
            localStorage.setItem("__ACCESS_TOKEN", rqsData.token);
            state.isLoggedIn = true;
            state.authInfo = rqsData;
            state.accessToken = rqsData.token;
            state.refreshToken = rqsData.refreshToken;
        },
        UPDATE_TOKEN: (state, rqsData) => {
            state.accessToken = rqsData.token;
            state.refreshToken = rqsData.token;
            localStorage.setItem("__ACCESS_TOKEN", rqsData.token);
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
        login(context, rqsData) {
            context.commit("LOGIN_SUCCESS", rqsData);
            return Promise.resolve(rqsData);
        },

        logout(context) {
            return context.commit("LOGOUT");
        },

        refreshToken(context, rqsData) {
            localStorage.removeItem("__ACCESS_TOKEN");
            context.commit("UPDATE_TOKEN", rqsData);
            return Promise.resolve(rqsData);
        },
    },
};

export default auth;
