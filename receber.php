<?php 
require_once "vendor/autoload.php";
use Endroid\QrCode\QrCode;
use Respect\Validation\Validator as v;
$nome = $_POST['name'];
$data = $_POST['data'];
$email = $_POST['email'];


$validarData = v::date('d/m/Y')->validate($data);
$validarEmail = v::email()->validate($email);

if(!$validarEmail){
	die('Digite um email valido');
}
if(!$validarData){
	die('Digite um data valida');
}

$qrCode = new QrCode($nome);

header('Content-Type: '.$qrCode->getContentType());
echo $qrCode->writeString();


 ?>