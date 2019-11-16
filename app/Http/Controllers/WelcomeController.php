<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latest_product= view('pages.latest_product');
        $slider= view('pages.slider');
        $popular_product= view('pages.popular_product');
        $testimonial= view('pages.testimonial');
        $blog= view('pages.blog');
        $banner= view('pages.banner');
        $support= view('pages.support');
        $promo= view('pages.promo');
        
        return view('master')
                ->with('content',$latest_product)
                ->with('slider',$slider)
                ->with('testimonial',$testimonial)
                ->with('blog',$blog)
                ->with('banner',$banner)
                ->with('support',$support)
                ->with('promo',$promo)
                ->with('popular_product',$popular_product);
    }

    public function contact_us()
    {
        $contact_us= view('pages.contact_us');
        
        
        return view('master')
                ->with('content',$contact_us);
                
    }

     public function category_product($category_id)
    {
        $category_product_info = DB::table('tbl_product')
                                 ->join('tbl_category','tbl_product.category_id','=','tbl_category.id')
                                 ->select('tbl_product.*','tbl_category.category_name')
                                 ->where('category_id',$category_id)
                                 ->where('tbl_product.publication_status',1)
                                 ->get();

        $category_product_page= view('pages.category_product')->with('category_product_info',$category_product_info);
        
        
        return view('master')
                ->with('cat_content',$category_product_page);
                
    }

    public function product_details($product_id)
    {
        $product_info = DB::table('tbl_product')
                                 ->join('tbl_manufacturer','tbl_product.manufacturer_id','=','tbl_manufacturer.id')
                                 ->join('tbl_category','tbl_product.category_id','=','tbl_category.id')
                                 ->select('tbl_product.*','tbl_manufacturer.manufacturer_name','tbl_category.category_name')
                                 ->where('tbl_product.id',$product_id)
                                 ->where('tbl_product.publication_status',1)
                                 ->first();
        $product_details= view('pages.product_details')
                                ->with('product_info',$product_info);
        
        
        return view('master')
                ->with('content',$product_details);
                
    }

    public function login_customer(Request $request)
    {
        // $this->validate(request(), [
        //     'email_address' => 'required|max:255'
        // ]);
        $first_name= $request->first_name;
        $password= $request->password;
        
        $category_info = DB::table('tbl_customer')
                     ->select('*')
                     ->where('first_name',$first_name)
                     ->where('password',$password)
                     ->first();
        if($category_info){
            Session::put('customer_id',$category_info->customer_id);     
            Session::put('customer_name',$category_info->first_name);
            $json = array( "type" => 'done', "name" => 'nn'); 
        }else{
            Session::put('exception','User Id or Pasword Invalid');
            $json = array('type' => 'fail');  
        }             
             
        echo json_encode($json);
         //return Redirect::to('/');   
    }

    public function register()
    {
          $customer_registration= view('pages.register');
        
        return view('master')
                ->with('register',$customer_registration);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
