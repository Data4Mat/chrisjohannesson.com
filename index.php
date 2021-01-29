<?php
    $tmpl = file_get_contents("./inc/page_tmpl.html");
    $nav = file_get_contents("./inc/navigation.html");
    $footer = file_get_contents("./inc/footer.html");
    $tmpl = str_replace("#nav", $nav, $tmpl);
    $tmpl = str_replace("#page", "Home", $tmpl);
    $tmpl = str_replace("#footer", $footer, $tmpl);

    $tmpl = str_replace("#left", '', $tmpl);
    $tmpl = str_replace("#main_left", '', $tmpl);
    $tmpl = str_replace("#main_right", '', $tmpl);
    $tmpl = str_replace("#right", '', $tmpl);
    
    

    echo $tmpl;

?>
