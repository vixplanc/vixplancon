import { API } from "../api";
// const { API } = new API("api/equipamento");

class Modelos extends API {

    async get(id){
        return await this.index({id:id}).then((response) => response.data)
    }

    async getAll(){
        return await this.show().then((response) => response.data)
    }

}

export default new Modelos("api/equipamento");