<?php
    require_once 'vendor/autoload.php';

    MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");
    MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");
    $preference = new MercadoPago\Preference();

    //pagador
    $payer = new MercadoPago\Payer();
    $payer->name = "Lalo";
    $payer->surname = "Landa";
    $payer->email = "test_user_63274575@testuser.com";
    $payer->phone = array(
      "area_code" => "11",
      "number" => "22223333"
    );    
    $payer->address = array(
      "street_name" => "False",
      "street_number" => 123,
      "zip_code" => "1111"
    );
    $preference->payer = $payer;

    // Producto
    $item = new MercadoPago\Item();
    $item->id = 1234;
    $item->title = $_POST['title'];
    $item->description = "Dispositivo móvil de Tienda e-commerce";
    $item->quantity = 1;
    $item->unit_price = $_POST['price'];
    $preference->items = array($item);

    
    $preference->back_urls = array(
      "success" => "https://diegomedina-mp-commerce-php.herokuapp.com/success.php",
      "failure" => "https://diegomedina-mp-commerce-php.herokuapp.com/failure.php",
      "pending" => "https://diegomedina-mp-commerce-php.herokuapp.com/pending.php"
    );
    $preference->auto_return = "approved";

    $preference->external_reference = "xecnon@gmail.com";

    $preference->notification_url = "https://diegomedina-mp-commerce-php.herokuapp.com/web_hook.php";

    $preference->payment_methods = array(
      "excluded_payment_methods" => array(
        array("id" => "amex")
      ),
      "excluded_payment_types" => array(
        array("id" => "atm")
      ),
      "installments" => 6
    );
    //$preference->sandbox_init_point;

    $preference->save();

?>