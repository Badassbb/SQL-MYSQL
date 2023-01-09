<!-- <$mysqli = new Mysqli("localhost", "root", "", "entreprise");
//---------------------------------------------------------------
echo '<pre>'; print_r($mysqli); echo '</pre>';
echo '<pre>'; print_r(get_class_methods($mysqli)); echo '</pre>';
//---------------------------------------------------------------
$mysqli->query("mauvaise requete volontaire .............");
echo $mysqli->error . '<br>';

//------------------------Verif error
$prenom = $nom = $service = $embauche = $salaire = "";
$prenomError = $nomError = $serviceError = $embaucheError = $salaireError = "";
$formComplet = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = verifInput($_POST["prenom"]);
    $nom = verifInput($_POST["nom"]);
    $service = verifInput($_POST["service"]);
    $embauche = verifEmbauche($_POST["date_embauche"]);
    $salaire = verifSalaire($_POST["salaire"]);
    $formcomplet = true;
 
    
    if (empty($prenom)) {
        $prenomError = "Quel est ton prenom ?";
        $formcomplet = false;
    } else
        $formcomplet = true;

    if (empty($nom)) {
        $nomError = "Quel est ton nom ?";
        $formcomplet = false;
    } else
        $formcomplet = true;

    if (empty($service)) {
        $serviceError = "A quel service es-tu affilié ?";
        $formcomplet = false;
    } else
        $formcomplet = true;

    if (empty($embauche)) {
        $embaucheError = "A quel service es-tu affilié ?";
        $formcomplet = false;
    } else
        $formcomplet = true;
    
    if (empty($salaire)<= 500) {
        $salaireError = "Quel est son salaire ?";
        $formcomplet = false;
    } else
        $formcomplet = true;


}
function verifEmbauche($var)
{
    return preg_match("/^[0000-00-00]*$/", $var);
}
function verifSalaire($var)
{
    return preg_match("/^[0-9]*$/", $var);
}

function verifInput($var)
{
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);

    return ($var);
}

?> -->
<?php
$mysqli = new Mysqli("localhost", "root", "", "entreprise");
//-----------------------------------------------------------------
// Insertion (INSERT) :
//$result = $mysqli->query("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('prenom', 'nom', 'm', 'informatique', '2015-07-30', 5000)");
//echo $mysqli->affected_rows . ' enregistrement(s) affecté(s) par la requête INSERT<br>';
//-----------------------------------------------------------------
// Modification (UPDATE) :
//$result = $mysqli->query("UPDATE employes SET salaire = 2500 WHERE id_employes = 802");
//echo $mysqli->affected_rows . ' enregistrement(s) affecté(s) par la requête UPDATE<br>';
//-----------------------------------------------------------------
// Suppression (DELETE) :
//$result = $mysqli->query("DELETE FROM employes WHERE id_employes = 388");
//echo $mysqli->affected_rows . ' enregistrement(s) affecté(s) par la requête DELETE<br>';
//-----------------------------------------------------------------
// Affichage (SELECT) :
//$result = $mysqli->query("SELECT * FROM employes WHERE prenom='julien'");
//$employe = $result->fetch_assoc(); 
//echo "<pre>"; print_r($employe); echo "</pre>";
//echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service]<br>";
//-----------------------------------------------------------------
?>

<?php
$mysqli = new Mysqli("localhost", "root", "", "entreprise");
 
$résultat = $mysqli->query("SELECT * FROM employes");
 
echo '<table border="5"> <tr>';
while($colonne = $résultat->fetch_field())
{          
    echo '<th>' . $colonne->name . '</th>';
}
echo "</tr>";
 
while ($ligne = $résultat->fetch_assoc())
{
    echo '<tr>';
    foreach ($ligne as $indice => $information)
    {
        echo '<td>' . $information . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>



<?php
$mysqli = new Mysqli("localhost", "root", "", "entreprise");
if($_POST)
{
    $result = $mysqli->query("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('$_POST[prenom]', '$_POST[nom]', '$_POST[sexe]', '$_POST[service]', '$_POST[date_embauche]', '$_POST[salaire]')");
    echo '<div style="background: green; padding: 5px;">l\'employé a bien été ajouté</div>';
    // Affichage (SELECT) :
$result = $mysqli->query("SELECT * FROM employes WHERE prenom='julien'");
$employe = $result->fetch_assoc(); 
echo "<pre>"; print_r($employe); echo "</pre>";
echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service]<br>";

}
?>
<?php
$mysqli = new Mysqli("localhost", "root", "", "entreprise");
 
$résultat = $mysqli->query("SELECT * FROM employes");
 
echo '<table border="5"> <tr>';
while($colonne = $résultat->fetch_field())
{          
    echo '<th>' . $colonne->name . '</th>';
}
echo "</tr>";
 
while ($ligne = $résultat->fetch_assoc())
{
    echo '<tr>';
    foreach ($ligne as $indice => $information)
    {
        echo '<td>' . $information . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
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
    <input type="text" name="date_embauche" placeholder="ex: 2015-07-30" id="date_embauche"><br><br>
    <label for="salaire">Salaire</label><br>
    <input type="text" name="salaire" placeholder="salaire" id="salaire"><br><br>
    <input type="submit"><br><br>
</form>