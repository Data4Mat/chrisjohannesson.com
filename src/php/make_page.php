<?php

    function makePage($page){
        $pattern = "/[^a-z]/i";
        $response = "";
        $match = array();
        

        if(!preg_match_all($pattern, $page, $match)){
            /* assemble the page if it's only letters in the $page variable */
            $response = _buildPage($page);
        }
        else{
            $response = "<div>Error 401: Reasource not found! match page: $page : </div>".implode(" ,", $match[0]);;
        }

        return $response;
    }

    function _buildPage($page){
        $return = "";
        
        switch($page){
            case "about":
                $return = file_get_contents("./inc/about.html");
                break;
            case "home":
                $return = file_get_contents("./inc/home.html");
                break;
            case "resume":
                $return = file_get_contents("./inc/resume.html");
                break;
            case "wae":
                $return = file_get_contents("./weather-and-exchange/wae.html");
                break;
            default:
                $return = "<div>Error 401: Reasource not found! buildPage: $page</div>";
        }

        return $return;

    }
?>