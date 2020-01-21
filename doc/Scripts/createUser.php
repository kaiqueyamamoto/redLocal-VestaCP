<?php

/**
 * Script para criação de conta de usuario
 */

// Credenciais do servidor 
$vst_hostname = 'server.vestacp.com';
$vst_username = 'admin';
$vst_password = 'p4ssw0rd';
$vst_returncode = 'yes';
$vst_command = 'v-add-user';

// Nova conta 
$username = 'demo';
$password = 'd3m0p4ssw0rd';
$email = 'demo@gmail.com';
$package = 'default';
$fist_name = 'Rust';
$last_name = 'Cohle';

// Prepara a consulta POST 
$postvars = array(
    'user' => $vst_username,
    'password' => $vst_password,
    'returncode' => $vst_returncode,
    'cmd' => $vst_command,
    'arg1' => $username,
    'arg2' => $password,
    'arg3' => $email,
    'arg4' => $package,
    'arg5' => $fist_name,
    'arg6' => $last_name
);
$postdata = http_build_query($postvars);

// Envia a consulta POST via cURL 
$postdata = http_build_query($postvars);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://' . $vst_hostname . ':8083/api/');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
$answer = curl_exec($curl);

// Check result
if ($answer == 0) {
    echo "User account has been successfuly created\n";
} else {
    echo "Query returned error code: " . $answer . "\n";
}
