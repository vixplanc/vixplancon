
const url = "api/equipamentos";


class EquipamentosAPI {
    dataset(){
        return "val"
    }

    show = async () => {
        try {
            return await axios.get(url);
        } catch (error) {
            throw new Error(error);
        }
    };

    create = async (payload) => {
        try {
            return await axios.post(url, payload);
        } catch (error) {
            throw new Error(error);
        }
    };

    update = async (payload) => {
        try {
            return await axios.put(`${url}/${payload.id}`, payload);
        } catch (error) {
            throw new Error(error);
        }
    };

    remove = async (payload) => {
        try {
            return await axios.delete(`${url}/${payload.id}`);
        } catch (error) {
            throw new Error(error);
        }
    };
}

export default new EquipamentosAPI;
