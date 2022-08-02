import axios from "axios";
import { ref, onMounted } from "vue";

let schema = ref([
  {
    $formkit: "text",
    label: "Perfil",
    validation: "required",
    id: "perfil_id",
    name: "perfil_id",
    placeholder: "Informe o perfil do contrato",
    classes: {
      wrapper: "max-w-full",
    },
  },
  {
    $formkit: "text",
    label: "Descrição",
    validation: "required",
    id: "descricao",
    name: "descricao",
    placeholder: "Informe a descrição do contrato",
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
    $formkit: "date",
    label: "Data Inicio",
    validation: "required",
    id: "data_inicio",
    name: "data_inicio",
    classes: {
      wrapper: "max-w-full",
    },
  },
  {
    $formkit: "date",
    label: "Data de Término",
    validation: "required",
    id: "data_fim",
    name: "data_fim",
    classes: {
      wrapper: "max-w-full",
    },
  },
]);

export function useContract() {
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
