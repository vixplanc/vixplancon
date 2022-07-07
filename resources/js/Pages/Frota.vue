<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import ItemList from "@/Modules/Frota/Components/index.vue";
import ItemModal from "@/Modules/Frota/Components/ModalEquipamento";
import API from "../Services/api";
import { useStore } from "vuex";
import { reactive, onMounted } from "vue";

const api = new API("api/equipamento");
const store = useStore();

const tableProps = reactive({
    rows: [],
    columns: [
        {
            name: "id",
            title: "ID",
        },
        {
            name: "modelo_id",
            title: "Modelo",
        },
        {
            name: "denominacao",
            title: "Denominacao",
        },
        {
            name: "placa",
            title: "Placa",
        },
        {
            name: "chassi",
            title: "Chassi",
        },
        {
            name: "created_at",
            title: "Data Criação",
        },
        {
            name: "updated_at",
            title: "Data Atualização",
        },
    ],
});

const formDefault = {
    chassi: "",
    placa: "",
    denominacao: "",
    modelo_id: "",
    id: "",
};

const modalProps = reactive({
    operationType: "create",
    isOpen: false,
    formDataToUpdate: formDefault,
});

function showModal(data) {
    console.log(data);
    switch (data.mode) {
        case "create":
            modalProps.formDataToUpdate = formDefault;
            modalProps.operationType = "create";
            modalProps.isOpen = true;
            break;
        case "update":
            fetchSingleData({ id: data.id }).then((responseData) => {
                console.log(modalProps.formDataToUpdate);
                modalProps.formDataToUpdate = responseData;
                modalProps.operationType = "update";
                modalProps.isOpen = true;
                console.log(modalProps.formDataToUpdate);
            });
            break;
        case "delete":
            fetchSingleData({ id: data.id }).then((responseData) => {
                modalProps.formDataToUpdate = responseData;
                modalProps.operationType = "delete";
                modalProps.isOpen = true;
            });
            break;
        default:
            break;
    }
}

async function fetchAllDataToTable() {
    return api.show().then((response) => response.data);
}

async function fetchSingleData(payload) {
    return api.index(payload).then((response) => response.data);
}

function save(payload) {}

function closeModal() {
    modalProps.isOpen = false;
}

onMounted(() => {
    fetchAllDataToTable().then(
        (responseData) => (tableProps.rows = responseData)
    );
});
</script>

<template>
    <ItemModal
        :show="modalProps.isOpen"
        :form="modalProps.formDataToUpdate"
        :mode="modalProps.operationType"
        @close="closeModal"
    />
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-bold text-xl text-lime-900 leading-tight">
                Módulos
            </h2>
        </template>

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <ItemList
                    @pressed="showModal"
                    :rows="tableProps.rows"
                    :columns="tableProps.columns"
                />
            </div>
        </div>
    </AppLayout>
</template>
