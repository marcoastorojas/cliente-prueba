<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <!--[if mso]>
  <style>
    table {border-collapse:collapse;border-spacing:0;border:none;margin:0;}
    div, td {padding:0;}
    div {margin:0 !important;}
  </style>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: Arial, sans-serif;
        }

        @media screen and (max-width: 530px) {
            .unsub {
                display: block;
                padding: 8px;
                margin-top: 14px;
                border-radius: 6px;
                background-color: #555555;
                text-decoration: none !important;
                font-weight: bold;
            }

            .col-lge {
                max-width: 100% !important;
            }
        }

        @media screen and (min-width: 531px) {
            .col-sml {
                max-width: 27% !important;
            }

            .col-lge {
                max-width: 73% !important;
            }
        }

    </style>
</head>

<body style="margin:0;padding:0;word-spacing:normal;background-color:#939297;">
    <div role="article" aria-roledescription="email" lang="en"
        style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#dbdbdd;">
        <table role="presentation" style="width:100%;border:none;border-spacing:0;">
            <tr>
                <td align="center" style="padding:0;">
                    <!--[if mso]>
          <table role="presentation" align="center" style="width:600px;">
          <tr>
          <td>
          <![endif]-->
                    <table role="presentation"
                        style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                        <tr>
                            <td style="padding:40px 30px 30px 30px;text-align:center;font-size:24px;font-weight:bold;">
                                <a href="https://clientevip.pe/" style="text-decoration:none;"><img
                                        src="https://clientevip.pe/back/assets/img/logo-cv2.png" width="165" alt="Logo"
                                        style="width:165px;max-width:80%;height:auto;border:none;text-decoration:none;color:#ffffff;"></a>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding:30px;background-color:#ffffff;">
                                <h1
                                    style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">
                                    Hola, <b>{{ $msg['name'] }}</b>.</h1>
                                <p style="text-align: center;">
                                <h3 style="text-align: center;"><b>BIENVENIDO!</b></h3>
                                </p>
                                {{-- @if ($msg['tipo'] == 'C')
                                @endif --}}

                                {{-- <p style="margin:0;">{{ $msg['motivo'] }} <b>{{ $msg['puntorecibido'] }}</b> puntos
                                    de
                                    <b>{{ $msg['negocio'] }}</b>, Por lo tanto, ahora tienes:
                                </p> --}}
                                {{-- <p><strong>{{ $msg['totalpuntos'] }}</strong> Puntos.</p> <br> --}}
                                <p>Acumula puntos y recibe recompensas con ClienteVIP de tus negocios
                                    favoritos.
                                    Revisa tus puntos en <a href="https://clientevip.pe" target="../">clientevip.pe</a>
                                </p>
                                <p>El equipo de <a href="https://clientevip.pe/">ClienteVIP</a>.</p>
                            </td>
                        </tr>

                        {{-- @if ($msg['tipo'] == 'C')
                            <tr>
                                <td
                                    style="padding:30px;font-size:24px;line-height:28px;font-weight:bold;background-color:#ffffff;border-bottom:1px solid #f0f0f5;border-color:rgba(201,201,207,.35);">
                                    <a href="https://clientevip.pe/" style="text-decoration:none;"><img
                                            src="https://clientevip.pe/woo/assets/img/gallery/happy.jpg" width="540"
                                            alt=""
                                            style="width:100%;height:auto;border:none;text-decoration:none;color:#363636;"></a>
                                </td>
                            </tr>
                        @endif --}}
                        {{-- <tr>
                            <td style="padding:30px;background-color:#ffffff;">
                                <p style="margin:0;">Duis sit amet accumsan nibh, varius tincidunt lectus. Quisque
                                    commodo, nulla ac feugiat cursus, arcu orci condimentum tellus, vel placerat libero
                                    sapien et libero. Suspendisse auctor vel orci nec finibus.</p>
                            </td>
                        </tr> --}}
                        <tr>
                            <td
                                style="padding:30px;text-align:center;font-size:12px;background-color:#404040;color:#cccccc;">
                                <p style="margin:0 0 8px 0;"><a href="https://www.facebook.com/clientevip.pe"
                                        style="text-decoration:none;"><img
                                            src="https://assets.codepen.io/210284/facebook_1.png" width="40" height="40"
                                            alt="f" style="display:inline-block;color:#cccccc;"></a> <a
                                        href="https://www.instagram.com/soy.clientevip/" style="text-decoration:none;"><img
                                            src="https://assets.codepen.io/210284/twitter_1.png" width="40" height="40"
                                            alt="t" style="display:inline-block;color:#cccccc;"></a></p>
                                <p style="margin:0;font-size:14px;line-height:20px;">ClienteVIP 2021<br>
                                    {{-- <a class="unsub" href="#" style="color:#cccccc;text-decoration:underline;">Cancelar suscripción</a> --}}
                                </p>
                            </td>
                        </tr>
                    </table>
                    <!--[if mso]>
          </td>
          </tr>
          </table>
          <![endif]-->
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
