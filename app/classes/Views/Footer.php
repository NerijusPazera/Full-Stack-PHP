<?php

namespace App\Views;

use Core\View;

class Footer extends View
{
    public function __construct($data = [])
    {
        parent::__construct($data);
        $this->data['text'] = 'Nerijus Pažėra 2020&copy;';
    }

    public function render(string $template_path = ROOT . '/app/templates/footer.tpl.php')
    {
        return parent::render($template_path);
    }

}