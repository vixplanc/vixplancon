import axios from "axios";
import { ref, onMounted } from "vue";

let schema = ref([
     {
        $formkit: "select",
        label: "Funcao",
        validation: "required",
        id: "funcao",
        name: "funcao",
        placeholder: "Selecione a função do Colaborador",
        url: "api/funcoes/select",
        classes: {
            wrapper: "max-w-full",
        },
    },
     {
        $formkit: "select",
        label: "Contrato",
        validation: "required",
        id: "contrato",
        name: "contrato",
        placeholder: "Informe o contrato",
        url: "api/contratos/select",
        classes: {
            wrapper: "max-w-full",
        },
    },
    {
        $formkit: "text",
        label: "Centro de Custo",
        validation: "required",
        id: "centro_custo",
        name: "centro_custo",
        placeholder: "Informe o centro de Custo",
        classes: {
            wrapper: "max-w-full",
        },
    },
    {
        $formkit: "select",
        label: "Usuário",
        validation: "required",
        id: "usuario",
        name: "usuario",
        placeholder: "Informe o usuário",
        url: "api/usuarios/select",
        classes: {
            wrapper: "max-w-full",
        },
    },
    // {
    //     $formkit: "text",
    //     label: "Nome",
    //     validation: "required",
    //     id: "nome",
    //     name: "nome",
    //     placeholder: "Informe o Nome",
    //     classes: {
    //         wrapper: "max-w-full",
    //     },
    // },
]);

export function useEmployee() {
    const selectsOptionsPopulator = () => {
        schema.value.filter((e) => {
            if (e.$formkit === "select") {
                if (e.hasOwnProperty("url")) {
                    axios.get(e.url).then((response) => {
                        e.options = response.data;
                    });
                }
            }
        });
    };

    onMounted(() => {
        selectsOptionsPopulator();
    });

    return {
        schema,
    };
}
