<?php

//criei variaveis para receber as credenciais de acesso ao meu banco de dados instalado no xampp
$servidor = "localhost";
$user = "bernardo";
$pass = "250317";
$dbname = "agenda";

//criar a conexão com o banco de dados.
$conex = new mysqli($servidor, $user, $pass, $dbname);

if ($conex->connect_error) {
  include("index.html");
  echo "<script>
    swal.fire({ 
      icon: 'error'  
      title: 'Erro',   
      text: 'Ocorreu um erro ao tentar realizar a conexão com o banco: " . mysqli_error($conex) . "',   
    });
    </script>";

}

$titulo = filter_input(INPUT_POST, 'tarefa', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
$horario = filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_STRING);

$dataF = DateTime::createFromFormat('Y-m-d', $data);
$dataFormatada = $dataF->format('d/m/Y');

$sql = "INSERT INTO cadastro (titulo, descricao, data, horario) VALUES ('$titulo', '$descricao', '$dataFormatada', '$horario')";

if ($conex->query($sql) === TRUE) {
  include("index.html");
  echo "<script>
    swal.fire({   
      title: 'Sucesso',   
      text: 'Agendamento realizado com sucesso!!!',
      icon: 'success' 
    });
    </script>";

} else {
  include("index.html");
  echo "<script>
    swal.fire({ 
      icon: 'error'  
      title: 'Erro ao agendar tarefa',   
      text: 'Ocorreu um erro ao tentar realizar o agendamento: " . mysqli_error($conex) . "',  
      closeOnConfirm: false // ou mesmo sem isto
    });
    </script>";
}

$conex->close();

?>