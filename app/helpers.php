<?php
function textFilter($text){
    $text = trim($text);
    $text = htmlentities($text,ENT_QUOTES);//convert string to html entities
    $text = stripcslashes($text);// to remove not necessary slashes
    return $text;
}
function removeTextFilter($text){
    $text = htmlentities($text,ENT_COMPAT);//convert string to html entities
    return $text;
}
?>