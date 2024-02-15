<!-- resources/views/emails/TestMail.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Mail</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333; margin: 0; padding: 0; text-align: center; width: 100%; box-sizing: border-box;">
    <!-- Contenedor principal con estilos en línea -->
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; ">

        <!-- Aquí puedes incluir el contenido estático de tu correo electrónico -->
        <h1 style="color: #000000; font-weight: bold;">{{ $details['title'] }}</h1>
        <p style=" color:#000000 : 18px; line-height: 1.6; margin-bottom: 15px;">{{ $details['body'] }}</p>

        <!-- Utiliza la etiqueta <strong> para hacer que el código de confirmación salga en negrita -->
        <p style="font-size: 18px; line-height: 1.6; margin-bottom: 15px;"><strong>Token:</strong> {{ $token }}</p>

        <!-- Si quieres incluir un enlace a la página web donde se puede visualizar el contenido -->
        <a href="https://yourwebsite.com/path-to-test-mail" style="color: #e67bfdf7; text-decoration: none;">Ver en la web</a>
    </div>
</body>

</html>
