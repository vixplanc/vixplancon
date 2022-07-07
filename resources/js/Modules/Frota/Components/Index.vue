<template>
    <div class="p-5 h-screen bg-gray-100">
        <!-- Title -->
        <h1 class="text-xl mb-2">Equipamentos</h1>
        <div class="overflow-auto rounded-lg shadow">
            <table class="w-full">
                <!-- Columns -->
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th
                            v-for="column in columns"
                            class="p-3 text-sm font-semibold tracking-wide text-left"
                        >
                            {{ column.title }}
                        </th>
                        <th>
                            <button
                                @click="emits('pressed', {mode:'create', id:null})"
                                class="btn btn-sm btn-accent m-1"
                            >
                                ADICIONAR
                            </button>
                        </th>
                    </tr>
                </thead>
                <!-- Rows -->
                <tbody class="divide-y divide-gray-100">
                    <tr class="bg-white" v-for="row in rows">
                        <td
                            v-for="cell in row"
                            :key="row.id"
                            class="p-3 text-sm text-gray-700"
                        >
                            {{ cell }}
                        </td>
                        <td class="p-3 text-sm text-gray-700 whitespace-nowrap">
                            <button
                                @click="emits('pressed', {mode:'update', id:row.id})"
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
                                @click="emits('pressed', {mode:'delete', id:row.id})"
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

import { ref, watch } from "vue";

//Variaveis inciadas e com mutabilidade atribuida
const columns = ref(props.columns)
const rows = ref(props.rows);

//Propriedades (Array deLinhas e Array de Colunas) recebida do componente pai
const props = defineProps({
    columns: {
        type: Array,
        default: []
    },
    rows: {
        type: Array,
        default: []
    }
})

//Emissor: Evento a ser acionado no componente pai quando clicado
const emits = defineEmits(["pressed"]);

//Observador
//Fica observando as propriedades (Coluna e Linha)
//para atualizar a qualquer alterações nos dados da tabela
watch(
    [
        rows,
        () => (rows.value = props.rows),
    ],
    [
        columns,
        () => (columns.value = props.columns)
    ]
);

</script>
