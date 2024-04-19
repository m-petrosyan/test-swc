import axios from "axios";

axios.defaults.baseURL = import.meta.env.VITE_APP_API

const getRequest = async (urlPath, data) => {
    let headers = await getHeader();
    return axios
        .get(urlPath, {...headers, params: data})
        .then(response => response.data)
        .catch(error => Promise.reject(error.response.data.data))
};

const postRequest = async (urlPath, data) => {
    let headers = await getHeader();
    return axios
        .post(urlPath, data, headers)
        .then(response => response.data)
        .catch(error => Promise.reject(error.response.data));
};

const deleteRequest = async (urlPath, body) => {
    let headers = await getHeader();
    headers = {...headers, ...{data: body}};
    return axios
        .delete(urlPath, headers)
        .then(response => response.data)
        .catch(error => Promise.reject(error.response.data));
};

const putRequest = async (urlPath, body) => {
    let headers = await getHeader();
    return axios
        .put(urlPath, body, headers)
        .then(response => response.data)
        .catch(error => Promise.reject(error.response.data));
};

const patchRequest = async (urlPath, body) => {
    let headers = await getHeader();
    return axios
        .patch(urlPath, body, headers)
        .then(response => response.data)
        .catch(error => Promise.reject(error.response.data));
};

const optionRequest = async (urlPath, body) => {
    let headers = await getHeader();
    return axios
        .options(urlPath, headers)
        .then(response => response.data)
        .catch(error => Promise.reject(error.response.data));
};

const getHeader = async () => {
    let access_token = sessionStorage.getItem('token')
    return {
        headers: {
            Authorization: `Bearer ${access_token}`,
            accept: "application/json"
        },
    };
};

export {postRequest, getRequest, patchRequest, putRequest, deleteRequest, optionRequest}
