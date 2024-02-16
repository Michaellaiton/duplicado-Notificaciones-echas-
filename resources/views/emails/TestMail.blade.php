<!-- resources/views/emails/TestMail.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Mail</title>
    <style>
        p{
            text-transform: justify;
        }
    </style>
</head>

<body style="display: flex; justify-content: center; align-content: center; padding:5em 10em">
    <div style="max-width:  600px; margin:  0 auto; padding:  20px; border: 2px solid black; ">
        <div style="text-align: center;">
            <h1 style="color: #000000; font-weight: bold;  padding:2em;">{{ $details['title'] }}</h1>
            <p style="color: #000000; font-size:  18px; line-height:  1.6; margin-bottom:  15px; ">{{ $details['body'] }}</p>
            <p style="font-size:  18px; line-height:  1.6; margin-bottom:  15px;">Código de Validación: {{ $token }}</p>
            <p>
                {{ $details['fin']}}
            </p>
        </div>
    </div>

</html>


