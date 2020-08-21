<?php
    $json = file_get_contents('php://input');

    $json_url = json_decode($json);

    $logFile = fopen("log.txt", 'a') or die("Error creando archivo");
    fwrite($logFile, "\n\n".date("d/m/Y H:i:s")."JSON_URL: ".print_r( $json_url )) or die("Error escribiendo en el archivo");
    fclose($logFile);

    require_once 'vendor/autoload.php';
    MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");

    switch($_POST["type"]) {
        case "payment":
            $payment = MercadoPago\Payment.find_by_id($_POST["id"]);
            break;
        case "plan":
            $plan = MercadoPago\Plan.find_by_id($_POST["id"]);
            break;
        case "subscription":
            $plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
            break;
        case "invoice":
            $plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
            break;
    }
    if (isset($payment)) {
        $logFile = fopen("log.txt", 'a') or die("Error creando archivo");
        fwrite($logFile, "\n".date("d/m/Y H:i:s")."JSON_payment: ".print_r($payment)) or die("Error escribiendo en el archivo");
        fclose($logFile);
    }
    if (isset($plan)){

        $logFile = fopen("log.txt", 'a') or die("Error creando archivo");
        fwrite($logFile, "\n".date("d/m/Y H:i:s")."JSON: ".print_r($plan)) or die("Error escribiendo en el archivo");
        fclose($logFile);
    }
    

?>