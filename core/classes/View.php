<?php

namespace Core;

class View
{
    protected $data;

    /**
     * View constructor.
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Renders array onto template.
     * @param String $template_path
     * @return String HTML
     * @throws \Exception
     */
    public function render(string $template_path)
    {
        if (!file_exists($template_path)) {
            throw (new \Exception("Template with filename: $template_path does not exists !"));
        }

        $data = $this->data;

        ob_start();

        require $template_path;

        return ob_get_clean();
    }
}