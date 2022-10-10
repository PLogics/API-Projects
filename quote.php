<?php

$curl = curl_init(); 

curl_setopt_array($curl, [
	CURLOPT_URL => "https://motivational-quotes1.p.rapidapi.com/motivation",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "{\r\n    \"key1\": \"value\",\r\n    \"key2\": \"value\"\r\n}",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: motivational-quotes1.p.rapidapi.com",
		"X-RapidAPI-Key: e50ec6d4cemsh90f7881816d6c42p169ea0jsn68296cdd1206",
		"content-type: application/json"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
//    var_dump($response); 
//    $decoded= json_decode($response, TRUE);
	// var_dump($decoded);
	$exploded = explode("-", $response);
}   

curl_close($curl);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<p id="quote"><?php echo $exploded[0] ?></p>
			<h3 id="author">-<?php echo $exploded[1] ?> </h3>
			<a href="quote.php"><button id="btn">Next</button></a>
		</div>
	</div>
</body>
</html>