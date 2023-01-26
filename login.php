<?php
    // importar conexion
    require 'includes/app.php';
    $db = conexionDB();

    $errores = [];

    // Autenticcar usuario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        $email = mysqli_real_escape_string( $db, filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) );
        $password = mysqli_real_escape_string( $db, $_POST['password'] );

        if (!$email) {
            $errores[] = "Email es obligatorio o no és válido";
        }
        if (!$password) {
            $errores[] = "Password es obligatorio o no és válido";
        }
        if (empty($errores)) {
            // revisar si el usuario existe

            $query = "SELECT * FROM usuarios WHERE email = '${email}'";
            $resultado = mysqli_query($db, $query);

            if ( $resultado->num_rows ) {
                // revisar si password es correcto
                $usuario = mysqli_fetch_assoc($resultado);
                // verificar el password si es correcto
                $auth = password_verify($password, $usuario['password']);

                if ($auth) {
                    //Usuartio autenticado
                    session_start();

                    // llenar la sesion de valores
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');
                } else {
                    $errores[] = "Password es incorrecto";
                }
            } else {
                $errores[] = "Usuario no existe";
            }
        }
    }
    // incluye header

    incluirTemplate( 'header' );
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form method="POST" class="formulario">
            <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Tu Email" id="email" >

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu Password" id="password" >

            </fieldset>

            <input type="submit" value="Iniciar Sessión" class="boton boton-verde">
        </form>
    </main>


<?php
    mysqli_close($db);
    incluirTemplate( 'footer' );
?>