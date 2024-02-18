<?php
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generate($user)
{
    global $array;
    array_push($array, [
        "user" => $user,
        "token" => generateRandomString(100)
    ]);
    return $array;
}

function verify($user, $token)
{
    global $array;
    $user = in_array($user, array_column($array, 'user'));
    if (!$user) {
        echo "User not found", PHP_EOL;
        return;
    }

    foreach ($array as $key => $value) {
        if ($value['user'] == $user) {
            if ($value['token'] !== $token) {
                echo "Token not match", PHP_EOL;
                return;
            }

            array_splice($array, $key, 1);
            echo "User verifed", PHP_EOL;
            return;
        } else {
            echo "User not found", PHP_EOL;
            return;
        }
    }
}

$array = [];
while (true) {
    $input = readline('Choose show, add or verify user : ');

    if ($input == 'add') {
        $user = readline('Input user name : ');
        print_r(generate($user));
    }

    if ($input == 'verify') {
        $user = readline('Input user name : ');
        $token = readline('Input token : ');
        verify($user, $token);
    }

    if ($input == 'show') {
        print_r($array);
    }
}