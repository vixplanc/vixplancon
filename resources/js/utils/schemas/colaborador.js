let schema = [
  {
    $formkit: "text",
    label: "Funcao",
    validation: "required",
    id: "funcao",
    name: "funcao",
    placeholder: "Informe a funcao do funcionário",
    classes: {
      wrapper: "max-w-full",
    },
  },
  {
    $formkit: "text",
    label: "Contrato",
    validation: "required",
    id: "contrato",
    name: "contrato",
    placeholder: "Informe o contrato",
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
    $formkit: "text",
    label: "User",
    validation: "required",
    id: "user",
    name: "user",
    placeholder: "Informe o Usuário",
    classes: {
      wrapper: "max-w-full",
    },
  },
  {
    $formkit: "text",
    label: "Nome",
    validation: "required",
    id: "nome",
    name: "nome",
    placeholder: "Informe o Nome",
    classes: {
      wrapper: "max-w-full",
    },
  },
];

export default schema