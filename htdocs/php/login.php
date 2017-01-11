<?php


require '../../inc/phpass-0.3/PasswordHash.php';

$user = "X";
$pass = "test";

// Base-2 logarithm of the iteration count used for password stretching
$hash_cost_log2 = 8;
// Do we require the hashes to be portable to older systems (less secure)?
$hash_portable = FALSE;

$hasher = new PasswordHash($hash_cost_log2, $hash_portable);
$hash = $hasher->HashPassword($pass);
if (strlen($hash) < 20){
    fail('Failed to hash new password');
} else {
    echo $hash . "\n";
}
unset($hasher);

$hash = '$2a$08$4dy0HINdCNA4ZMqX/MnrTO5SFl5UJBqzSJqUtBFt1qtF0b7.92lJO';

$hasher = new PasswordHash($hash_cost_log2, $hash_portable);
if ($hasher->CheckPassword($pass, $hash)) {
        $what = 'Authentication succeeded';
} else {
        $what = 'Authentication failed';
}
echo $what;