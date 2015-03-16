<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    if( ! function_exists('toSelection'))
    {
        function toSelection($collection, $currentId = null, $class = "" , $id = "", $name = "")
        {
            $html = '';
            $html .= "<select name=\"{$name}\" class= \"{$class}\" id= \"{$id}\">";
            $html .= "<option value=\"0\">--- None ---</option>";
            foreach($collection as $item){
                $html .= "<option ". (($item->id == $currentId)? "selected " : "") . "value=\"{$item->id}\">{$item->name}</option>";
            }
            $html .= "</select>";
            return $html;
        }
        
        
    }