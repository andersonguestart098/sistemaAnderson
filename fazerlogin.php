<!DOCTYPE html>
<html>
    <head>
        <title>Login com hierarquia</title>
    </head>
<style>
            body{
            font-family: Arial, Helvetica, sans-serif;
            background-image:url(https://static.wixstatic.com/media/2fbcb5_d276e2a6abc54c47befd5d1a5137a5ab~mv2.jpg);
            background-size:1430px

        }
        div{
            background-color: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 50px;
            border-radius: 15px;
            color: white;

        }
        input{
           padding: 15px;
            border: none;
            border-radius:9px;
            outline: none;
            font-size: 15px;
        }

        #subimit{
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            cursor: pointer;
        }
        #subimit:hover{
            background-color: deepskyblue;
        }
        h4{
            font-family: Bodoni MT / Bodoni 72;
            font-size:20pt;
        }
    
</style>
    <body>
        <div>
            <h4>LOGIN</h4>
        <form method="POST" action="login.php">
            <input type="text" name="usuario" placeholder="Digite seu usuario"/>
            <br><br>
            <input type="password" name="senha" placeholder="Digite sua senha"/>
            <br><br>
            <input id="subimit" type="submit" value="entrar" />
        </form></div>
    </body>
</html>