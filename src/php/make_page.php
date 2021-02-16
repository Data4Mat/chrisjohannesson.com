<?php

    function makePage($page, $lang="en"){
        $pattern = "/[^a-z]/i";
        $response = "";
        $match = array();
        

        if(!preg_match_all($pattern, $page, $match)){
            /* assemble the page if it's only letters in the $page variable */
            $response = _buildPage($page, $lang);
        }
        else{
            $response = "<div>Error 401: Reasource not found! match page: $page : </div>".implode(" ,", $match[0]);;
        }

        return $response;
    }

    function _buildPage($page, $lang){
        //$return = "";
        $html = file_get_contents("./inc/$page.html");
        $items = json_decode(file_get_contents("./inc/json/$page-$lang.json"));

        foreach($items as $key => $value){
            $key = "#".$key;            
            $html = str_replace($key, $value, $html);
        }
        
        $html = str_replace("#lang",$lang,$html);
        
        return $html;
    }
?>