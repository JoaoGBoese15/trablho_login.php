<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
    <style>
        body{
          font-family: Arial, Helvetica, sans-serif; 
          background-image: linear-gradient(45deg, red, orange, yellow); 
        }
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
            width: 20%;
            color: white;
        }
        fieldset{
            border: 3px solid white;
        }
        legend{
            border: 1px solid white;
            padding: 10px;
            text-align: center;
            background-color: black;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: yellow;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(80,19,220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80,19,195));
        }



    </style>

</head>
<body>
    <div class="box">
        <form action="" method="POST">
            <fieldset>
                <legend> <b>Cadastro</b> </legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">nome </label>
                </div>
<br><br>
                <div class="inputBox">
                     <input type="text" name="email" id="email" class="inputUser" required>
                        <label for="email" class="labelInput">email</label>
</div>
<br><br>
                <div class="inputBox">
                     <input type="password" name="senha" id="senha" class="inputUser" required>
                        <label for="senha" class="labelInput">senha</label>
<br><br><br>

                    <input type="submit" name="submit" id="submit">
                </div>
            </fieldset>
        </form>
    </div>
    <form action="cadastrar.php" method="POST" style="margin-left: 20px;">
        <h2>Criar</h2>
        <div class="divInput">

            <label for="usuario">Nome:</label>
            <input type="text" name="usuario" id="usuario" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required><br>
        </div>

        <input type="submit" id="button" value="Cadastrar" name="cadastrar">
    </form>

    <form action="cadastrar.php" method="POST" style="margin-left: 20px;">
        <h2>Atualizar</h2>
        <div class="divInput">
            <label for="id">ID:</label>
            <input type="number" name="id" id="id" required><br>

            <label for="usuario">Nome:</label>
            <input type="text" name="usuario" id="usuario" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br>
        </div>

        <input type="submit" id="button" value="Atualizar" name="atualizar">
    </form>

    <form action="cadastrar.php" method="POST" style="margin-left: 20px;">
        <h2>Deletar</h2>
        <div class="divInput">
            <label for="id">ID:</label>
            <input type="number" name="id" id="id" required><br>
        </div>

        <input type="submit" id="button" value="Deletar" name="deletar">
    </form>





<?php

    include "config.php";
    
    if(isset($_POST['submit']))
    {
        $nome=mysqli_real_escape_string($con, ($_POST['nome']));
        $email=mysqli_real_escape_string($con, ($_POST['email']));
        $senha=mysqli_real_escape_string($con, md5($_POST['senha']));
        

        $sql="INSERT INTO usuario(nome, email, senha) VALUES('$nome','$email','$senha')";


        if($con->query($sql) === TRUE){
            echo"Cadastro foi concluido!!!";
            header("Location: login.php");
        }
        else
        {
            echo"Erro!!!".$con->error;


        }} else if (isset($_POST["atualizar"])) {
            $id = mysqli_real_escape_string($con, $_POST["id"]);
            $nome = mysqli_real_escape_string($con, $_POST["nome"]);
            $email = mysqli_real_escape_string($con, $_POST["email"]);
    
            $sql = "UPDATE usuario SET nome = '$nome', email = '$email' WHERE id = '$id'";
    
            if ($con->query($sql) === TRUE) {
                echo "Atualizado com sucesso";
                header("Location: login.php");
            } else {
                echo "Erro ao atualizar: " . $con->error;
            }
    
        } else if (isset($_POST["deletar"])) {
            $id = mysqli_real_escape_string($con, $_POST["id"]);
    
            $sql = "DELETE FROM usuario WHERE id = '$id'";
    
            if ($con->query($sql) === TRUE) {
                echo "Deletado com sucesso";
                header("Location: login.php");
            } else {
                echo "Erro ao deletar: " . $con->error;
            }
        }

    


?>

</body>
</html>


