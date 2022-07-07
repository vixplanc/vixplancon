<!-- <template>
    <div class="p-5 h-screen bg-gray-100">
        <h1 class="text-xl mb-2">Your orders</h1>

        <div class="overflow-auto rounded-lg shadow">
            <table class="w-full">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th
                            v-for="column in columns"
                            class="p-3 text-sm font-semibold tracking-wide text-left"
                        >
                            {{ column.title }}
                        </th>
                        <th>
                            <button @click="add" class="btn btn-sm btn-accent m-1">
                                ADICIONAR
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="bg-white" v-for="row in rows">
                        <td
                            v-for="cell in row" :key="row.id"
                            class="p-3 text-sm text-gray-700"
                        >
                            {{ cell }}
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <button
                                @click="handleModalEdit(row.id)"
                                class="btn btn-square btn-sm btn-outline btn-primary m-1"
                            >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                                        />
                                    </svg>
                            </button>
                            <button
                                @click="handleModalDelete(row.id)"
                                class="btn btn-square btn-sm btn-outline btn-error m-1"
                            >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                        />
                                    </svg>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import API from "../../../Services/api";
import { reactive, ref, onMounted, watch } from "vue";

const api = new API("api/equipamento");

const columns = [
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
];

const rows = ref([]);

const fetchEquipamentos = api.show().then((response) => {
    rows.value = response.data;
});

const emits = defineEmits(["pressed", "update", "delete"]);

function handleModalEdit(id){
    const result = filterById(id)
    emits("update", id)
}

function handleModalDelete(id){
    emits("delete", id)
}

function add() {
    emits("pressed");
}

function filterById(id){
    console.log("asda");
    console.log(rows.value);//
    return rows.value.find((row) =>
        {
            if(row.id == id) {
                console.log("achou:"+id)
                return row
            }
        }
    )
}



onMounted(() => {
    fetchEquipamentos;
    console.log(rows);
});
</script> -->
