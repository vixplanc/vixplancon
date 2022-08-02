import axios from "axios";
import { ref, onMounted } from "vue";
const schema = ref([
    {
        $formkit: "text",
        label: "Descrição",
        validation: "required",
        id: "descricao",
        name: "descricao",
        placeholder: "Informe a descricao do modelo",
        classes: {
            wrapper: "max-w-full",
        },
    },
    {
        $formkit: "text",
        label: "Capacidade",
        validation: "required",
        id: "capacidade",
        name: "capacidade",
        placeholder: "Informe a capacidade do equipamento",
        classes: {
            wrapper: "max-w-full",
        },
    },
    {
        $formkit: "text",
        label: "Tipo",
        validation: "required",
        id: "tipo",
        name: "tipo",
        placeholder: "Informe o tipo de equipamento",
        classes: {
            wrapper: "max-w-full",
        },
    },
    {
        $formkit: "text",
        label: "Subtipo",
        validation: "required",
        id: "subtipo",
        name: "subtipo",
        placeholder: "Informe o subtipo do equipamento",
        classes: {
            wrapper: "max-w-full",
        },
    },
]);

export function useEquipmentType() {
    const selectsOptionsPopulator = () => {
        schema.value.filter((e) => {
            if (e.$formkit === 'select') {
                if(e.hasOwnProperty('url')){
                    axios.get(e.url).then((response) => {
                        e.options = response.data
                    })
                }
            }
        });
    };

    onMounted(() => {
          selectsOptionsPopulator()  
    });

    return {
        schema,
    }
}
