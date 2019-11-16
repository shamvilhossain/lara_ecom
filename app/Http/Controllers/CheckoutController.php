<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer_registration()
    {
          $customer_registration= view('pages.customer_registration');
        
        return view('master')
                ->with('checkout_view',$customer_registration);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_customer(Request $request)
    {
        
        $data=array();
        $data['first_name']= $request->first_name;
        $data['last_name']= $request->last_name;
        $data['email_address']= $request->email_address;
        $data['password']= $request->password;
        $data['mobile']= $request->mobile;
        $customer_id=   DB::table('tbl_customer')
            ->insertGetId($data);

        Session::put('customer_id',$customer_id);     
        Session::put('customer_name',$data['first_name']);     

        return Redirect::to('/payment');    
    }


     public function payment()
    {
          $customer_id=Session::get('customer_id');
          $customer_info = DB::table('tbl_customer')
                     ->select('*')
                     ->where('customer_id',$customer_id)
                     ->first();

          $billing_details= view('pages.billing_details')->with('customer_info',$customer_info);
        
        return view('master')
                ->with('billing_view',$billing_details);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function place_order(Request $request)
    {

        // shipping part start
        $data=array();
        $customer_id= $request->customer_id;
        $data['first_name']= $request->first_name;
        $data['last_name']= $request->last_name;
        $data['email_address']= $request->email_address;
        $data['mobile']= $request->mobile;
        $data['address']= $request->address;
        $data['country']= $request->country;
        $data['city']= $request->city;
        $data['zip_code']= $request->zip_code;
         DB::table('tbl_customer')
                     ->where('customer_id',$customer_id)
                     ->update($data);
   
        // shipping part end 

        //pament part
        $payment_type= $request->payment_type; 
        $data1['payment_type'] = $payment_type;

        $payment_id = DB::table('tbl_payment')
                            ->insertGetId($data1); 

        $odata=array();
        $odata['customer_id']=Session::get('customer_id');
        $odata['shipping_id']=Session::get('customer_id');
        $odata['payment_id']= $payment_id;
        $odata['order_total']= Session::get('grand_total');
        $order_id = DB::table('tbl_order')
                            ->insertGetId($odata);

        $contents=Cart::content();
        $oddata=array();
        foreach($contents as $v_content){

            $oddata['order_id']=$order_id;
            $oddata['product_id']=$v_content->id;
            $oddata['product_name']=$v_content->name;
            $oddata['product_price']=$v_content->price;
            $oddata['product_sales_quantity']=$v_content->qty;

            DB::table('tbl_order_details')
                            ->insert($oddata);
        }    
         
        if($payment_type=='paypal'){

            //send email
            return view('pages.htmlWebsiteStandardPayment');
        }  
        if($payment_type=='cash_on_delivery'){

            // send email
            Cart::destroy();
            return Redirect::to('/order-successfull');
        }     
       // return Redirect::to('/payment');
    }

     public function order_successfull()
    {
         $order_successfull= view('pages.order_successfull');
         return view('master')
                ->with('billing_view',$order_successfull);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function customer_logout()
    {
          Session::put('customer_id',null);
          Session::put('customer_name',null);
          return Redirect::to('/');
        
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
