<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_to_cart(Request $request)
    {
        $product_id=$request->product_id;
        $qty=$request->qty;
        $product_info = DB::table('tbl_product')
                                 ->select('*')
                                 ->where('id',$product_id)
                                 ->first();
        Cart::add([
        'id' => $product_info->id, 
        'name' => $product_info->product_name, 
        'qty' => $qty, 
        'price' => $product_info->product_price, 
        'options' => ['image' => $product_info->product_image,
                      'product_quantity' => $product_info->product_quantity
        ]]);  

         return Redirect::to('/show-cart');                       
    }

    public function update_cart(Request $request)
    {
        
        $cart_rowids = $request->cart_rowid; 
        $qtys = $request->qty;
        foreach ($cart_rowids as $index => $cart_rowid) {
                $rowId = $cart_rowid;
                $qty = $qtys[$index];
                Cart::update($rowId, $qty);
        }
        
        return Redirect::to('/show-cart');                       
    }


    public function show_cart()
    {
        $cart_view= view('pages.cart_view');
        
        return view('master')
                ->with('content',$cart_view);
    } 

    public function remove_from_cart($rowId)
    {
        Cart::remove($rowId);
         return Redirect::to('/show-cart'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
