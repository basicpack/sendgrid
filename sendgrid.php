<?php
//Anderson Ismael
//19 de julho de 2019
require 'vendor/autoload.php';

function sendgrid($from,$to,$subject,$body,$html=true){
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($from['email'],$from['name']);
    $email->setSubject($subject);
    $email->addTo($to['email'],$to['name']);
    if($html){
        $email->addContent("text/html", $body);
    }else{
        $email->addContent("text/plain", $body);
    }
    $sendgridKey=getSendgridEnvKey();
    if($sendgridKey){
        $sendgrid = new \SendGrid($sendgridKey);
        $response = $sendgrid->send($email);
        if($response->statusCode()===202){
            return $response;
        }else{
            return false;
        }
        // try {
        //
        //     print $response->statusCode() . "\n";
        //     print_r($response->headers());
        //     print $response->body() . "\n";
        // } catch (Exception $e) {
        //     echo 'Caught exception: ',  $e->getMessage(), "\n";
        // }
    }else{
        die('SENDGRID_KEY not found at .env');
    }
}
function getSendgridEnvKey(){
    if(isset($_ENV['SENDGRID_KEY'])){
        return $_ENV['SENDGRID_KEY'];
    }else{
        return false;
    }
}
?>
