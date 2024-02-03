<?php

class MyFct
{
    function generatePage($file, $variables = [], $base = "View/base.html.php")
    {
        if (file_exists($file)) {
            extract($variables);
            ob_start();
            require_once($file);
            $fileContent = ob_get_clean();

            ob_start();
            require_once($base);
            $page = ob_get_clean();
            echo $page;
        } else {
            echo "Fichier n'existe pas";
        }
    }
    static function prints($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}
