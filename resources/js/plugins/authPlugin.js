
let instance;

// import config from '../config'
import { authService } from '../services';
import router from '../index';
import { error_message, success_message, set_axios_defaults, store_token, remove_token } from '../Helper/helper'


export const useAuth = (options = {}) => {
  if (instance) return instance;
  instance = new Vue({
    data() {
      return {
        user: null,
        setting: null,
        logging_done: false,
        unreadMessages: [],
        received: 0,
      }
    },
    methods: {
      login(formData) {
        authService.login(formData).then((response) => {
          let token = response.data.token;
          if(token){
            this.logging_done = true;
            this.user = response.data.user
            store_token(token)
            set_axios_defaults(token)
            success_message(response.data.message)
            router.push({ name: "employe" });
          }else{
            error_message(response.data.errors)
          }
        })
      },
      logout() {
        authService.logout()
          .then(response => {
            remove_token();
            this.logging_done = false;
            set_axios_defaults()
            router.push({ name: "login" });
          });
      },
    }
  });
  return instance;

}

export default {
  install(Vue, options = {}) {
    Vue.prototype.$auth = useAuth(options);
  }
};
