<?php
// Server credentials
$vst_hostname = 'server.vestacp.com';
$vst_username = 'admin';
$vst_password = 'p4ssw0rd';
$vst_command = 'v-list-user';

// Account
$username = 'demo';
$format = 'json';

// Prepare POST query
$postvars = array(
    'user' => $vst_username,
    'password' => $vst_password,
    'cmd' => $vst_command,
    'arg1' => $username,
    'arg2' => $format
);
$postdata = http_build_query($postvars);

// Send POST query via cURL
$postdata = http_build_query($postvars);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://' . $vst_hostname . ':8083/api/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
$answer = curl_exec($curl);

// Parse JSON output
$data = json_decode($answer, true);

// Print result
print_r($data);
