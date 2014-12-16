<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    if ( ! function_exists('getAllLevelByType'))
    {
        function getAllLevelByType($type = 'hotel')
        {
            
        }
        
    }
    
    if( ! function_exists('getLocationToSelection'))
    {
        function getLevelToSelection($currentId = null, $class = "" , $id = "",$type = "hotel",)
        {
            $html = '';
            
            $html .= "<select class= \"{$class}\" id= \"{$id}\">";
            foreach(getAllLocation as $item){
                $html .= "<option ". ($item->id === $currentId)? "" : "checked" ."value=\"{$item->id}\">{$item->name}</option>"
            }
            return $html;
        }
        
        
    }