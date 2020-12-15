<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());
$ip = $_POST["ipaddress"] ?? "";

?>
<h2>Validera en IP adress<h2>

    <form method="post">
      <label for="ipaddress">Ange en ip adress</label><br>
      <input type="text" id="ipaddress" name="ipaddress">
      <input type="submit" value="Validera IP">
    </form>

    <p>Ip-adress: <?= $ip ?>  </p>
    <p>Host namn: <?= $hostname ?> </p>
    <p>Ip typ: <?= $iptype ?> </p>
