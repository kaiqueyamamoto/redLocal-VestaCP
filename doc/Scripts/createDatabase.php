<?php
// Server credentials
$vst_hostname = 'server.vestacp.com';
$vst_username = 'admin';
$vst_password = 'p4ssw0rd';
$vst_returncode = 'yes';
$vst_command = 'v-add-database';

// New Database
$username = 'demo';
$db_name = 'wordpress';
$db_user = 'wordpress';
$db_pass = 'wpbl0gp4s';

// Prepare POST query
$postvars = array(
    'user' => $vst_username,
    'password' => $vst_password,
    'returncode' => $vst_returncode,
    'cmd' => $vst_command,
    'arg1' => $username,
    'arg2' => $db_name,
    'arg3' => $db_user,
    'arg4' => $db_pass
);
$postdata = http_build_query($postvars);

// Send POST query via cURL
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
    echo "Database has been successfuly created\n";
} else {
    echo "Query returned error code: " . $answer . "\n";
}
