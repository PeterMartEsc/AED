<?php
    $array = ["a","a","a","a","a"];

    $j=count($array);
    foreach( $array as $key => &$val){
        $j--;
        $array[$j] .= $j;
        echo "<br>";
        var_dump($array);
        echo "<br> $key => $val";
        echo "<br> $key => $array[$key]";
        echo "<br>";
    }
?>