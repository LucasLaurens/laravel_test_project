import axios from "axios";
import store from "../store/index";

console.log(process.env.MIX_APP_URL);
const axiosClient = axios.create({
  baseURL: process.env.MIX_APP_URL + '/api'
})

axiosClient.interceptors.request.use(config => {
  console.log(store.state.user.token);
  const token = store.state.user.token;
  config.headers.Authorization = `Bearer ${token}`
  return config;
})

export default axiosClient;
