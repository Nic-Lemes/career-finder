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

// Consulta para selecionar todos os profissionais autônomos
$sql = "SELECT * FROM ProfissionaisAutonomos";
$result = $conn->query($sql);

// Verifica se há resultados
if ($result->num_rows > 0) {
    // Loop através dos resultados e exibe os dados
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Nome: " . $row["nomeCompleto"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "Telefone: " . $row["numeroTelefone"] . "<br>";
        echo "Cidade: " . $row["cidade"] . "<br>";
        echo "UF: " . $row["uf"] . "<br>";
        echo "<br>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}

// Fecha a conexão com o banco de dados
$conn->close();
?>