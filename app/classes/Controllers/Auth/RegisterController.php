<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Views\Content;
use App\Views\Forms\Auth\RegisterForm;

class RegisterController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->page->setTitle('Registruokitės');
    }

    /**
     * This method builds or sets
     * current $page content
     * renders it and returns HTML
     *
     * There can be more methods,
     * like edit (for showing edit form)
     * delete (for deleting an item)
     * and more if needed,
     *
     * So if we have ex.: ProductsController,
     * it can have methods responsible for
     * index() (main page, usualy a list),
     * view() (preview single),
     * create(),
     * edit() and
     * delete()
     *
     * These methods can then be called on each page accordingly, ex.:
     * edit.php:
     * $controller = new ProductsController();
     * print $controller->edit();
     *
     *
     * create.php:
     * $controller = new ProductsController();
     * print $controller->create();
     *
     * @return string|null
     * @throws \Exception
     */
    function index(): ?string
    {
        $form = new RegisterForm();

        if ($form->isSubmitted() && $form->validate()) {
            $safe_input = $form->getSubmitData();
            unset($safe_input['password_repeat']);
            $user = new \App\Users\User($safe_input);
            $user->setRole(\App\Users\User::ROLE_USER);

            $user_id = \App\Users\Model::insert($user);
            $user->setId($user_id);
            \App\Users\Model::update($user);

            header("Location: /login");
        }

        $content = new Content([
            'h1' => 'Naujo vartotojo registracija',
            'form' => $form->render()
        ]);

        $this->page->setContent($content->render('auth/register.tpl.php'));

        return $this->page->render();
    }
}