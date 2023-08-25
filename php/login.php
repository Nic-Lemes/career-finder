<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];
  $telefone = $_POST["telefone"];
  $cidade = $_POST["cidade"];
  $uf = $_POST["uf"];

  // Verifica se o e-mail já existe na tabela
  $checkEmailQuery = "SELECT id FROM ProfissionaisAutonomos WHERE email = '$email'";
  $result = $conn->query($checkEmailQuery);

  if ($result->num_rows > 0) {
      echo "O e-mail já está em uso. Por favor, escolha outro.";
  } else {
      // Insere o novo profissional na tabela
      $insertQuery = "INSERT INTO ProfissionaisAutonomos (nomeCompleto, email, senha, numeroTelefone, cidade, uf) VALUES ('$nome', '$email', '$senha', '$telefone', '$cidade', '$uf')";
      if ($conn->query($insertQuery) === TRUE) {
          echo "Cadastro realizado com sucesso!";
      } else {
          echo "Erro ao cadastrar: " . $conn->error;
      }
  }
}

// Fecha a conexão com o banco de dados
$conn->close();

?>