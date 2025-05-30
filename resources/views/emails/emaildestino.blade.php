<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Nuevo mensaje</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 30px; margin: 0;">

    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0"
        style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 8px; border: 2px solid #1D4ED8;">
        <tr>
            <td style="text-align: center; padding-bottom: 20px;">
                <h2 style="color: #1D4ED8; margin: 0; font-weight: 700; font-size: 28px; line-height: 1.2;">
                    Formulario Envidado
                </h2>
            </td>
        </tr>
        <tr>
            <td style="padding-bottom: 12px;">
                <p style="color: #374151; font-size: 18px; font-weight: 700; margin: 0;">
                    Estudiante:
                    <span style="color: #F97316; font-weight: 600;">{{ $datos['nombre'] }}</span>
                </p>
            </td>
        </tr>
        <tr>
            <td style="padding-bottom: 6px;">
                <!-- <p style="color: #374151; font-size: 18px; font-weight: 700; margin: 0;">Mensaje:</p> -->
            </td>
        </tr>
        <tr>
            <td>
                <div style="
                    background-color: #EFF6FF; 
                    border: 2px solid #F97316; 
                    padding: 18px; 
                    border-radius: 8px; 
                    color: #1E293B; 
                    font-size: 16px; 
                    line-height: 1.5;
                    font-weight: 500;">
                    <!-- {{ $datos['mensaje'] }} -->
                        El estudiante ha sido registrado exitosamente, el {{ now()->timezone('America/Mexico_City')->format('d \\d\\e F \\d\\e Y') }} a las {{ now()->timezone('America/Mexico_City')->format('H:i:s') }}
                </div>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 30px; font-size: 13px; color: #6B7280; text-align: center; font-style: italic;">
                Este mensaje fue generado automáticamente. Por favor no respondas a este correo.
            </td>
        </tr>
    </table>

</body>

</html>