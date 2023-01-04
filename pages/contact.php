<?php
var_dump($_POST);
$submit = filter_input(INPUT_POST, 'submit', FILTER_DEFAULT);

$civilite = filter_input(INPUT_POST, 'civilite', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nom = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$prenom = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if($submit)
{
    foreach($_POST as $key => $val)
    {
        if(empty($val))
        {
            ${"error$key"} = "Le champs ".$key." est required";
            $valide = false;
        }

    }

    // Verification validation Civilité:
    $civiliteTable = ['Mr','Mrs'];
    $contactTable = ['emploi','information','prestations'];

    if(in_array($civilite, $civiliteTable))
    {
        echo "Civilité non conforme !".'<br>';
        $valide = true;
    }

    // Verification validation Raison du contact:
    if(in_array($contact, $contactTable))
    {
        echo "Raison du contact non conforme !".'<br>';
        $valide = true;
    }

    if(!$email)
    {
        echo "Email invalid"."<br>";
        $valide = false;
    }

    // Verification validation message si 5 caracteres:
    if(strlen($message) < 5)
    {
        echo "Le message required plus de 5 caractères".'<br>';
        $valide = false;
    }
     // Si tout valider j'envoie et j'ecris dans mon document.
    if($valide)
    {
        file_put_contents('Contact_'.date("Y-m-d H:i:s"), $civilite." | ".$nom." | ".$prenom." | ".$email." | ".$contact." | ".$message);
    }
}
?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="title">Civilité:</label><br>
    <select id="title" name="civilite">
        <option value=""></option>
        <option value="Mr">M.</option>
        <option value="Mrs">Mme</option>
    </select><br>
    <?php if($errorfirstname) {
        echo "<br>".$errorfirstname;
    } ?>
    <label for="firstname">Prénom:</label>
    <br>
    <input type="text" id="firstname" name="firstname">


    <br>
    <label for="lastname">Nom:</label>
    <br>
    <input type="text" id="lastname" name="lastname"><br>
    <?php if($errorlastname) {
        echo $errorlastname;
    } ?>
    <br>
    <label for="email">Email:</label>
    <br>
    <input type="email" id="email" name="email">
    <br>
    <?php if($erroremail) {
        echo $erroremail."<br>";
    } ?>


    <br>
    <label for="contact">Raison du contact:</label>
    <br>
    <input type="radio" id="reason" name="contact" value="emploi"> Proposition d'emploi
    <br>
    <input type="radio" id="reason" name="contact" value="information"> Demande d'information
    <br>
    <input type="radio" id="reason" name="contact" value="prestations"> Prestations
    <br>
    <?php if($errorcontact) {
        echo "<br>".$errorcontact;
    } ?>

    <label for="message">Message:</label>    <br>
    <textarea id="message" name="message"></textarea>
    <br>
    <?php if($errormessage) {
        echo "<br>".$errormessage;
    } ?>
    <br>
    <input type="submit" value="Envoyer" name="submit">
</form>


