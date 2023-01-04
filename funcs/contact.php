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
function isFieldSetAndEmpty($formValue): bool {
    return (isset($formValue) && empty($formValue));
}

function emptyFieldMsg() : string {
    return '<p style="color: red; font-size: small; font-style: italic;">'.
                'Ce champ est vide.'.
            '</p>';
}

function fieldValidation($formValue) {
    if (isFieldSetAndEmpty($formValue)) {
        $msg = emptyFieldMsg();
        $valid = 0;
    } else {
        $msg = "";
        $valid = 1;
    }

    return array($msg, $valid);
}