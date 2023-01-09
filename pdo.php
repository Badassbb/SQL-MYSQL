<?php
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
if($_POST)
{
    $result = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('$_POST[prenom]', '$_POST[nom]', '$_POST[sexe]', '$_POST[service]', '$_POST[date_embauche]', '$_POST[salaire]')");
    echo '<div style="background: green; padding: 5px;">l\'employé a bien été ajouté</div>';
}
?>
 
<form method="post">
    <label for="prenom">Prenom</label><br>
    <input type="text" name="prenom" placeholder="prenom" id="prenom" required=""><br><br>
    <label for="prenom">Nom</label><br>
    <input type="text" name="nom" placeholder="nom" id="nom" required=""><br><br>
    <label for="sexe">Sexe</label><br>
    Homme <input type="radio" name="sexe" placeholder="sexe" id="sexe" value="m" checked=""> -
    Femme <input type="radio" name="sexe" placeholder="sexe" id="sexe" value="f">   <br><br>
    <label for="service">Service</label><br>
    <input type="text" name="service" placeholder="service" id="service"><br><br>
    <label for="date_embauche">Date d'embauche <i>(Format: AAAA-MM-JJ)</i></label><br>
    <input type="text" name="date_embauche" placeholder="ex: 2015-07-30" id="prenom"><br><br>
    <label for="salaire">Salaire</label><br>
    <input type="text" name="salaire" placeholder="salaire" id="salaire"><br><br>
    <input type="submit"><br><br>
</form>
