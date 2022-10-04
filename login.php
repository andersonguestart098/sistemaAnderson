<?php
    require("conexao.php");

    if(isset($_POST["usuario"]) && isset($_POST["senha"]) && $conn != null){
        $query = $conn->prepare("SELECT * FROM usuarioslogin WHERE usuario = ? AND senha = ?");
        $query->execute(array($_POST["usuario"], $_POST["senha"]));

        if($query->rowCount()){
            $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

            session_start();
            $_SESSION["usuario"] = array($user["nome"], $user["adm"]);

            echo "<script>window.location = 'home.php'</script>";
        }else{
            echo "<script>window.location = 'fazerlogin.php'</script>";
        }
    }else{
    echo "<script>window.location = 'fazerlogin.php'</script>";
    }

        /*if($query->rowCount()){
            $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

            session_start();
            $_SESSION["usuario"] = array($user["nome"], $user["adm"]);

            echo "<script>window.location = '/sistema.php'</script>";
        }else{
            echo "<script>window.location = '/login.php'</script>";
        }
    }else{
        echo "<script>window.location = 'login.php'</script>";
    }
    */
?>