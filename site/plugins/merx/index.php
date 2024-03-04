<?php

use Wagnerwagner\Merx\Merx;
use Wagnerwagner\Merx\Cart;
use Wagnerwagner\Merx\ProductList;
use Kirby\Cms\Page;
use Kirby\Exception\Exception;

@include_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/models/orderPageAbstract.php';


function merx(): Merx
{
    return new Merx();
}

function cart(array $data = []): Cart
{
    return new Cart($data);
}

function productList(array $data = []): ProductList
{
    return new ProductList($data);
}

function formatPrice(float $price, bool $currencyPositionPrecedes = null, bool $currencySeparateBySpace = null): string
{
    return Merx::formatPrice($price, $currencyPositionPrecedes, $currencySeparateBySpace);
}

function formatIBAN(string $iban): string
{
    return Merx::formatIBAN($iban);
}

function calculateTax(float $grossPrice, float $tax): float
{
    return Merx::calculateTax($grossPrice, $tax);
}

function calculateNet(float $grossPrice, float $tax): float
{
    return Merx::calculateNet($grossPrice, $tax);
}

function crossfoot(int $int): string
{
    $r = 0;
    foreach (str_split($int) as $v) {
        $r += $v;
    }
    return $r;
}

Kirby::plugin('ww/merx', [
    'options' => [
        'successPage' => 'success',
        'ordersPage' => 'orders',
        'currency' => 'EUR',
        'currencySymbol' => '€',
        'production' => false,
    ],
    'templates' => [
        'success' => __DIR__ . '/templates/success.php',
        'orders' => __DIR__ . '/templates/orders.php',
    ],
    'blueprints' => [
        'fields/price' => __DIR__ . '/blueprints/fields/price.yml',
        'ww.merx.fields/price' => __DIR__ . '/blueprints/fields/price.yml',
        'layouts/order' => __DIR__ . '/blueprints/layouts/order.yml',
        'ww.merx.layouts/order' => __DIR__ . '/blueprints/layouts/order.yml',
        'pages/order' => __DIR__ . '/blueprints/pages/order.yml',
        'ww.merx.pages/order' => __DIR__ . '/blueprints/pages/order.yml',
        'pages/orders' => __DIR__ . '/blueprints/pages/orders.yml',
        'ww.merx.pages/orders' => __DIR__ . '/blueprints/pages/orders.yml',
        'pages/product' => __DIR__ . '/blueprints/pages/product.yml',
        'ww.merx.pages/product' => __DIR__ . '/blueprints/pages/product.yml',
        'sections/order' => __DIR__ . '/blueprints/sections/order.yml',
        'ww.merx.sections/order' => __DIR__ . '/blueprints/sections/order.yml',
        'sections/orders' => __DIR__ . '/blueprints/sections/orders.yml',
        'ww.merx.sections/orders' => __DIR__ . '/blueprints/sections/orders.yml',
        'sections/payment' => __DIR__ . '/blueprints/sections/payment.yml',
        'ww.merx.sections/payment' => __DIR__ . '/blueprints/sections/payment.yml',
    ],
    'translations' => [
        'en' => [
            'error.merx.initializePayment' => 'The payment could not be initialized.',
            'error.merx.noPaymentMethod' => 'No payment method provided.',
            'error.merx.fieldsvalidation' => 'Field validation failed.',
            'error.merx.emptycart' => 'The cart is empty.',
            'error.merx.completePayment' => 'The payment could not be completed.',
            'error.merx.paymentCanceled' => 'You canceled the payment.',
            'error.merx.cart.add' => 'Item "{id}" could not be added to cart.',
            'error.merx.cart.update' => 'Cart items could not be updated.',
            'error.merx.order.changeNum' => 'Sorting number of a complete order cannot be changed.',
            'error.merx.order.changeStatus' => 'Status of a complete order cannot be changed.',
            'field.title' => "{title}",
            'field.key' => 'Key',
            'field.id' => 'ID',
            'field.info' => 'Info',
            'field.payment' => 'Payment',
            'field.paymentMethod' => 'Payment method',
            'field.paymentComplete' => 'Payment complete',
            'field.price' => 'Price',
            'field.tax' => 'Tax',
            'field.items' => 'Cart items',
            'field.quantity' => 'Quantity',
            'field.overview' => 'Overview',
            'field.order' => 'Order',
            'page.title.product' => 'Product',
            'page.status.error' => 'Error',
            'page.status.incomplete' => 'Incomplete',
            'page.status.complete' => 'Complete',
            'section.headline.orders' => 'Orders',
        ],
        'it' => [
            'error.merx.initializePayment' => 'Non è stato possibile inizializzare il pagamento.',
            'error.merx.noPaymentMethod' => 'Non è stato fornito alcun metodo di pagamento.',
            'error.merx.fieldsvalidation' => 'Validazione del campo fallita.',
            'error.merx.emptycart' => 'Il carrello è vuoto.',
            'error.merx.completePayment' => 'Die Bezahlung konnte nicht abgeschlossen werden.',
            'error.merx.paymentCanceled' => 'Non è stato possibile concludere il pagamento.',
            'error.merx.cart.add' => "Non è stato possibile aggiungere l'articolo '{id}' al carrello.",
            'error.merx.cart.update' => 'Non è stato possibile aggiornare gli articoli.',
            'error.merx.order.changeNum' => 'La posizione di un ordine completo non può essere modificata.',
            'error.merx.order.changeStatus' => 'Lo stato di un ordine completo non può essere modificato.',
            'field.title' => "{title}",
            'field.key' => 'Key',
            'field.id' => 'ID',
            'field.info' => 'Info',
            'field.payment' => 'Pagamento',
            'field.paymentMethod' => 'Metodo di pagamento',
            'field.paymentComplete' => 'Pagamento completo',
            'field.price' => 'Prezzo',
            'field.tax' => 'Imposta %',
            'field.items' => 'Carrello',
            'field.quantity' => 'Quantità',
            'field.overview' => 'Panoramica',
            'field.order' => 'Ordine',
            'page.title.product' => 'Articolo',
            'page.status.error' => 'Errore',
            'page.status.incomplete' => 'Incompleto',
            'page.status.complete' => 'Completo',
            'section.headline.orders' => 'Ordini',
        ],
    ],
    'hooks' => [
        'page.changeNum:before' => function (Page $page, ?int $num) {
            if ((string)$page->intendedTemplate() === 'order' && $page->isListed() && $num !== $page->num()) {
                throw new Exception(['key' => 'merx.order.changeNum']);
            }
        },
        'page.changeStatus:before' => function (Page $page) {
            if ((string)$page->intendedTemplate() === 'order' && $page->isListed()) {
                throw new Exception(['key' => 'merx.order.changeStatus']);
            }
        },
        'route:before' => function ($route, $path, $method) {
            $successPage = new Page([
                'slug' => option('ww.merx.successPage'),
                'template' => 'success',
            ]);
            site()->children()->add($successPage);
        },
    ],
    'fieldMethods' => [
        'toFormattedPrice' => function ($field, bool $currencyPositionPrecedes = null, bool $currencySeparateBySpace = null) {
            return Merx::formatPrice($field->toFloat(), $currencyPositionPrecedes, $currencySeparateBySpace);
        },
    ],
]);
