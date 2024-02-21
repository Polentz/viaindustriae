<?php

class OrderPage extends OrderPageAbstract
{
    public function title(): \Kirby\Cms\Field
    {
        return new Field($this, 'title', t('order.invoice') . ' ' . $this->invoiceNumber());
    }
}
