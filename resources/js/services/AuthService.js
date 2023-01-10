import { multipart_headers } from '../Helper/helper';
import { routes } from '../config/api_routes';
import axios from 'axios';

export const authService = {

    // login
    login : (formData) => axios.post(routes.loginApi, formData),
    logout : () => axios.get(routes.logoutApi),
    
}