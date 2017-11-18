<?php

namespace App\Http\Controllers;

use App\Jobs\AddToCart;
use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;

class CartController extends Controller
{
  /**
   * Update cart items.
   *
   * @param  Request  $request
   * @return Response
   */
  public function update(Request $request)
  {
    $items = [
      (object) [ 'title' => 'A shoe', 'sdk' => 22349443, 'sku' => 345542222, 'quantity' => 3 ],
      (object) [ 'title' => 'A t-shirt', 'sdk' => 3838838, 'sku' => 816452262, 'quantity' => 1 ]
    ];
    AddToCart::dispatch($items)->onQueue('mikqueue');
  }
}