<form action="index.php?page=contact" method="post">
    <label for="title">Civilité:</label><br>
    <select id="title" name="civilite">
        <option value="Mr">M.</option>
        <option value="Mrs">Mme</option>
    </select><br>

    <label for="firstname">Prénom:</label><br>
    <input type="text" id="firstname" name="firstname">

    <label for="lastname">Nom:</label><br>
    <input type="text" id="lastname" name="lastname"><br>

    <label for="email">Email:</label>
    <br>
    <input type="email" id="email" name="email">
    <br>

    <label for="contact">Raison du contact:</label>
    <br>
    <input type="radio" id="reason" name="contact" value="emploi"> Proposition d'emploi
    <br>
    <input type="radio" id="reason" name="contact" value="information"> Demande d'information
    <br>
    <input type="radio" id="reason" name="contact" value="prestations"> Prestations
    <br>

    <label for="message">Message:</label>
    <br>
    <textarea id="message" name="message"></textarea>
    <br>
    <input type="submit" value="Envoyer">
</form>


<?php
$submit = filter_input(INPUT_POST, 'submit', FILTER_DEFAULT);

if($submit)
{
    $civilite = filter_input(INPUT_POST, 'civilite', FILTER_DEFAULT);
    $nom = filter_input(INPUT_POST, 'firstname', FILTER_DEFAULT);
    $prenom = filter_input(INPUT_POST, 'lastname', FILTER_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
    $contact = filter_input(INPUT_POST, 'contact', FILTER_DEFAULT);
    $message = filter_input(INPUT_POST, 'message', FILTER_DEFAULT);

    file_put_contents("contact_".date("Y-m-d H:i:s").".txt", $civilite."--".$nom."--".$prenom."--".$email."--".$contact."--".$message);
}
