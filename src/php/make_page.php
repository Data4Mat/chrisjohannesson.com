<?php

function makePage($page, $lang="en")
{
    $pattern = "/[^a-z]/i";
    $response = "";
    $match = array();
    $json="";
    $nasaAPIkey = "";
    $privateNasaKey ="FpQ8A6Eki8ddIPiTrcq9xlrZyzCmkhQT5HecemYw";
    $nasaURL = "https://api.nasa.gov/planetary/apod?api_key=".$privateNasaKey;
    
        

    if(!preg_match_all($pattern, $page, $match)) {
        /* assemble the page if it's only letters in the $page variable */
        if($page == "projects") {
            $response = _buildProjectsPage($page, $lang);
        }
        else if($page == "todayImage"){
            $ch = curl_init($nasaURL); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $json = json_decode(curl_exec($ch));
            curl_close($ch);

            $response = _buildPage($page, $lang, $json);
        }
        else {
            $response = _buildPage($page, $lang);
        }
    }
    else{
        $response = "<div>Error 401: Reasource not found! match page: $page : </div>".implode(" ,", $match[0]);;
    }

    return $response;
}

function _buildPage($page, $lang, $items="")
{
    //$return = "";
    $html = file_get_contents("./inc/$page.html");
    if($items == ""){
    $items = json_decode(file_get_contents("./inc/json/$page-$lang.json"));
    }

    foreach($items as $key => $value){
        $key = "#".$key;            
        $html = str_replace($key, $value, $html);
    }
        
    $html = str_replace("#lang", $lang, $html);
        
    return $html;
}

function _buildProjectsPage($page, $lang)
{
    $html_tmpl = file_get_contents("./inc/$page"."_item.html");
    $json = json_decode(file_get_contents("./inc/json/$page-$lang.json"), true);
    $htmlPage = file_get_contents("./inc/$page.html");
    $html="";

    foreach($json as $name => $values){
        if(gettype($values) == "array") {
            $tmp = $html_tmpl;
            foreach($values[0] as $key => $value){
                $key = "#".$key;
                $tmp = str_replace($key, $value, $tmp);
            }
            $html .= $tmp;
        }
        else {
            $name = "#".$name;
            $htmlPage = str_replace($name, $values, $htmlPage);
        }
    }
    $htmlPage = str_replace("#content", $html, $htmlPage);
    return $htmlPage;
}
?>