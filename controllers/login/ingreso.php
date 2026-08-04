<?php
include('../../model/config.php');

class LoginController
{
    private $pdo;

    public function __construct()
    {
        global $pdo; // Usa la conexión PDO global
        $this->pdo = $pdo;
    }

    // Se reciben los datos para ingresar
    public function postLogin()
    {
        session_start();
        $user = $_POST['user'];
        $password_user = $_POST['password_user'];

        // Consulta para verificar usuario y contraseña
        $selectedPass = "SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.user as user, us.password_user as password_user, us.id_rol as id_rol, rol.rol as rol 
            FROM cert_usuarios as us 
            INNER JOIN cert_roles as rol ON us.id_rol = rol.id_rol 
            WHERE user = :user";

        $stmt = $this->pdo->prepare($selectedPass);
        $stmt->execute([':user' => $user]);
        $passord_V = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($passord_V && count($passord_V) > 0) {
            $row = $passord_V[0];
            $hash_verify_db = $row['password_user'];

            if (password_verify($password_user, $hash_verify_db)) {
                // Si no hay sesión existente, autenticar y crear nueva sesión
                $sqlUser = "SELECT user, nombres, password_user, id_rol FROM cert_usuarios WHERE user = :user AND password_user = :password AND id_rol = 1";
                $stmt = $this->pdo->prepare($sqlUser);
                $stmt->execute([':user' => $user, ':password' => $hash_verify_db]);
                $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($usuario && count($usuario) > 0) {
                    foreach ($usuario as $user) {
                        $_SESSION['sesion_email'] = $user['user']; // Asegúrate de establecer 'sesion_email'
                        $_SESSION['user'] = $user['user'];
                        $_SESSION['nombres'] = $user['nombres'];
                        $_SESSION['password_user'] = $user['password_user'];
                        $_SESSION['id_rol'] = $user['id_rol'];
                        $_SESSION['auth'] = "ok";
                    }

                    header('Location: ../../views/Admin/index.php');
                    exit();
                }
            }
        }
        
        // Si llegamos aquí, significa que el inicio de sesión falló
        $_SESSION['mensaje'] = "Error, datos incorrectos";
        header('Location: ../../login/login.php');
        exit();
    }
}

// Para ejecutar el postLogin según sea necesario
$loginController = new LoginController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginController->postLogin();
}
?>