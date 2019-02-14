<?php

//Création de nos helpers

//Permet d'executer ce script que si BASEPATH est défini
if ( !defined('BASEPATH')) exit('No direct script access allowed');

//On vérifie à chaque fois si la fonction n'existe pas déjà au risque d'en écrasées

if(!function_exists('css_url'))
{
    function css_url($nom)
    {
        return base_url(). 'assets/css/'. $nom.'.css';
    }
}

if(!function_exists('js_url'))
{
    function js_url($nom)
    {
        return base_url(). 'assets/js/'. $nom.'.js';
    }
}

if(!function_exists('bootstrap_url'))
{
    function bootstrap_url($nom)
    {
        return base_url(). 'assets/bootstrap/'. $nom;
    }
}

if(!function_exists('fontAwesome_url'))
{
    function fontAwesome_url($nom)
    {
        return base_url(). 'assets/font-awesome/'. $nom;
    }
}