<?php include_once 'header.php' ?>
    <main style="margin: 1%; width: 25%;">
        <form action="?page=contact" method="post">
            <div class="form-group">
                <label for="civil">Civilité</label>
                <select name="civil" id="civil" class="form-control">
                    <option>M.</option>
                    <option>Mme</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input name="nom" id="nom" type="text" placeholder="Dupont" class="form-control">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input name="prenom" id="prenom" type="text" placeholder="Jacques" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input name="email" id="email" type="email" placeholder="name@example.com" class="form-control">
            </div>
            <div class="form-group">
                <label for="raison">Raison</label>

                <div class="form-check">
                    <input type="radio" id="emploi" name="raison" checked value="Proposition d'emploi">
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
            </div>
            <div class="form-group">
                <label for="msg">Message</label>
                <textarea name="msg" id="msg" rows="3" class="form-control" style="resize: none"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>
<?php
if (!empty($_POST)) {
    // POST values
    $civil = filter_input(INPUT_POST, 'civil');
    $nom = filter_input(INPUT_POST, 'nom');
    $prenom = filter_input(INPUT_POST, 'prenom');
    $email = filter_input(INPUT_POST, 'email');
    $raison = filter_input(INPUT_POST, 'raison');
    $msg = filter_input(INPUT_POST, 'msg');
    // date
    $today = date('Y-m-d-H-i-s');
    // file
    $fileName = "./contact/contact_$today.txt";
        // content
    $content = "$civil\nnom: $nom\nprénom: $prenom\n$email\nRaison: $raison\nMessage: $msg";
    file_put_contents($fileName, $content);
}
?>
<?php include_once 'footer.php' ?>
