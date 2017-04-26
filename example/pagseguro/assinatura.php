<?php

require __DIR__.'/../../vendor/autoload.php';
$pagseguro = new BrPayments\PagSeguro('erik.figueiredo@gmail.com', 'E7EF160DE74646CE80AB18EDDA257F1B', true);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //para pegar este arquivo antes desta alteração use o assinatura.template.php
    $customer = [
        'name' => filter_input(INPUT_POST, 'name'),
        'email' => filter_input(INPUT_POST, 'email'),
        'hash' => filter_input(INPUT_POST, 'hash'),
        'phoneAreaCode' => filter_input(INPUT_POST, 'phoneAreaCode'),
        'phoneNumber' => filter_input(INPUT_POST, 'phoneNumber'),
        'documentsValue'=>filter_input(INPUT_POST, 'cpf')
    ];

    $shipping = [
        'street'=>'Av. PagSeguro',
        'number'=>99,
        'complement'=>'99o andar',
        'district'=>'Jardim Internet',
        'postalCode'=>99999999,
        'city'=>'Cidade Exemplo',
        'state'=>'SP',
        'country'=>'BRA'
    ];

    $payment = [
        'token'=>filter_input(INPUT_POST, 'token'),
        'name'=>filter_input(INPUT_POST, 'name'),
        'birthDate'=>'20/12/1990',
        'documents'=>'97998185325',
        'phoneAreaCode' => '11',
        'phoneNumber' => '999999999',
    ];
    $payment = array_merge($payment, $shipping);
    $response = $pagseguro->recurrence('D7ED6345F3F3FBA11489DFBD5A65DA2A', 'IDPEDIDO1', $customer, $shipping, $payment);
    echo $response;
    exit;
}

$response = $pagseguro->session();
$session = (new \SimpleXMLElement($response))->id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assinatura.css">
</head>
<body>
<form id="form" action="" method="post">
    <h1>Comprador</h1>
    <label>nome</label> <input type="text" id="name" name="name" value="Erik"><br>
    <label>email</label> <input type="text"  id="email"name="email" value="c75336791632449484854@sandbox.pagseguro.com.br"><br>
    <label>telefone</label> <input type="text" id="phoneAreaCode" class="percent-50" name="phoneAreaCode" value="11">
    <input type="text" id="phoneNumber" class="percent-50" name="phoneNumber" value="999999999"><br>
    <label>cpf</label> <input type="text" id="cpf" name="cpf" value="97998185325">

    <h1>Cartão de crédito</h1>
    <label>número</label> <input type="text" id="card" name="card" value="4111111111111111"><br>
    <label>expiração</label> <input type="text" id="month" name="month" value="12" class="percent-50">
    <input type="text" id="year" name="year" value="2027" class="percent-50"><br>
    <label>Código de segurança</label> <input type="text" id="cvv" name="ccv" value="123"><br>
    <label>Bandeira</label> <input type="text" id="brand" name="brand" value=""><br>
    <input type="submit" value="SALVAR" class="btn">
</form>

<script type="text/javascript">
    var session = '<?php echo $session;?>';
</script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" charset="utf-8"></script>
<!--<script src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js" charset="utf-8"></script>-->
<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js" charset="utf-8"></script>
<script src="assinatura.js" charset="utf-8"></script>
</body>
</html>
