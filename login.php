<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, red, orange, yellow);
        }
        div{
            background-color: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: white;
        }
        input{
            pad: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }
        button{
            background-color: dodgerblue;
            border: none;
            pad: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
        }
        button:hover{
            background-color: deepskyblue;
            cursor: pointer;
        }

    </style>
</head>
<body>


    
<form action="login.php" method="POST" style="margin-left: 20px;">
    <div> 
        <h1>Login</h1>
        <input type="text" name="email" placeholder="email@email">
        <br><br>
        <input type="password" name="senha" placeholder="Senha">
        <br><br>
        <input type="submit" name="login" value="Login">
        <a href="cadastro.php"><input type="button" value="Cadastrar"></a>
    </div>
</form>

    <?php
    
        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $senha = md5($_POST['senha']);
            $sql = "SELECT * FROM usuario WHERE email ='$email' AND senha ='$senha'";
            $result = $con->query($sql);
            
            if($result->num_rows >0){
                header("Location: relatorio.php");
            }else{
                header("Location: cadastro.php ");
            }
        }
    
    
    
    
    ?>



</body>
</html>
