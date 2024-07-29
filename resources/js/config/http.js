import axios from "axios";
import store from '../store/index'

axios.defaults.headers.common["Accept"] =  "*!/!*";
axios.defaults.headers.common["Content-Type"] =  "application/json";
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
        }
    );
}
export default axios

