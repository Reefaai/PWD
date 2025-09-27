<?php
// Fungsi untuk mengecek apakah sebuah string adalah palindrom
function isPalindrome($string) {
    $reverse = strrev($string);
    return $string == $reverse;
}

$kata = "kasur rusak";
if (isPalindrome($kata)) {
    echo "'$kata' adalah palindrom.";
} else {
    echo "'$kata' bukan palindrom.";
}
// Output: 'kasur rusak' adalah palindrom.
?>