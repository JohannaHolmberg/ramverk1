<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
// echo showEnvironment(get_defined_vars(), get_defined_functions());


?>
<h2>Validera JSON IP adress<h2>

    <p>Det här är ett API validerings verktyg för IP adresser.
    Man får fram ip adressens domän namn, typ av ip ex IPv4 eller IPv6.
Skriv in en ip adress nedan!</p>

        <form method="post">
          <label for="ipJSONaddress">Ange en ip adress</label><br>
          <input type="text" name="ipJSONaddress">
          <input type="submit" value="Skicka">
        </form>


        <p>Ip typ: <?= $ipAddress ?> </p>



        <br><br><br>
        <form method="post">
          <label for="ipJSONaddressTest">Eget Exempel - Unit Test syfte</label><br>
          <input type="text" name="ipJSONaddressTest" value="8.8.8.8" placeholder="8.8.8.8">
          <input type="submit" value="Testa">
        </form>

        <p>Ip typ Test: <?= $ipAddressTest ?> </p>
