<?php
namespace App\Views;

class TemplateRenderer
{   
    private $path;
    private $params = [];

    public function render($view, array $params = [])
    {          

        ob_start();
        extract($params, EXTR_OVERWRITE);
        $extends = null;
        require $view;
        $content = ob_get_clean();

        if ($extends === null) {
            return $content;
        }

        return $this->render($extends, [
            'content' => $content
        ]);
    }
} 
?>