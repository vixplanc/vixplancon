let schema = [
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
];

export default schema
