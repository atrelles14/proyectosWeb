<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

section {
    position: relative;
    min-height: 100vh;
    background: #b9b9b9;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

section .container {
    position: absolute;
    width: 900px;
    height:600px;
    background: #fff;
    box-shadow: 0 15px 50px rgb(0 0 0 / 10%);
    overflow: hidden;
    left: 340px;
    top: 40px;
}


section .container .user {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
}

section .container .ribbon {
    background-color: #677eff;
    color: #fff;
    text-align: center;
    padding: 3px 0;
    position: relative;
    z-index: 2;
}

section .container .ribbon h2 {
    margin: 0;
}


section .container .user .imgBx {
    position: relative;
    width: 45%;
    height: 100%;
    background: #fff;
    transition: 0.5s;
}

section .container .user .imgBx img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}


section .container .user .formBx {
    position: relative;
    width: 50%;
    height: 100%;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0;
    transform: 0.5s;
}

section .container .user .formBx form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

section .container .user .formBx form .input-container {
    margin-top: -40px;
    margin-bottom: 30px;
    padding: 10px 10px 20px 30px;
    transform: 0.5s;
}


section .container .user .formBx form input {
    width: 100%;
    padding: 5px;
    background: #f5f5f5;
    color: #333;
    border: none;
    outline: none;
    box-shadow: none;
    font-size: 15px;
    letter-spacing: 1px;
    font-weight: 300;
}

section .container .user .formBx form input[type="submit"] {
    max-width: 120px;
    background: #677eff;
    color: #fff;
    cursor: pointer;
    font-size: 15px;
    font-weight: 500;
    letter-spacing: 1px;
    transition: 0.5s;
}

section .container .user .formBx form .signup {
    font-size: 12px;
    letter-spacing: 1px;
    color: #555;
    text-transform: uppercase;
    font-weight: 300;
}

section .container .user .formBx form .signup a {
    font-weight: 600;
    text-decoration: none;
    color: #677eff;
}

    </style>
</head>
<body>
    <section>
        <div class="container">
            <div class="ribbon">
                <h2>Iniciar Sesión</h2>
            </div>
            <div class="user singinBx">
                <div class="imgBx"><img src="/Proyecto_web/image/login-img.jpg" alt="Login Image"></div>
                <div class="formBx">
                    <form action="procesar_login.php" method="POST" enctype="multipart/form-data">
                        <h2>Ingresar</h2>
                        <div class="input-container">
                            <input type="text" name="usuario" placeholder="Usuario">
                        </div>
                        <div class="input-container">
                            <input type="password" name="password" placeholder="Contraseña">
                        </div>
                        <input type="Submit" name="login" value="Ingresar"><br>
                        <p class="signup">¿No tienes cuenta? <a href="Registro.php">Regístrate</a></p><br>
                        <p class="signup">¿Quieres ingresar sin una cuenta?</p><br>
                        <p class="signup"><a href="index.php">Ingresar sin cuenta</a></p><br>                        
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
