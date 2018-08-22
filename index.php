<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>Exercice 8</title>
    </head>
    <body>
        <?php
        if (isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['civility']) && isset($_FILES['file'])) {
            echo 'Bonjour ' . $_POST['civility'] . ' ' . $_POST['lastname'] . ' ' . $_POST['firstname'] . ', fichier sélectionné : ' . $_FILES['file']['name'];
            ?>
            <br />
            <?php
            $extensions_valides = array('pdf');

            //1. strrchr renvoie l'extension avec le point (« . »).
            //2. substr(chaine,1) ignore le premier caractère de chaine.
            //3. strtolower met l'extension en minuscules.

            $extension_upload = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));

            if (in_array($extension_upload, $extensions_valides)) {
                echo 'Extension correcte';
            } else {
                echo 'Extension incorrecte';
            }
        } else {
            ?>
            <form class="form" action="index.php" method="POST" enctype="multipart/form-data">
                <label for='civility'></label>
                <select class="select" name="civility">
                    <option selected disabled>cVeuillez selectionner une option</option>
                    <option value="Monsieur">Mr</option>
                    <option value="Madame">Mme</option>
                </select>
                <!--<input type="hidden" name="MAX_FILE_SIZE" value="8485760" />-->
                <label for='folder'></label> 
                <input type="file" id="folder" name="file" placeholder="Sélectionnez un fichier" />
                <label for='lastname'></label> 
                <input id="lastname" type="text" name="lastname" placeholder="Nom" />
                <label for='firstname'></label>
                <input id="firstname" type="text" name="firstname" placeholder="Prénom" />
                <input type="submit" name="valider" value="Valider" />
            </form>
            <?php
        }
        ?>
    </body>
</html>