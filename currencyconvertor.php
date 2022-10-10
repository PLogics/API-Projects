<?php

if (isset($_REQUEST['result'])) {
    $currency = $_REQUEST['currency'];
    $to = $_REQUEST['to'];
    $amount = $_REQUEST['amount'];

    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://currency-conversion-and-exchange-rates.p.rapidapi.com/convert?from=$currency&to=$to&amount=$amount",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: currency-conversion-and-exchange-rates.p.rapidapi.com",
            "X-RapidAPI-Key: 41966c2f86mshcbf288416a468e0p162761jsncd9271762498"
        ],
    ]);
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $decoded = json_decode($response, true);
        // $data[] = $decoded;
        // print_r($decoded['result']);
        // echo $response;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>

    <div class="h-screen flex w-full justify-center items-center bg-[#efb2f5] rounded-sm">
        <form method="post" action="" class="bg-white shadow-md  justify-center w-1/2 rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Currency</label>
                <input type="text" name="currency" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">To</label>
                <input type="text" name="to" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Amount</label>
                <input type="text" name="amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            </div>
            <div class="flex items-center justify-between">
                <input type="submit" name="result" value="Result" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" />
            </div>
            <div>
                <a class="result"><?php echo "Result is:" . " " . ((!empty($decoded['result'])) ? ($decoded['result']) : ("Please Enter above information")) ?> </a>
            </div>
        </form>
    </div>
</body>

</html>