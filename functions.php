<?php

function myDebugger($data):void
{
    echo "<hr> <br /> <b>My debugging</b></p>";

    echo '<pre>';
    print_r($data);
    echo '</pre>';
    echo "<hr>";

}