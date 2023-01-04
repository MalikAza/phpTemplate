<?php
// init validation
$valid = 0;
if (!empty($_POST)) {
    // POST values
    $civil = filter_input(INPUT_POST, 'civil');
    $nom = filter_input(INPUT_POST, 'nom');
    $prenom = filter_input(INPUT_POST, 'prenom');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $raison = filter_input(INPUT_POST, 'raison');
    $msg = filter_input(INPUT_POST, 'msg');
}
?>

<main style="margin: 1%; width: 50%;">
    <form action="?page=contact" method="post">
        <div class="form-row">
            <div class="form-group col">
                <label for="civil">Civilité</label>
                <select name="civil" id="civil" class="form-control">
                    <option value="">Choisissez un état civil</option>
                    <option>M.</option>
                    <option>Mme</option>
                </select>
                <?php if (isset($civil) && empty($civil)) {?>
                    <p style="color: red; font-size: small; font-style: italic;">
                        Veuillez choisir un état civil valide.
                    </p>
                <?php } else { $valid += 1; }?>
            </div>
            <div class="form-group col">
                <label for="nom">Nom</label>
                <input name="nom" id="nom" type="text" placeholder="Dupont" class="form-control">
                <?php if (isset($nom) && empty($nom)) {?>
                <p style="color: red; font-size: small; font-style: italic;">
                    Ce champ est vide.
                </p>
                <?php } else { $valid += 1; }?>
            </div>
            <div class="form-group col">
                <label for="prenom">Prénom</label>
                <input name="prenom" id="prenom" type="text" placeholder="Jacques" class="form-control">
                <?php if (isset($prenom) && empty($prenom)) {?>
                    <p style="color: red; font-size: small; font-style: italic;">
                        Ce champ est vide.
                    </p>
                <?php } else { $valid += 1; }?>
            </div>
        </div>
        <div class="form-group" style="width: 33%">
            <label for="email">E-mail</label>
            <input name="email" id="email" type="email" placeholder="name@example.com" class="form-control">
            <?php if (isset($email) && (empty($email)) || !$email) {
                    // empty email
                    if ($email) { ?>
                        <p style="color: red; font-size: small; font-style: italic;">
                            Ce champ est vide.
                        </p>
                    <!-- not empty but unvalid email -->
                    <?php } else { ?>
                        <p style="color: red; font-size: small; font-style: italic;">
                            L'e-mail n'est pas valide.
                        </p>
                    <?php }
            // not empty and valid email
            } else { $valid += 1; }?>
        </div>
        <div class="form-group">
            <label for="raison">Raison</label>

            <div class="form-check">
                <input type="radio" id="emploi" name="raison" value="Proposition d'emploi">
                <label for="emploi">Proposition d'emploi</label>
            </div>

            <div class="form-check">
                <input type="radio" id="information" name="raison" value="Demande d'information">
                <label for="information">Demande d'information</label>
            </div>

            <div class="form-check">
                <input type="radio" id="prestations" name="raison" value="Prestations">
                <label for="prestations">Prestations</label>
            </div>
            <?php if (isset($nom) && empty($nom)) {?>
                <p style="color: red; font-size: small; font-style: italic;">
                    Ce champ est obligatoire.
                </p>
            <?php } else { $valid += 1; }?>
        </div>
        <div class="form-group">
            <label for="msg">Message</label>
            <textarea name="msg" id="msg" rows="5" class="form-control" style="resize: none"></textarea>
            <?php if (isset($nom) && strlen($nom) <= 5) {?>
                <p style="color: red; font-size: small; font-style: italic;">
                    Le message doit au moins faire 5 caractères de long.
                </p>
            <?php } else { $valid += 1; }?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>

<?php
if ($valid === 6) {
    // date
    $today = date('Y-m-d-H-i-s');
    // file
    $fileName = "./contact/contact_$today.txt";
        // content
    $content = "$civil\nnom: $nom\nprénom: $prenom\n$email\nRaison: $raison\nMessage: $msg";
    file_put_contents($fileName, $content);
}
?>
