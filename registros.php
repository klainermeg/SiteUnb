<?php 
    include("db.php");
    $error = "";
    if(isset($_POST['registrar'])){
        $nome = $_POST['nome'];
        $matricula = $_POST['matricula'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $confirm = $_POST['confirm'];

        $verify = mysqli_query("SELECT * FROM users WHERE email = '$email'");

        if(strlen($nome) <1){
            $error = "<h2 style='color:red'>Preencha o campo Nome adequadamente</h2>";
        }else if(strlen($matricula)< 9){
            $error = "<h2 style='color:red'>Preencha o campo Matricula adequadamente</h2>";
        }else if(strlen($email)<10){
            $error = "<h2 style='color:red'>Preencha o campo Email com um endereco valido</h2>";
        }else if(strlen($pass)<6){
            $error = "<h2 style='color:red'>A senha deve conter no minimo 6 digitos</h2>";
        }else if(strlen($pass != $confirm)){
            $error = "<h2 style='color:red'>Confirmacao de senha invalida, digite a mesma senha nos campos</h2>";
        }else if(mysqli_num_rows($verify)>0){
            $error = "<h2 style='color:red'>Email ja registrado</h2>";
        }else{
            mysqli_query("INSERT INTO 'users' ('nome', 'matricula', 'email', 'pass', 'active' ) VALUE ('$nome', '$matricula', '$email', '$pass', 'false')");
            $error = "<h2 style='color:red'>Registrado com Sucesso. Entre no seu Email pra verificacao.</h2>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro - Site Unb</title>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <?php include("header.html"); ?>
    <center>
    </br></br></br>
    <h1>Registre-se</h1>
        <div class="painel">
            <?php echo $error;?>
            <form method="POST">
                <table wight="50%">
                    <tr>
                        <td style="float: right;">Nome</td>
                        <td><input type="name" name="nome"></td>
                    </tr>
                    <tr>
                        <td style="float: right;">Matricula</td>
                        <td><input type="matricula" name="matricula"></td>
                    </tr>
                    <tr>
                        <td style="float: right;">Email</td>
                        <td><input type="email" name="email"></td>
                    </tr>
                    <tr>
                        <td style="float: right;">Senha</td>
                        <td><input type="password" name="pass"></td>
                    </tr>
                    <tr>
                        <td style="float: right;">Confirme a Senha</td>
                        <td><input type="password" name="confirm"></td>
                    </tr>
                
                </table>
                    <tr>
                        <input type="submit" name="registrar" value="Registrar" >
                    </tr>
            </form>
        </div>
    </center>
</body>
</html>