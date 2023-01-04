<?php
$submit = filter_input(INPUT_POST, 'submit', FILTER_DEFAULT);

$civilite = filter_input(INPUT_POST, 'civilite', FILTER_DEFAULT);
$nom = filter_input(INPUT_POST, 'firstname', FILTER_DEFAULT);
$prenom = filter_input(INPUT_POST, 'lastname', FILTER_DEFAULT);
$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
$contact = filter_input(INPUT_POST, 'contact', FILTER_DEFAULT);
$message = filter_input(INPUT_POST, 'message', FILTER_DEFAULT);

if($submit)
{
    foreach($_POST as $key => $val)
    {
        if(empty($val))
        {
            ${"error$key"} = "Le champs ".$key." est required";
            break;
        }

        #file_put_contents("contact_".date("Y-m-d H:i:s").".txt", $civilite."--".$nom."--".$prenom."--".$email."--".$contact."--".$message);

    }


}
?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="title">Civilité:</label><br>
    <select id="title" name="civilite">
        <option value="Mr">M.</option>
        <option value="Mrs">Mme</option>
    </select><br>
    <?php if($errorfirstname) {
        echo $errorfirstname;
    } ?>
    <label for="firstname">Prénom:</label>
    <br>
    <input type="text" id="firstname" name="firstname">

    <?php if($errorlastname) {
        echo $errorlastname;
    } ?>
    <label for="lastname">Nom:</label><br>
    <input type="text" id="lastname" name="lastname"><br>

    <?php if($erroremail) {
        echo $erroremail;
    } ?>
    <label for="email">Email:</label>
    <br>
    <input type="email" id="email" name="email">
    <br>

    <?php if($errorreason) {
        echo $errorreason;
    } ?>
    <label for="contact">Raison du contact:</label>
    <br>
    <input type="radio" id="reason" name="contact" value="emploi"> Proposition d'emploi
    <br>
    <input type="radio" id="reason" name="contact" value="information"> Demande d'information
    <br>
    <input type="radio" id="reason" name="contact" value="prestations"> Prestations
    <br>
    <?php if($errormessage) {
        echo $errormessage;
    } ?>
    <label for="message">Message:</label>
    <br>
    <textarea id="message" name="message"></textarea>
    <br>
    <input type="submit" value="Envoyer" name="submit">
</form>


