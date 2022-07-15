import { env } from "process";

export class API {
    constructor(url){
        this.url = url
    }

    show = async () => {
        try {
            return await axios.get(this.url);
        } catch (error) {
            return "Erros"
        }
    };

    index = async (payload) => {
        try {
            return await axios.get(`${this.url}/${payload["id"]}`);
        } catch (error) {
            throw new Error(error);
        }
    };

    store = async (payload) => {
        try {
            return await axios.post(`${this.url}`, payload);
        } catch (error) {
            throw new Error(error);
        }
    };

    update = async (payload) => {
        try {
            return await axios.put(`${this.url}/${payload.id}`, payload);
        } catch (error) {
            throw new Error(error);
        }
    };

    remove = async (payload) => {
        try {
            return await axios.delete(`${this.url}/${payload.id}`);
        } catch (error) {
            throw new Error(error);
        }
    };
}

export default API;
