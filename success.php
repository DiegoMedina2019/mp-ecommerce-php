<?php
/*
collection_id=29110245
collection_status=approved
external_reference=xecnon@gmail.com
payment_type=credit_card
merchant_order_id=1699854055
preference_id=580346422-0367dd1a-cf96-4123-ac00-fee56303a228
site_id=MLA
processing_mode=aggregator
merchant_account_id=null
*/
echo "Informacion del Query String.<br>";

echo 'payment_type: '.$_GET['payment_type'].'<br>';
echo 'external_reference: '.$_GET['external_reference'].'<br>';
echo 'collection_id: '.$_GET['collection_id'].'<br>';

?>