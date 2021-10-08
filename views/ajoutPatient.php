

<form class='userCard searchPatient' action="./traitement.php" method="post">
    <h3>Ajouter un nouveau patient</h3>
    <label for="lastName">LastName</label>
    <input type="text" name="lastName" id="lastName">
    <label for="firstName">firstName</label>
    <input type="text" name="firstName" id="firstName">
    <label for="birthDate">birthDate</label>
    <input type="text" name="birthDate" id="birthDate">
    <label for="phone">phone</label>
    <input type="text" name="phone" id="phone">    
    <label for="mail">mail</label>
    <input type="mail" name="mail" id="mail">
    <input type="submit" value="Envoyer">

</form>
<div class="containLink">

    <a href="./">Index </a><br>
    <a href="./?view=listPatients&page=0">Liste des patients</a><br>
</div>
