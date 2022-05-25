<?php 
  defined("BASEPATH") or die("Acceso prohibido");
  require(__DIR__ . '/../../vendor/autoload.php');
  use GuzzleHttp\Client;
  
  //ENVIO DE CORREO
  if(!function_exists('enviar_correo'))
  {
    function enviar_correo($correo, $asunto, $body) {
      // empieza el objeto que envía la petición
      $client = new Client();
      // Correos ocultos
      $correos_ocultos = "cristhian.castro@ospedale.com.co;andres.orduz@ospedale.com.co;auxiliar.ti2@ospedale.com.co";
      // Seteamos el tipo de consulta (json)
      include('credentials.php');
      $headers = ['Content-Type' => 'application/json', 'x-api-key' => $api];
      try {
        $response = $client->request('POST', 'https://x38h5b805i.execute-api.us-east-1.amazonaws.com/dev/send-email-node', [
          'verify' => false,
          'headers' => $headers,
          'json' => [
            "to" => $correo,
            "subject" => $asunto,
            "body" => $body,
            "bcc" => $correos_ocultos,
          ]
        ]);
      } catch (Exception $e) {
        log_message("error", "Problema al enviar correo");
        log_message("error", $correo);
        log_message("error", $correos_ocultos);
        var_dump($e); die;
      }
      
      $status_code = $response->getStatusCode();
      $mensaje = $response->getBody();
      if($status_code == 200) {
        log_message("error", "Correos envíados con éxito");
        log_message("error", $correo);
        log_message("error", $correos_ocultos);
        return true;
      } else {
        log_message("error", $correo);
        log_message("error", $correos_ocultos);
        log_message("error", "Problema al enviar correos status_code ".$status_code. " mensaje: ".$mensaje);
        return false;
      }
    }
  }

?>
