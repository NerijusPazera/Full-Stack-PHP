<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Views\Content;
use App\Views\Forms\Admin\Products\AddForm;
use App\Views\Forms\Buttons\Delete;

class ProductsController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        if (!\App\App::$session->userIs(\App\Users\User::ROLE_ADMIN)) {
            header('HTTP/1.1 401 Unauthorized');
            exit;
        }
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
        require ROOT . '/app/data/tables/drinks.php';

        $this->page->setTitle('Gėrimų Katalogas');

        $drinks = \App\Drinks\Model::getWhere();
        if ($drinks) {
            foreach ($drinks as $drink) {
                $edit = new \Core\Views\Link([
                    'url' => "/admin/edit?id={$drink->getId()}",
                    'title' => 'Redaguoti',
                    'attr' => [
                        'target' => '_blank',
                        'class' => 'admin-btn-edit'
                    ]
                ]);

                $delete = new Delete($drink->getId());
                $row = $drink->_getData();
                unset($row['photo']);
                $row['edit'] = $edit->render();
                $row['delete'] = $delete->render();

                $table['tbody'][] = $row;
            }
            $h1 = 'Gėrimų Katalogas';
            $table = new \Core\Views\Table($table);
        } else {
            $h1 = 'Gėrimų nėra !';
            $table = new \Core\Views\Table();
        }

        $content = new Content([
            'h1' => $h1,
            'table' => $table->render()
        ]);

        $this->page->setContent($content->render('admin/products/view.tpl.php'));

        if (isset($delete) && $delete->isSubmitted() && $delete->validate()) {
            $safe_input = $delete->getSubmitData();
            $drink = \App\Drinks\Model::get($safe_input['id']);
            \App\Drinks\Model::delete($drink);

            header("Location: /admin/view");
        }

        return $this->page->render();
    }

    function create(): ?string
    {
        $this->page->setTitle('Pridėti gėrimą');

        $form = new AddForm();

        if ($form->isSubmitted() && $form->validate()) {
            $safe_input = $form->getSubmitData();

            $drink_id = \App\Drinks\Model::insert($drink = new \App\Drinks\Drink($safe_input));
            $drink->setId($drink_id);
            \App\Drinks\Model::update($drink);

            header("Location: /admin/view");
        }

        $content = new Content([
            'h1' => 'Pridėkite naują gėrimą',
            'form' => $form->render()
        ]);

        $this->page->setContent($content->render('admin/products/add-edit.tpl.php'));

        return $this->page->render();
    }

    function edit(): ?string
    {
        $this->page->setTitle('Gėrimo redagavimas');

        $form = new \App\Views\Forms\Admin\Products\EditForm();

        if ($form->isSubmitted() && $form->validate()) {
            $safe_input = $form->getSubmitData();

            $drink = new \App\Drinks\Drink($safe_input);
            \App\Drinks\Model::update($drink);

            header("Location: /admin/view");
        }

        $content = new Content([
            'h1' => 'Gėrimo redagavimas',
            'form' => $form->render()
        ]);

        $this->page->setContent($content->render('admin/products/add-edit.tpl.php'));

        return $this->page->render();
    }
}