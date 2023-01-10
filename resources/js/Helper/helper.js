import router from "../index"

const multipart_headers = () => ({ "Content-Type": "multipart/form-data" });

const set_axios_defaults = (token) => {

    window.axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
    window.axios.defaults.headers.common["Accept"] = "application/json";
    window.axios.defaults.headers.common["Access-Control-Allow-Origin"] = "*";
    window.axios.interceptors.response.use(
        function (response) {
            return response;
        },
        function (error) {
            if (error.response.status == 401) {
                console.log('abid balblabla')
                if(window.axios.defaults.headers.common.Authorization !== 'Bearer null' || error.response.data.message == 'Unauthenticated.'){
                    Vue.toasted.error('Session Expired. Try login again',{
                      duration: 2000
                    });
                    remove_token();
                    Vue.prototype.$auth.logging_done = false;
                    router.push({ name: "login" }).catch(() => {});
                  }
            } else if (err.response.status === 500) {
                Vue.toasted.error("Server error", {
                    duration: 5000,
                });
            }
            return Promise.reject(error);
        }
    );
    
  }

const set_Token =() => {
    console.log('hello abid ===')
    var token = localStorage.getItem("token")
    console.log(token)
    if(token){
        Vue.prototype.$auth.logging_done = true;
        console.log("authPlugin.logging_done");
        set_axios_defaults(token);
    }
}
const store_token = (token)=> localStorage.setItem('token', token);
const remove_token = () => localStorage.removeItem('token');
const error_message = (errors) => Vue.toasted.error(errors,{duration: 5000});
const success_message = (success) => Vue.toasted.success(success,{duration: 5000});

export { 
    multipart_headers,
    set_axios_defaults,
    remove_token,
    set_Token,
    store_token,
    error_message,
    success_message,
 };
