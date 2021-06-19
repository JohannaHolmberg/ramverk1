<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
// echo showEnvironment(get_defined_vars(), get_defined_functions());


?>
<h2>Ip adress location<h2>


        <form method="post">
          <label for="ipaddress">Ange en ip adress</label><br>
          <input type="text" id="ipaddress" placeholder="<?= $clientIPAddress ?>" value="<?= $clientIPAddress ?>" name="ipaddress">
          <input type="submit" value="Validera IP">
        </form>

Hostname: <?= $hostname ?>
<br>IP-type: <?= $iptype ?>

<br>Country: <?= $country ?>

<br> Long: <?= $longitude ?>

<br> Lat: <?= $latitude ?>
