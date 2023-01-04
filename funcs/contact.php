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
function isFieldSetAndNotEmpty($formValue): bool {
    return (isset($formValue) && !empty($formValue));
}

function emptyFieldMsg() : string {
    return '<p style="color: red; font-size: small; font-style: italic;">'.
                'Ce champ est vide.'.
            '</p>';
}

function fieldValidation($formValue): array {
    if (isset($formValue)) {
        if (!empty($formValue)) {
            $msg = "";
            $valid = 1;
        } else {
            $msg = emptyFieldMsg();
            $valid = 0;
        }
    } else {
        $msg = "";
        $valid = 0;
    }

    return array($msg, $valid);
}