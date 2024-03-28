<?php

return [   
    'pattern' => 'update-destination',
    'method' => 'POST',
    'action' => function() {
      try {
        $data = kirby()->request()->data();

        Cookie::set('shipping-destination', $data['destination']);
        kirby()->session()->set('shipping-destination', $data['destination']);

        return [
          'status' => 200,
          'data' => $data,
        ];
      } catch (Kirby\Exception\Exception $ex) {
        return $ex->toArray();
      }
    },
];