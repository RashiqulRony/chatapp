import axios from "axios";
import store from '../store/index'

axios.defaults.headers.common["Accept"] =  "application/json";
axios.defaults.headers.common["Content-Type"] =  "application/json";
axios.defaults.headers.common["Content-Type"] =  "multipart/form-data";
axios.defaults.baseURL = "http://127.0.0.1:8000/api";

if (store.getters.isLoggedIn === true) {
    axios.interceptors.request.use(async (config) => {
            if (config.headers) {
                config.headers['Authorization'] = `Bearer ${store.getters.accessToken}`;
                return config;
            }
            return config;
        }, (error) => {
        Promise.reject(error);
        this.$store.dispatch("logout")
        this.$router.push({ path: `/auth/login` });
        }
    );
}
export default axios

