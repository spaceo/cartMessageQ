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
    if (empty($request->input('items'))) {
      die('Missing items in request');
    }

    $job = (new \App\Jobs\AddToCart($request->input('items')))->onConnection('interop');
    dispatch($job);
  }
}