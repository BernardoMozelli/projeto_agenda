function validaCampos() {
    var DataInput = document.getElementById("data").value;

    if (DataInput == '') {
        Swal.fire({
            icon: "warning",
            title: "Algo deu errado...",
            text: "Favor verificar os dados fornecidos!",
        });
        return false;
    }

    // Converte a data do input para um objeto Date
    const [ano, mes, dia] = DataInput.split('-').map(Number);
    const dataSelecionada = new Date(ano, mes - 1, dia); // Mês é zero-indexado

    // Obtém a data atual
    const dataAtual = new Date();
    dataAtual.setHours(0, 0, 0, 0); // Zera as horas para considerar apenas a data

    // Verifica se a data selecionada é menor ou igual à data atual
    if (dataAtual > dataSelecionada) {
        Swal.fire({
            icon: "warning",
            title: "Algo deu errado...",
            text: "Favor inserir a data de hoje ou posterior!!!",
        });
        return false;
    }

    var inputTitulo = document.getElementById("tarefa").value;
    var inputDescricao = document.getElementById("descricao").value;
    var inputHorario = document.getElementById("horario").value;

    if (inputTitulo == '' || inputDescricao == '' || inputHorario == '') {
        Swal.fire({
            icon: "warning",
            title: "Algo deu errado...",
            text: "Favor verificar os dados fornecidos!",
        });
        return false;
    }

}
