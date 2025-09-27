<?php
$inputUser = "admin";
$inputPass = "12345";

$userBenar = "admin";
$passBenar = "12345";

if ($inputUser == $userBenar) {
    if ($inputPass == $passBenar) {
        echo "Login berhasil. Selamat datang, $inputUser!";
    } else {
        echo "Password salah.";
    }
} else {
    echo "Username tidak terdaftar.";
}
?>