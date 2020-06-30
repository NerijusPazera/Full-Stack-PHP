<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Views\Content;
use App\Views\Forms\Buttons\Delete;
use App\Views\Forms\Buttons\Order;
use Core\Views\Form;
use Core\Views\Table;

class CartController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->page->setTitle('Pirkinių krepšelis');

        date_default_timezone_set('Europe/Vilnius');
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
        require ROOT . '/app/data/tables/cart.php';


        $user_id = \App\App::$session->getUser()->getId();
        $items = \App\Cart\Items\Model::getWhere([
            'user_id' => $user_id,
            'status' => \App\Cart\Items\Item::STATUS_IN_CART
        ]);
        if ($items) {
            foreach ($items as $key => $item) {
                $delete = new Delete($item->getId());

                $row = [
                    'id' => $key + 1,
                    'drink_name' => $item->drink()->getDrinkName(),
                    'price' => $item->drink()->getPrice(),
                    'delete' => $delete->render()
                ];

                $table['tbody'][] = $row;
            }

            $h1 = 'Pirkinių krepšelis';
            $table = new \Core\Views\Table($table);
            $order_btn = new Order();
        } else {
            $h1 = 'Pirkinių krepšelis tuščias !';
            $table = new Table();
            $order_btn = new Form();
        }

        $content = new Content([
            'h1' => $h1,
            'table' => $table->render(),
            'form' => $order_btn->render()
        ]);

        $this->page->setContent($content->render('user/cart.tpl.php'));

        if (isset($delete) && $delete->isSubmitted() && $delete->validate()) {
            $safe_input = $delete->getSubmitData();
            $item = \App\Cart\Items\Model::get($safe_input['id']);
            \App\Cart\Items\Model::delete($item);

            header("Location: /cart");
        } elseif (isset($order_btn) && $order_btn->isSubmitted() && $order_btn->validate()) {
            $order = new \App\Cart\Orders\Order([
                'user_id' => $user_id,
                'date' => date('Y.m.d H:i'),
                'status' => \App\Cart\Orders\Order::STATUS_SUBMITTED
            ]);

            $order_id = \App\Cart\Orders\Model::insert($order);
            $order->setId($order_id);

            $sum = 0;
            foreach ($items as $item) {
                $item->setStatus(\App\Cart\Items\Item::STATUS_ORDERED);
                $item->setOrderId($order_id);
                \App\Cart\Items\Model::update($item);

                $sum += $item->drink()->getPrice();
            }

            $order->setPrice($sum);
            \App\Cart\Orders\Model::update($order);

            header("Location: /cart");
        }

        return $this->page->render();
    }
}