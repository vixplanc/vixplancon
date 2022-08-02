import axios from "axios";
import { ref, onMounted } from "vue";

let schema = ref([
   {
    $formkit: "text",
    label: "Descricao",
    validation: "required",
    id: "descricao",
    name: "descricao",
    placeholder: "Informe a descrição da função",
    classes: {
      wrapper: "max-w-full",
    },
  },
]);

export function useEmployeRole() {
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
