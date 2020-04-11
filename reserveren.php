<?php
require "header.php";
?>

<main>
    <h1> Reservering Maken</h1>
    <form action="includes/reserveren.inc.php" method="post" id="reserveren">
        <input type="text" name="lname" placeholder="Achternaam">
        <input type="text" name="fname" placeholder="Voornaam">
        <input type="email" name="uemail" placeholder="Email">
        <input type="tel" name="tel" placeholder="Telefoon">
        <input type="text" name="nkind" placeholder="Naam Kind">
        <p>Geslacht van u kind: <br>
            <label for ="jongen">Jongen</label>
            <input type="radio" id="jongen" name="geslacht" value="jongen">
            <label for ="meisje">Meisje</label>
            <input type="radio" id="meisje" name="geslacht" value="meisje">
            <label for ="anders">Anders</label>
            <input type="radio" id="anders" name="geslacht" value="anders">
        </p>
        <select id="geslacht" name="geslacht">
            <option value="">Geslacht</option>
            <option value="jongen">Jongen</option>
            <option value="meisje">Meisje</option>
        </select>
        <label for="gdatum">Geboorte datum van kind:</label>
        <input type="date" id="gdatum" name="gdatum" placeholder="Geboorte Datum">
        <label for="fdatum">Datum feest:</label>
        <input type="date" name="fdatum" id="fdatum" placeholder="Feest Datum">
        <select id="duur" name="tijd">
            <option value="">Feest duur</option>
            <option value="1">1 uur</option>
            <option value="2">1 uur 30 minuten</option>
            <option value="3">2 uur</option>
        </select>
        <label for="akind">Aantal kinderen</label>
        <input type="number" id="akind" name="akind" min="2" max="12">
        <label for="aouders">Aantal ouders</label>
        <input type="number" id="aouders" name="aouders" min="1" max="4">
        <select id="sfeest" name="sfeest">
            <option value=""> Soort feest</option>
            <option value="burger">Burger Feest</option>
            <option value="schmink">Schmink Feest</option>
        </select>
        <p>Wilt u begeleiding?
        <label for ="ja">Ja</label>
        <input type="radio" id="ja" name="yes_no" value="ja">
        <label for ="nee">Nee</label>
        <input type="radio" id="nee" name="yes_no" value="nee">
        </p>
        <button type="submit" name="reservering">Reservering maken</button>
    </form>

</main>

<?php
require "footer.php"
?>