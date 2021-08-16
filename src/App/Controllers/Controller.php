<?php
namespace App\Controllers;

use App\Views\TemplateRenderer;

class Controller
{    
    public static function create(TemplateRenderer $template = NULL)
    {
        return new static($template);
    }
} 
?>