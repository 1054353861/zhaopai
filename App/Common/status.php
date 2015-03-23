<?php

    function display_movie($url)
    {
        $path = pathinfo($url);
        if($path['extension']!='mp4'){
            return  '<img width="100" src="/'.C('PUBLIC_VISIT.app_dir').$url.'" />';
        }else{
            return  '<embed witdh="100" src="/'.C('PUBLIC_VISIT.app_dir').$url.'"><embed/>';
        }
    }
?>