<?php

    function display_movie($url)
    {
        $path = pathinfo($url);
        if($path['extension']!='mp4'){
            return  '<img width="50" src="/'.C('PUBLIC_VISIT.app_dir').$url.'" />';
        }else{
            return  '<embed witdh="50" src="/'.C('PUBLIC_VISIT.app_dir').$url.'"><embed/>';
        }
    }
?>