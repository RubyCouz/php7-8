<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8" />
  <title>Exercice 8</title>
</head>
<body>
  <?php
  if (isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['gender']) && isset($_FILES['fichier']))
  {
    echo 'Bonjour ' . $_POST['gender'] . ' ' . $_POST['lastname'] . ' ' . $_POST['firstname'] . ', fichier sélectionné : ' . $_FILES['fichier']['name'];
?>
<br />
<?php
    $extensions_valides = array( 'pdf' );

    //1. strrchr renvoie l'extension avec le point (« . »).

    //2. substr(chaine,1) ignore le premier caractère de chaine.

    //3. strtolower met l'extension en minuscules.

    $extension_upload = strtolower(  substr(  strrchr($_FILES['fichier']['name'], '.')  ,1)  );

    if ( in_array($extension_upload,$extensions_valides) )
    {
      echo 'Extension correcte';
    } else {
      echo 'Extension incorrecte';
    }
  } else {
    ?>
    <form class="form" action="index.php" method="POST" enctype="multipart/form-data">
      <select class="select" name="gender">
        <option value="Monsieur">Mr</option>
        <option value="Madame">Mme</option>
      </select>
      <!--<input type="hidden" name="MAX_FILE_SIZE" value="8485760" />-->
      <input type="file" name="fichier" placeholder="Sélectionnez un fichier" />
      <input type="text" name="lastname" placeholder="Nom" />
      <input type="text" name="firstname" placeholder="Prénom" />
      <input type="submit" name="valider" value="Valider" />
    </form>
    <?php
  }

  ?>
</body>
</html>












<!--

if (isset($_FILES['textField']) && $_FILES['textField']['error'] ==0) // test si le fichier a bien été envoyé et s'il n'y a aps d'erreur
{
if ($_FILES['textField']['size'] <= 8485760) //test de la taille du fichier
{
//test autorisation extension
$infofichier = pathinfo($_FILES['textField']['name']);
$extension_upload = $infosfichier['extension'];
$extension_autorisées = array('pdf');
{
//validation et stockage du fichier
move_uploaded_file($_FILES['textField']['tmp_name'], 'uploads/' . basename($_FILES['textField']['name']));
?>
<br />

echo 'l\'envoie a bien été effectué!';
}
}
}
-->
