<?php


function show_queries()
{
    \Event::listen('illuminate.query', function($query, $params) {
        foreach($params as $param)
        {
            $pos = strpos($query,'?');
            if ($pos !== false) {
                $query = substr_replace($query,"'".$param."'",$pos,strlen('?'));
            }
        }
        echo '<p>'.$query.';</p>';
    });
}
