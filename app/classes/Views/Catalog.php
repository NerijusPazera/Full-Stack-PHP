<?php

namespace App\Views;

use Core\View;

class Catalog extends View
{
    public function render(string $template_path = ROOT . '/app/templates/catalog.tpl.php')
    {
        return parent::render($template_path);
    }
}