import config from "./index";

const routes = {

    // lohin
    loginApi: config.api_url +'login',
    logoutApi: config.api_url +'logout',
    // democurd
    addEmployeApi: config.api_url + "addemploye",
    getEmployeApi: config.api_url + "getemploye",
    activeInactiveEmployeApi: config.api_url + "activeinactiveemploye",
    getEmployeByIdApi: config.api_url + "getemployebyid",
    editEmployeApi: config.api_url + "editemploye",
    deleteEmployeApi: config.api_url + "deleteemploye",
};

export { routes };
