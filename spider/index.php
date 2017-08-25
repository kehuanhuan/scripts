<?php

require 'vendor/autoload.php';
require './Common/functions.php';


$url='http://vote.zyctd.com/m31';//这里请填写投票的请求地址
// $url='http://127.0.0.1:8084/test';//这里请填写投票的请求地址
$data = ['AppID' => 2, 'voteItemId' => 31, 'Data.VoteItemId' => 31, 'Data.VoteType' => 1, 'CLickVote' => ''];

$client = new GuzzleHttp\Client();

$response = $client->request('POST',  $url, [
    'form_params' => $data,
    'headers' => [
        'Upgrade-Insecure-Requests' => 1,
        'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.101 Safari/537.36',
        'Content-Type' => 'application/x-www-form-urlencoded'
    ]
]);

// Get all of the response headers.
foreach ($response->getHeaders() as $name => $values) {
    echo $name . ': ' . implode(', ', $values) . "\n";
}
$body = $response->getBody();
$remainingBytes = $body->getContents();
var_export($remainingBytes);