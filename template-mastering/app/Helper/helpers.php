<?php

if (!function_exists('greetings')) {

    function greetings(String $name): String
    {
        return 'Hello ' . $name;
    }
}
