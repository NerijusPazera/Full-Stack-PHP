<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Views\Footer;
use App\Views\Navigation;
use App\Views\Page;

abstract class BaseController extends Controller
{

    /**
     * Controller constructor.
     *
     * We can write logic common for all
     * other methods
     *
     * For example, create $page object,
     * set it's header/navigation
     * or check if user has a proper role
     *
     * Goal is to prepare $page
     */
    public function __construct()
    {
        $this->page = new Page([
            'head' => [
                'css' => ['/assets/css/style.css'],
                'js' => ['/assets/js/app.js']
            ],
            'header' => (new Navigation())->render(),
            'footer' => (new Footer())->render()
        ]);
    }
}