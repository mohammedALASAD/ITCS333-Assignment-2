<?php
$URL = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

$CH = curl_init($URL);
curl_setopt($CH, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($CH);
curl_close($CH);

if ($response === false) {die('Can not fitch data from API');}

$result = json_decode($response, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON data: ' . json_last_error_msg()); }
?>