<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome = $_POST['nome'];
        $password = $_POST['password'];
        Include("conectadodb.php");
    }
    //CONSULTA SQL PARA VERIFICAR USUARIO CADASTRADO
    $sql = "SELECT_CONT(usu_id).from usuarios WHERE usu_nome = $nome AND usu_senha = $password";
    $resultado = mysql_query($link, $sql);
    while ($tbl == mysql_fech_query($resultado)){
        $cont = $tbl[0];
    }  
    if($cont==1){
        header("Location: homesistema.html");
    }
    else{
        echo("<script>window.alert('USUARIO OU SENHA INCORRETOS!');</script>")
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LOGIN / USUARIOS</title>
        <link rel="stylesheet" href="./stylecadastra.css">

    </head>
    <body>

        <div class="container">
            <!-- SCRIPT PARA MOSTRAR SENHA -->
            <script>
                function mostrar_senha(){
                    var tipo = document.getElementById("senha")
                    if(tipo.type == "password"){
                        tipo.type = "text";
                    }
                    else{
                        tipo.type= "password";
                    }
                }
            </script>
            <!-- FIM DO SCRIPT PARA MOSTRAR SENHA -->

            <form action="login.php" method="POST">
                <h1>LOGIN DE USUARIO</h1>
                <input type="text" name="nome" id="nome" placeholder="Nome">
                <br>
                <input id="password" name="password" placeholder="Senha">
                <img id="olinho" onclic="mostrar_senha()" src="assets/eye.svg" >
                <br>
                <input type="submit" name="login" value="LOGIN">
            </form>
        </div>
        
    </body>
</html>