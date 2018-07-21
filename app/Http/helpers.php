<?php

if ( !function_exists('parse')) {

    function parse($dateTime)
    {
        return \Illuminate\Support\Carbon::parse($dateTime);
    }
}