import API from "../../Services/api"

const api = new API("api/equipamento")

// Create a new store instance.
const equipamento = {
    state: {
        show: false,
        mode: "create",
        dataset: [],
        allData: [],
        singleData: {}
    },
    getters: {
        getModalShow: (state) => state.show,
        getModalMode: (state) => state.mode,
        getModalFormData: (state) => state.singleData,
        getAllData: (state) => state.allData
    },
    actions: {
        async fetchAllData({ commit }) {
            try {
                const response = await api.show();
                commit("SET_ALL_DATA", await response.data);
            } catch (error) {
                alert(error);
                console.log(error);
            }
        },

        async fetchSingleData({ commit }, payload) {
            try {
                const response = await api.index(payload);
                commit("SET_SINGLE_DATA", await response.data);
            } catch (error) {
                alert(error);
                console.log(error);
            }
        },

        showModal({ commit }, payload = "create"){
            commit("MODAL_MODE", payload)
            commit("MODAL_TOGGLE")
        }

    },
    mutations: {
        MODAL_TOGGLE: (state) => {
            state.show = !state.show;
        },
        MODAL_MODE: (state, modalMode) => {
            state.mode = modalMode
        },
        SET_ALL_DATA(state, responseData) {
            state.allData = responseData
        },
        SET_SINGLE_DATA(state, responseData) {
            state.singleData = responseData
        }
    },
};

export default equipamento;
