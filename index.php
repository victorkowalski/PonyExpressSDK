<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "vendor/autoload.php";
require_once "CVarDumper.php";
function q($data, $file = 'log')
{
  file_put_contents($file, CVarDumper::dumpAsString($data) . PHP_EOL, FILE_APPEND);
}

$testLogin = "АЛК";
$testPassword = "vTxXBAMmFASzvc8G";


$request = new \PE\Entity\Request\GetReferenceRequest($testLogin, $testPassword);
$request->setReference(\PE\Entity\Request\GetReferenceRequest::REFERENCE_TYPE_OF_CARGO);
$client = new \PE\Client($request, \PE\Client::API_XML);
$response = $client->getResponse()->getBody();

$client   = new \GuzzleHttp\Client();
//$client = new Client();

$request = '<?xml version="1.0" encoding="utf-8"?>
<Request xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:type="HistoryRequest">
    <Id>3</Id>
    <DateFrom>2013-11-03T00:00:00+04:00</DateFrom>
    <DateTo>2013-12-04T00:00:00+04:00</DateTo>
</Request>';

$req = new stdClass();
$req->accessKey = '45C704AE-8E8C-4FFE-8EB9-27D521D8F26E';


$response = $client->post("http://ui.p2e.ru/srv/UI_Service.asmx", [
    'accessKey' => '45C704AE-8E8C-4FFE-8EB9-27D521D8F26E'
    //,
    //'requestBody'    => [$request]
]
);
var_dump($response->getStatusCode());

?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
<h1><?php echo time(); ?></h1>
  <pre>
    <?php CVarDumper::dump($response, 12, true); ?>
  </pre>
</body>
</html>