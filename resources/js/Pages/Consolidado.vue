<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Repository from "@/Components/CRUD/Repository.vue";
import RepositoryModal from "@/Components/CRUD/RepositoryModal";
import { useConsolidated } from "@/utils/schemas/useConsolidated.js";
import API from "../Services/api";
import { ref, reactive, onMounted } from "vue";
const { schema } = useConsolidated();
const processing = ref(false);

const api = new API("api/consolidados");

const tableProps = reactive({
    rows: [],
    columns: [
        {
            name: "id",
            title: "ID",
        },
        {
            name: "modelo",
            title: "Modelo",
        },
        {
            name: "contrato",
            title: "Contrato",
        },
        {
            name: "contrato_centro_custo",
            title: "Contrato Centro Custo",
        },
        {
            name: "status",
            title: "Status",
        },
        {
            name: "contratual",
            title: "É contratual?",
        },
        {
            name: "prefixo",
            title: "Prefixo",
        },
        {
            name: "regime",
            title: "Regimo",
        },
        {
            name: "codigo_sap",
            title: "Código SAP",
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
    title: "Consolidados",
});

const formInitialize = {
    modelo: "",
    contrato: "",
    contrato_centro_custo: "",
    equipamento: "",
    status: "",
    contratual: "",
    prefixo: "",
    regime: "",
    codigo_sap: "",
    id: "",
};

const modalProps = reactive({
    operationType: "create",
    isOpen: false,
    formDataToUpdate: { ...formInitialize },
});

function showModal(data) {
    switch (data.mode) {
        case "create":
            modalProps.isOpen = true;
            modalProps.operationType = "create";
            break;
        case "update":
            fetchSingleData({ id: data.id }).then((responseData) => {
                modalProps.formDataToUpdate = responseData;
                modalProps.operationType = "update";
                modalProps.isOpen = true;
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

function closeModal() {
    Object.assign(modalProps.formDataToUpdate, formInitialize);
    console.log(modalProps.formDataToUpdate);
    modalProps.isOpen = false;
}

function handleModalConfirm(form) {
    switch (form.operationType) {
        case "create":
            api.store(form.payload)
                .then(() => {
                    onSuccessTransaction("Item inserido com sucesso");
                })
                .catch((error) => {
                    processing.value = false;
                    console.log("erro");
                });
            break;
        case "update":
            processing.value = true;
            api.update(form.payload)
                .then(() => {
                    onSuccessTransaction("Item atualizado com sucesso");
                })
                .catch((error) => {
                    processing.value = false;
                    console.log("erro");
                });
            break;
        case "delete":
            processing.value = true;
            api.remove(form.payload)
                .then(() => {
                    onSuccessTransaction("Item removido com sucesso");
                })
                .catch((error) => {
                    processing.value = false;
                    console.log("erro");
                });
            break;
        default:
            break;
    }
}

function onSuccessTransaction(message) {
    processing.value = false;
    closeModal();
    tableDraw();
    alert(message);
}

async function tableDraw() {
    fetchAllData().then((responseData) => (tableProps.rows = responseData));
}

async function fetchAllData() {
    return api.show().then((response) => response.data);
}

async function fetchSingleData(payload) {
    return api.index(payload).then((response) => response.data);
}

onMounted(() => {
    fetchAllData().then((responseData) => (tableProps.rows = responseData));
});
</script>

<template>
    <RepositoryModal
        :show="modalProps.isOpen"
        :formData="modalProps.formDataToUpdate"
        :mode="modalProps.operationType"
        :formSchema="schema"
        @close="closeModal"
        @save="handleModalConfirm"
    >
    </RepositoryModal>
    <AppLayout title="Consolidados">
        <template #header>
            <h2 class="font-bold text-xl text-white leading-tight">
                Gestão de Consolidados
            </h2>
        </template>

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <Repository
                    @pressed="showModal"
                    :rows="tableProps.rows"
                    :columns="tableProps.columns"
                    :title="tableProps.title"
                />
            </div>
        </div>
    </AppLayout>
</template>
