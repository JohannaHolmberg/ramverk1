<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
// echo showEnvironment(get_defined_vars(), get_defined_functions());


?>
<h2>Ip adress location JSON<h2>
<p>Det här är ett verktyg för att få fram information om ip adressen som hämtas via
ett externt API. </p>
<p>Man får fram ip adressens domän namn, typ av ip ex IPv4 eller IPv6, land, long och latutude.
Skriv in en ip adress nedan!</p>
<p> Uppgifterna hämtas från ett ställe i en JSON och presenteras som sin helhet! Hämtad med curl!</p>

        <form method="post">
          <label for="ipaddress">Ange en ip adress</label><br>
          <input type="text" id="ipaddress" name="ipaddress">
          <input type="submit" value="Validera IP">
        </form>


<p>Json: <?= $content ?> </p>



        <br><br><br>
        <form method="post">
          <label for="ipaddress">Testa att verktyfet fungerar</label><br>
          <input type="text" name="ipaddressTest" value="8.8.8.8" placeholder="8.8.8.8">
          <input type="submit" value="Testa IP verktyget">
        </form>
