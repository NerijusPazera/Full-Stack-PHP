<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Views\Catalog;
use App\Views\Content;

class CatalogController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->page->setTitle('Pagrindinis');
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
        $user = \App\App::$session->getUser();
        $user ? $user_role = $user->getRole() : null;

        if ($user) {
            $h1 = 'Sveikas ' . $user->getUsername() . '!';
        } else {
            $h1 = 'Jūs neprisijungęs !';
        }

        $drinks = \App\Drinks\Model::getWhere();
        if ($drinks) {
            $catalog = [];

            foreach ($drinks as $key => $drink) {
                $catalog[$key]['drink'] = $drink;

                if (\App\App::$session->userIs(\App\Users\User::ROLE_USER)) {
                    $form = new \App\Views\Forms\Catalog\AddToCartForm($drink->getId());
                    $catalog[$key]['form'] = $form;
                }
            }
            $catalog = new \App\Views\Catalog($catalog);
        } else {
            $catalog = new Catalog();
        }

        if (isset($form) && $form->isSubmitted() && $form->validate()) {
            $safe_input = $form->getSubmitData();
            $safe_input['user_id'] = (\App\App::$session->getUser())->getId();
            $item = new \App\Cart\Items\Item($safe_input);
            $item->setStatus(\App\Cart\Items\Item::STATUS_IN_CART);

            $item_id = \App\Cart\Items\Model::insert($item);
            $item->setId($item_id);
            \App\Cart\Items\Model::update($item);
        }

        $content = new Content([
            'h1' => $h1,
            'catalog' => $catalog->render()
        ]);

        $this->page->setContent($content->render('user/catalog.tpl.php'));

        return $this->page->render();
    }
}