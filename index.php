<?php
$url = 'https://beta3.api.climatiq.io/estimate';
$curl = curl_init();

$postData['emission_factor']['activity_id'] = "electricity-energy_source_grid_mix";
$postData['parameters']['energy'] = "4200";
$postData['parameters']['energy_unit'] = "kWh";

//Set URL
curl_setopt($curl, CURLOPT_URL, $url);
//Set POST Method
curl_setopt($curl, CURLOPT_POST, TRUE);
//Set POST Params
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));
//Set HTTP HEADERS
$headers[] = "Authorization: Bearer TDF3FNB8JQ4BE0G1PCHDHBH6HJN3";
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

$result = curl_exec($curl);

echo json_encode($postData);
echo json_encode($result);

if ($result === FALSE) {
    printf("cUrl error (#%d): %s<br>\n",
           curl_errno($curl),
           htmlspecialchars(curl_error($curl)))
           ;
}


curl_close($curl);



echo "Other process";

 ?>
