<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Contacto - Agua Profesional</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }
        .background {
            position: fixed;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #87CEEB 0%, #4682B4 100%);
            z-index: -3;
        }
        .rain {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        .drop {
            position: absolute;
            background: rgba(255, 255, 255, 0.5);
            width: 2px;
            height: 30px;
            border-radius: 50%;
            opacity: 0.7;
            animation: fall linear infinite;
        }
        @keyframes fall {
            to {
                transform: translateY(100vh) rotate(45deg);
            }
        }
        .water-animation {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 100px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="1" d="M0,160L48,176C96,192,192,224,288,229.3C384,235,480,213,576,197.3C672,181,768,171,864,186.7C960,203,1056,245,1152,250.7C1248,256,1344,224,1392,208L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320L192,320L96,320L0,320Z"></path></svg>') repeat-x;
            background-size: 1000px 100px;
            animation: wave 10s linear infinite;
            z-index: -2;
        }
        .water-animation.middle-wave {
            height: 80px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.5" d="M0,160L48,176C96,192,192,224,288,229.3C384,235,480,213,576,197.3C672,181,768,171,864,186.7C960,203,1056,245,1152,250.7C1248,256,1344,224,1392,208L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320L192,320L96,320L0,320Z"></path></svg>') repeat-x;
            background-size: 1000px 80px;
            animation: wave 15s linear infinite reverse;
            opacity: 0.7;
        }
        @keyframes wave {
            0% {
                background-position-x: 0;
            }
            100% {
                background-position-x: 1000px;
            }
        }
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: rgba(255,255,255,0.9);
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            padding: 40px;
            width: 400px;
            text-align: center;
            position: relative;
            z-index: 10;
        }
        .form-container h2 {
            color: #2196F3;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #2196F3;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 2px solid #2196F3;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .form-group input:focus {
            outline: none;
            border-color: #1976D2;
            box-shadow: 0 0 10px rgba(33, 150, 243, 0.3);
        }
        .submit-btn {
            background-color: #2196F3;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .submit-btn:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: all 0.5s ease;
        }
        .submit-btn:hover:before {
            left: 100%;
        }
        .submit-btn:hover {
            background-color: #1976D2;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="background"></div>
    <div class="rain" id="rainContainer"></div>
    <div class="water-animation"></div>
    <div class="water-animation middle-wave"></div>
    <div class="form-container">
        <h2>Registro de Contacto</h2>
        <form method="post">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Ingrese su nombre">
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" required placeholder="Ingrese su email">
            </div>
            <button type="submit" class="submit-btn">Enviar Registro</button>
        </form>
    </div>

    <script>
        function createRain() {
            const rainContainer = document.getElementById('rainContainer');
            const dropCount = 100; // Número de gotas de lluvia

            for (let i = 0; i < dropCount; i++) {
                const drop = document.createElement('div');
                drop.classList.add('drop');
                
                // Posicionamiento aleatorio horizontal
                drop.style.left = `${Math.random() * 100}%`;
                
                // Delay aleatorio para efecto más natural
                drop.style.animationDelay = `${Math.random() * 2}s`;
                
                // Variación de velocidad y longitud
                drop.style.animationDuration = `${0.7 + Math.random() * 0.6}s`;
                drop.style.height = `${20 + Math.random() * 20}px`;
                drop.style.width = `${1 + Math.random() * 2}px`;

                rainContainer.appendChild(drop);
            }
        }

        // Crear lluvia cuando la página carga
        window.addEventListener('load', createRain);
    </script>
</body>
</html>
<?php
// Verificar que se haya enviado el formulario por método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario con seguridad
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Aquí puedes hacer lo que quieras con los datos
    // Por ejemplo, imprimirlos
    //echo "Nombre registrado: " . $nombre . "<br>";
    //echo "Email registrado exitosamente";

    // NOTA: En un caso real, aquí podrías:
    // 1. Validar más a fondo el email
    // 2. Guardar en una base de datos
    // 3. Enviar un correo de confirmación
}
?>

<!--                   xd                  !-->
                   
<?php
// Importar las clases de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Incluir el autoloader de Composer para cargar PHPMailer
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Crear una instancia de PHPMailer
$mail = new PHPMailer(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario con seguridad
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    try {
        // Configuración del servidor SMTP
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'agualertast@gmail.com';  // Tu cuenta de Gmail
        $mail->Password   = 'wryqacssdguowgvk';  // La contraseña de la cuenta de Gmail (debe ser una contraseña de aplicación)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Destinatario
        $mail->setFrom('agualertast@gmail.com', 'AguAlerta');  // Cambia el correo y nombre si es necesario
        $mail->addAddress($email, $nombre);  // El correo del usuario y su nombre

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Viva Cristo Rey';
        $mail->Body    = "Gracias por registrarte, $nombre.";

        // Enviar el correo
        $mail->send();
        exit();
    } catch (Exception $e) {
        echo "El mensaje no pudo ser enviado. Error: {$mail->ErrorInfo}";
    }
}
?>
