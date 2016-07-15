<?php
require_once 'MusicAPI.php';
$api = new MusicAPI();
$result = $api->search('hello');
print_r($result);
$tt = json_decode($result,true);
//print_r($tt['code']);
//print_r($tt['result']['songs'][0]['id']);
//print_r($tt['result']['songs'][0]['name']);
$id = $tt['result']['songs'][0]['id'];
//print_r($id);
$jsonArr_song = $api->detail($id);
//print_r($jsonArr_song);
?>
