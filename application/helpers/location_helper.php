<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    if ( ! function_exists('getAllLocation'))
    {
        function getAllLocation($var = '')
        {
            
        }
        
    }

    if( ! function_exists('getLocationToSelection'))
    {
        function getLocationToSelection($currentId = null, $class = "" , $id = "")
        {
            $html = '';
            
            $html .= "<select class= \"{$class}\" id= \"{$id}\">";
            foreach(getAllLocation as $item){
                $html .= "<option ". ($item->id === $currentId)? "" : "checked" ."value=\"{$item->id}\">{$item->name}</option>"
            }
            return $html;
        }
        
    
    }