import { multipart_headers } from '../Helper/helper';
import { routes } from '../config/api_routes';
// import axios from 'axios';

export const employeService = {

    // Add Employe
    addEmploye: (formData) => window.axios.post(routes.addEmployeApi, formData, { headers: multipart_headers() }),
    getEmploye: (formData) => window.axios.post(routes.getEmployeApi, formData),
    activeInactiveEmploye : (data) => axios.post(routes.activeInactiveEmployeApi,data),
    getEmployeById : (id) => axios.post(routes.getEmployeByIdApi,id),
    editEmploye : (formData) => axios.post(routes.editEmployeApi, formData),
    deleteEmploye : (id) => axios.post(routes.deleteEmployeApi, id),
    
}