<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Views\Content;
use Core\Views\Table;

class OrdersController extends BaseController
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
        require ROOT . '/app/data/tables/admin_orders.php';

        $this->page->setTitle('Visi užsakymai');

        $orders = \App\Cart\Orders\Model::getWhere();
        if ($orders) {
            foreach ($orders as $order) {
                $row = [
                    'id' => $order->getId(),
                    'status' => $order->_getStatusName(),
                    'name' => $order->user()->getName(),
                    'surname' => $order->user()->getSurname(),
                    'price' => $order->getPrice(),
                    'date' => $order->getDate()
                ];

                $view_order = new \Core\Views\Link([
                    'url' => "/admin/orders/view?id={$order->getId()}",
                    'title' => 'Peržiūrėti',
                    'attr' => [
                        'target' => '_blank',
                        'class' => 'view-order-btn'
                    ]
                ]);

                $row['view_order'] = $view_order->render();

                $table['tbody'][] = $row;
            }
            $table = new \Core\Views\Table($table);
            $h1 = 'Visi užsakymai';
        } else {
            $table = new Table();
            $h1 = 'Užsakymų nėra !';
        }

        $content = new Content([
            'h1' => $h1,
            'table' => $table->render()
        ]);

        $this->page->setContent($content->render('admin/orders/index.tpl.php'));

        return $this->page->render();
    }

    function edit(): ?string
    {
        require ROOT . '/app/data/tables/admin_view_order.php';

        $this->page->setTitle('Užsakymo peržiūra');

        $id = $_GET['id'] ?? null;
        if ($id !== null) {
            if (strlen($id) > 0) {
                $order = \App\Cart\Orders\Model::get((int)$id);
            }
            if (!($order ?? null)) {
                header('Location: /admin/orders/index');
            }
        }

        $form = new \App\Views\Forms\Admin\Orders\EditForm();

        if ($form->isSubmitted() && $form->validate()) {
            $safe_input = $form->getSubmitData();
            $order = \App\Cart\Orders\Model::get($safe_input['order_id']);
            $order->setStatus((int)$safe_input['select']);
            \App\Cart\Orders\Model::update($order);

            header('Location: /admin/orders/index');
        }

        $items = \App\Cart\Items\Model::getWhere(['order_id' => $id]);
        $sum = 0;
        foreach ($items as $item_key => $item) {
            $row = [
                'nr' => $item_key + 1,
                'drink_name' => $item->drink()->getDrinkName(),
                'price' => $item->drink()->getPrice(),
            ];

            $table['tbody'][] = $row;

            $sum += $item->drink()->getPrice();
        }

        $table = new \Core\Views\Table($table);

        $content = new Content([
            'h1' => "Užsakymas ID: $id",
            'h3' => "Viso: $sum Eur",
            'h3_name' => "Vardas: {$order->user()->getName()}",
            'h3_surname' => "Pavardė: {$order->user()->getSurname()}",
            'table' => $table->render(),
            'form' => $form->render()
        ]);

        $this->page->setContent($content->render('admin/orders/view.tpl.php'));

        return $this->page->render();
    }
}