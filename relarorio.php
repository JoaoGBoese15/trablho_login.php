<div style="background-color: #fff; width: 50%; margin: 0 auto; padding: 10px; border-radius: 10px; box-shadow: 0 0 10 rgba(0,0,0,0.2)";>

    <?php
    
    include "config.php";
    $sql = "SELECT nome, email, senha FROM usuario";
    $result = $con->query($sql);
    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            echo "Nome: " . $row["nome"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "Senha: " . $row["senha"] . "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
        }
    }
    else
    {
        echo "Nehum registro encontrado";
    }
    ?>
