<?php

$ch = curl_init('https://coderbyte.com/api/challenges/json/age-counting');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);

$response = json_decode($data, true);
$items = explode(', ', $response['data']);
$count = 0;

foreach($items as $item){
if(str_starts_with($item, 'age=') === true && filter_var($item, FILTER_SANITIZE_NUMBER_INT) >= 50)
$count++;
}

echo $count;

?>
