<?php
function createContactFile($civil, $nom, $prenom, $email, $raison, $msg): void {
    // date
    $today = date('Y-m-d-H-i-s');
    // file
    $fileName = "./contact/contact_$today.txt";
    // content
    $content = "$civil\nnom: $nom\nprénom: $prenom\n$email\nRaison: $raison\nMessage: $msg";
    file_put_contents($fileName, $content);
}