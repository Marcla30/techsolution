<?php
$title = "- Contact";
include "../views/layout/header.php";

if (isset($_POST["sujet"])) {
    pushContactForm($_POST['lname'], $_POST['fname'], $_POST['email'], $_POST['sujet']);
}
?>

<head>
    <link rel="stylesheet" href="../../techsolution/login/login.css">
</head>

<h1>Nous retrouver</h1>
<p class="adresse">41 Bis Av. Edmond Michelet, 19100 Brive-la-Gaillarde</p>
<div class="carteframe">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2814.0270231927084!2d1.5281178760190728!3d45.14604897107056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f897fd9659f35b%3A0xa054a718bd8b0345!2sSchool%20Bahuet!5e0!3m2!1sen!2sfr!4v1730825489213!5m2!1sen!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<h1>Formulaire de contact</h1>
<div class="formcontainer">
    <form action="contact.php" method="POST">

        <input type="text" id="lname" name="lname" placeholder="Votre nom">

        <input type="text" id="fname" name="fname" placeholder="Votre prénom">

        <input type="email" id="email" name="email" placeholder="Votre email">

        <textarea type="text" id="subject" name="sujet" placeholder="Votre demande..."></textarea>

        <input type="submit" value="Envoyer">

    </form>

</div>

</body>
</html>