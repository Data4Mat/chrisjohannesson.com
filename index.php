<?php

header("Access-Control-Allow-Origin: https://apod.nasa.gov/*");

include "./src/php/make_page.php";

$noPageRequest = true; // true if there is no 'page' tag in the GET request.

    if(isset($_GET['lang'])){
        $lang=$_GET['lang'];
    }
    else{
        $lang="en";
    }
    if(isset($_GET['page'])){
        $page=$_GET['page'];
        $noPageRequest = false;
    }
    else{
        $page = "home";
    }

if($noPageRequest){
    $tmpl = file_get_contents("./inc/page_tmpl.html");
    $nav = file_get_contents("./inc/navigation.html");
    $footer = file_get_contents("./inc/footer.html");
   // $main = file_get_contents("./inc/home.html");
    $tmpl = str_replace("#nav", $nav, $tmpl);
    $tmpl = str_replace("#page", "Home", $tmpl);
    $tmpl = str_replace("#footer", $footer, $tmpl);
    $tmpl = str_replace("#main", makePage("home", "en"), $tmpl);
    
    echo $tmpl;
}
else{
    echo makePage($page);
}

?>