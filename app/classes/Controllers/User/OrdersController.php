<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Views\Content;
use Core\Views\Table;

class OrdersController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        if (!\App\App::$session->userIs(\App\Users\User::ROLE_USER)) {
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
        require ROOT . '/app/data/tables/orders.php';

        $this->page->setTitle('Jūsų užsakymai');

        $orders = \App\Cart\Orders\Model::getWhere(['user_id' => \App\App::$session->getUser()->getId()]);

        if ($orders) {
            foreach ($orders as $order) {
                $view_order = new \Core\Views\Link([
                    'url' => "/orders/view?id={$order->getId()}",
                    'title' => 'Peržiūrėti',
                    'attr' => [
                        'target' => '_blank',
                        'class' => 'view-order-btn'
                    ]
                ]);

                $row = [
                    'id' => $order->getId(),
                    'status' => $order->_getStatusName(),
                    'date' => $order->getDate(),
                    'price' => $order->getPrice(),
                    'view_order' => $view_order->render()
                ];

                $table['tbody'][] = $row;
            }

            $table = new \Core\Views\Table($table);
            $h1 = 'Jūsų užsakymai';
        } else {
            $table = new Table();
            $h1 = 'Užsakymų nėra !';
        }

        $content = new Content([
            'h1' => $h1,
            'table' => $table->render()
        ]);

        $this->page->setContent($content->render('user/orders/index.tpl.php'));

        return $this->page->render();
    }

    function view(): ?string
    {
        require ROOT . '/app/data/tables/view_order.php';

        $this->page->setTitle('Užsakymo peržiūra');

        $id = $_GET['id'] ?? null;
        if ($id !== null) {
            if (strlen($id) > 0) {
                $order = \App\Cart\Orders\Model::get((int)$id);
            }
            if (!($order ?? null)) {
                header('Location: /orders/index');
            }
        }

        if ($order->getUserId() !== \App\App::$session->getUser()->getId()) {
            header('HTTP/1.1 401 Unauthorized');
            exit;
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

        $table = new Table($table);

        $content = new Content([
            'h1' => "Užsakymas ID: $id",
            'table' => $table->render(),
            'p_status' => "Statusas : {$order->_getStatusName()}",
            'p_sum' => "Viso: $sum Eur"
        ]);

        $this->page->setContent($content->render('user/orders/view.tpl.php'));

        return $this->page->render();
    }
}