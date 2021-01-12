<?php
/* Should handle all page requests from the client. */

include "./src/php/make_page.php";

$page=$_GET['page'];

//echo "get: ".$_GET['page'];
echo makePage($page);


?>