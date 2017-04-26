<?php

require __DIR__.'/../../vendor/autoload.php';

$notificationCode = filter_input(INPUT_POST, 'notificationCode');
if (is_null($notificationCode)) {
    $notificationCode = 'E754313BD3C5D3C5973EE400CFAF2FD8E5A8';
}

$pagseguro = new BrPayments\PagSeguro('erik.figueiredo@gmail.com', 'E7EF160DE74646CE80AB18EDDA257F1B', true);
$response = $pagseguro->notification('E754313BD3C5D3C5973EE400CFAF2FD8E5A8');

/**
 * Orders::get($xml->reference);
 **/
//$xml = new \SimpleXMLElement((string)$response);
//var_dump($xml);exit;
header("Content-type: text/xml");
echo $response;
