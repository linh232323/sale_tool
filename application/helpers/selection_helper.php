<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    if( ! function_exists('toSelection'))
    {
        function getLevelToSelection($collection, $currentId = null, $class = "" , $id = "")
        {
            $html = '';
            $html .= "<select class= \"{$class}\" id= \"{$id}\">";
            foreach($collection as $item){
                $html .= "<option ". (($item->id === $currentId)? "" : "checked") . "value=\"{$item->id}\">{$item->name}</option>"
            }
            return $html;
        }
        
        
    }