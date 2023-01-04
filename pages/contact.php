<?php
// imports
include "./funcs/contact.php";
// init validation
$valid = 0;

if (!empty($_POST)) {
    // POST values
    $civil = filter_input(INPUT_POST, 'civil');
    $nom = filter_input(INPUT_POST, 'nom');
    $prenom = filter_input(INPUT_POST, 'prenom');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $raison = filter_input(INPUT_POST, 'raison');
    $userMsg = filter_input(INPUT_POST, 'userMsg');
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

                <!-- error handling -->
                <?php
                if (isset($civil)) {
                    if (!empty($civil)) {
                        $valid += 1;
                    } else { ?>
                        <p style="color: red; font-size: small; font-style: italic;">
                            Veuillez choisir un état civil valide.
                        </p>
                    <?php }
                }?>

            </div>

            <div class="form-group col">

                <label for="nom">Nom</label>
                <input name="nom" id="nom" type="text" placeholder="Dupont" class="form-control">
                <!-- error handling -->
                <?php
                list($msg, $isValid) = fieldValidation($nom);
                $valid += $isValid;
                echo $msg;
                ?>

            </div>

            <div class="form-group col">

                <label for="prenom">Prénom</label>
                <input name="prenom" id="prenom" type="text" placeholder="Jacques" class="form-control">
                <!-- error handling -->
                <?php
                list($msg, $isValid) = fieldValidation($prenom);
                $valid += $isValid;
                echo $msg;
                ?>

            </div>

        </div>

        <div class="form-group" style="width: 33%">

            <label for="email">E-mail</label>
            <input name="email" id="email" type="email" placeholder="name@example.com" class="form-control">
            <!-- error handling -->
            <?php
            if (isset($email)) {
                if (!empty($email)) {
                    $valid += 1;
                } else { ?>
                    <p style="color: red; font-size: small; font-style: italic;">
                        L'e-mail n'est pas valide.
                    </p>
                <?php }
            }?>

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

            <!-- error handling -->
            <?php
            if (isset($raison)) {
                $valid += 1;
            } elseif (!empty($_POST)) { ?>
                <p style="color: red; font-size: small; font-style: italic;">
                    Ce champ est obligatoire.
                </p>
            <?php } ?>

        </div>

        <div class="form-group">

            <label for="userMsg">Message</label>
            <textarea name="userMsg" id="userMsg" rows="5" class="form-control" style="resize: none"></textarea>
            <!-- error handling -->
            <?php
            if (!empty($userMsg)) {
                if (strlen($userMsg) < 5) { ?>
                    <p style="color: red; font-size: small; font-style: italic;">
                        Le message doit faire au moins 5 caractères de long.
                    </p>
                <?php } else { $valid += 1; }
            } ?>

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</main>

<?php
echo "valid: $valid";
if ($valid === 6) {
    createContactFile($civil, $nom, $prenom, $email, $raison, $userMsg);
}
?>
