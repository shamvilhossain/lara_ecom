<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic as Image;
use DB;
use Session;
session_start();

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        
    }

    public function index()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id==null){
            return Redirect::to('/adda')->send();
        }
        $dashboard = view('admin.pages.dashboard_content');
        return view('admin.admin_master')
                ->with('main_content',$dashboard);
    } 

     public function add_category()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id==null){
            return Redirect::to('/adda')->send();
        }
        $add_category = view('admin.pages.add_category');
        //$add_category = view('admin.pages.add_coupon');
        return view('admin.admin_master')
                ->with('main_content',$add_category);
    } 

    public function edit_category($category_id)
    {

        $admin_id=Session::get('admin_id');
        if($admin_id==null){
            return Redirect::to('/adda')->send();
        }
        $category_info = DB::table('tbl_category')
                     ->select('*')
                     ->where('id',$category_id)
                     ->first();

        $edit_category = view('admin.pages.edit_category')->with('category_info',$category_info);
        return view('admin.admin_master')
                ->with('main_content',$edit_category);
       
    } 

    public function save_category(Request $request)
    {
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;
        DB::table('tbl_category')
            ->insert($data);
        Session::put('message','Category Successfully Saved!'); 
           
        return Redirect::to('/add-category');
    }

    public function update_category(Request $request)
    {
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;
        $category_id=$request->category_id;
        DB::table('tbl_category')
            ->where('id',$category_id)
            ->update($data);
        Session::put('message','Category Successfully Saved!'); 
           
        return Redirect::to('/manage-category');
    }  

     public function manage_category()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id==null){
            return Redirect::to('/adda')->send();
        }
        $category_info = DB::table('tbl_category')
                     ->select('*')
                     ->get();

        $manage_category = view('admin.pages.manage_category')->with('category_info',$category_info);
        return view('admin.admin_master')
                ->with('main_content',$manage_category);
    } 


    public function unpublish_category($category_id)
    {
       DB::table('tbl_category')
            ->where('id', $category_id)
            ->update(['publication_status' => 0]);
           
        return Redirect::to('/manage-category');
    } 

    public function publish_category($category_id)
    {
       DB::table('tbl_category')
            ->where('id', $category_id)
            ->update(['publication_status' => 1]);
           
        return Redirect::to('/manage-category');
    }

     public function delete_category($category_id)
    {
       DB::table('tbl_category')
            ->where('id', $category_id)
            ->delete();
           
        return Redirect::to('/manage-category');
    }

     public function add_coupon()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id==null){
            return Redirect::to('/adda')->send();
        }
       
        $add_coupon = view('admin.pages.add_coupon');
        return view('admin.admin_master')
                ->with('main_content',$add_coupon);
    } 

    public function save_coupon(Request $request)
    {
        $data=array();
        $data['coupon_code']=$request->name;
       
         DB::table('coupons')
            ->insert($data);
            return $data;
    }

     public function add_manufacturer()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id==null){
            return Redirect::to('/adda')->send();
        }
        $add_manufacturer = view('admin.pages.add_manufacturer');
        return view('admin.admin_master')
                ->with('main_content',$add_manufacturer);
    } 

    public function save_manufacturer(Request $request)
    {
        $data=array();
        $data['manufacturer_name']=$request->manufacturer_name;
        $data['manufacturer_description']=$request->manufacturer_description;
        $data['publication_status']=$request->publication_status;
        DB::table('tbl_manufacturer')
            ->insert($data);
        Session::put('message','Manufacturer Successfully Saved!'); 
           
        return Redirect::to('/add-manufacturer');
    }

      public function manage_manufacturer()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id==null){
            return Redirect::to('/adda')->send();
        }
        $manufacturer_info = DB::table('tbl_manufacturer')
                     ->select('*')
                     ->get();

        $manage_manufacturer = view('admin.pages.manage_manufacturer')->with('manufacturer_info',$manufacturer_info);
        return view('admin.admin_master')
                ->with('main_content',$manage_manufacturer);
    } 

    public function unpublish_manufacturer($manufacturer_id)
    {
       DB::table('tbl_manufacturer')
            ->where('id', $manufacturer_id)
            ->update(['publication_status' => 0]);
           
        return Redirect::to('/manage-manufacturer');
    } 


    public function publish_manufacturer($manufacturer_id)
    {
       DB::table('tbl_manufacturer')
            ->where('id', $manufacturer_id)
            ->update(['publication_status' => 1]);
           
        return Redirect::to('/manage-manufacturer');
    }

     public function delete_manufacturer($manufacturer_id)
    {
       DB::table('tbl_manufacturer')
            ->where('id', $manufacturer_id)
            ->delete();
           
        return Redirect::to('/manage-manufacturer');
    }
    public function edit_manufacturer($manufacturer_id)
    {

        $admin_id=Session::get('admin_id');
        if($admin_id==null){
            return Redirect::to('/adda')->send();
        }
        $manufacturer_info = DB::table('tbl_manufacturer')
                     ->select('*')
                     ->where('id',$manufacturer_id)
                     ->first();

        $edit_manufacturer = view('admin.pages.edit_manufacturer')->with('manufacturer_info',$manufacturer_info);
        return view('admin.admin_master')
                ->with('main_content',$edit_manufacturer);
       
    } 

    public function update_manufacturer(Request $request)
    {
        $data=array();
        $data['manufacturer_name']=$request->manufacturer_name;
        $data['manufacturer_description']=$request->manufacturer_description;
        $data['publication_status']=$request->publication_status;
        $manufacturer_id=$request->manufacturer_id;
        DB::table('tbl_manufacturer')
            ->where('id',$manufacturer_id)
            ->update($data);
        Session::put('message','Manufacturer Successfully Saved!'); 
           
        return Redirect::to('/manage-manufacturer');
    }  





    public function add_product()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id==null){
            return Redirect::to('/adda')->send();
        }

         $manufacturer_info = DB::table('tbl_manufacturer')
                     ->select('*')
                     ->where('publication_status',1)
                     ->get();

         $category_info = DB::table('tbl_category')
                     ->select('*')
                     ->where('publication_status',1)
                     ->get();            


        $add_product = view('admin.pages.add_product')
                            ->with('category_info',$category_info)
                            ->with('manufacturer_info',$manufacturer_info);
        return view('admin.admin_master')
                ->with('main_content',$add_product);
    } 


      public function save_product(Request $request)
    {
        $this->validate(request(), [
            'product_name' => 'required|max:255'
        ]);
        $data=array();
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['manufacturer_id']=$request->manufacturer_id;
        $data['product_price']=$request->product_price;
        $data['product_discount']=$request->product_discount;
        $data['product_quantity']=$request->product_quantity;
        $data['reorder_level']=$request->reorder_level;
        if($request->is_featured=='on'){
            $data['is_featured']=1;
        }else{
            $data['is_featured']=0;
        }

        if($request->is_featured=='on'){
            $data['is_sale']=1;
        }else{
            $data['is_sale']=0;
        }

        if($request->is_featured=='on'){
            $data['is_offer']=1;
        }else{
            $data['is_offer']=0;
        }
        
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_long_description;
        $data['publication_status']=$request->publication_status;
        $image_url = $this->product_image_upload($request->file('product_image'),250,300);
        $image_url_lg = $this->product_image_upload($request->file('product_image'),900,1024);
        $product_image_side_1 = $this->product_image_upload($request->file('product_image_side_1'),250,300);
        $product_image_side_1_lg = $this->product_image_upload($request->file('product_image_side_1'),900,1024);
        $product_image_side_2 = $this->product_image_upload($request->file('product_image_side_2'),250,300);
        $product_image_side_2_lg = $this->product_image_upload($request->file('product_image_side_2'),900,1024);
        $data['product_image'] = $image_url;
        $data['product_image_lg'] = $image_url_lg;
        $data['product_image_side_1'] = $product_image_side_1;
        $data['product_image_side_1_lg'] = $product_image_side_1_lg;
        $data['product_image_side_2'] = $product_image_side_2;
        $data['product_image_side_2_lg'] = $product_image_side_2_lg;
     
        DB::table('tbl_product')
            ->insert($data);
        Session::put('message','Product Successfully Saved!'); 
           
        return Redirect::to('/add-product');
    }

     private function product_image_upload($request,$width,$height){
        
            $image = $request;
            if($image){
                $image_name=str_random(20);
                $ext = strtolower($image->getClientOriginalExtension());
                if($ext!='jpg' && $ext!='png' && $ext!='gif'){
                    echo 'File Type is not valid';
                    exit();
                }else{
                    $image_full_name=$image_name.'.'.$ext;
                    $upoad_path= 'public/product_image/';
                    $image_url= $upoad_path.$image_full_name;

                    //$filename    = $image->getClientOriginalName();
                    $image_resize = Image::make($image->getRealPath());              
                    $image_resize->resize($width, $height);
                    //$success= $image_resize->save('public/product_image/'.$filename);
                    $success= $image_resize->save($image_url);
                    if($success){
                            return $image_url;
                    }else{
                            $errors= $image->getErrorMessage();
                    }
                }    
            }    
     }

        public function manage_product()
    {
        $admin_id=Session::get('admin_id');
        if($admin_id==null){
            return Redirect::to('/adda')->send();
        }
        $manage_product_info = DB::table('tbl_product')
                     ->select('*')
                     ->get();

        $manage_product = view('admin.pages.manage_product')->with('product_info',$manage_product_info);
        return view('admin.admin_master')
                ->with('main_content',$manage_product);
    } 

     public function unpublish_product($product_id)
    {
       DB::table('tbl_product')
            ->where('id', $product_id)
            ->update(['publication_status' => 0]);
           
        return Redirect::to('/manage-product');
    } 


    public function publish_product($product_id)
    {
       DB::table('tbl_product')
            ->where('id', $product_id)
            ->update(['publication_status' => 1]);
           
        return Redirect::to('/manage-product');
    }

     public function delete_product($product_id)
    {
        $product_image= DB::table('tbl_product')
            ->select('*')
            ->where('id', $product_id)
            ->first();
            
         $url=$product_image->product_image;
         if($url!=null){
            unlink($url);
         }
         

       DB::table('tbl_product')
            ->where('id', $product_id)
            ->delete();
           
        return Redirect::to('/manage-product');
    }


    public function edit_product($product_id)
    {

        $admin_id=Session::get('admin_id');
        if($admin_id==null){
            return Redirect::to('/adda')->send();
        }
        $manufacturer_info = DB::table('tbl_manufacturer')
                     ->select('*')
                     ->where('publication_status',1)
                     ->get();

        $category_info = DB::table('tbl_category')
                     ->select('*')
                     ->where('publication_status',1)
                     ->get();            


      
        $product_info = DB::table('tbl_product')
                     ->select('*')
                     ->where('id',$product_id)
                     ->first();

        $edit_product = view('admin.pages.edit_product')
                            ->with('product_info',$product_info)
                            ->with('category_info',$category_info)
                            ->with('manufacturer_info',$manufacturer_info);
        return view('admin.admin_master')
                ->with('main_content',$edit_product);
       
    }

    public function update_product(Request $request)
    {
        $data=array();
        $product_id=$request->product_id;
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['manufacturer_id']=$request->manufacturer_id;
        $data['product_price']=$request->product_price;
        $data['product_quantity']=$request->product_quantity;
        $data['reorder_level']=$request->reorder_level;
        if($request->is_featured=='on'){
            $data['is_featured']=1;
        }else{
            $data['is_featured']=0;
        }
        
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_long_description;
        $data['publication_status']=$request->publication_status;
        $image_url = $this->product_image_update($request);
        $data['product_image'] = $image_url;
     
         DB::table('tbl_product')
            ->where('id',$product_id)
            ->update($data);
        Session::put('message','Product Successfully Updated!'); 
           
        return Redirect::to('/add-product');
    }

    private function product_image_update($request){
        $image= $request->file('product_image');
        if($image){
            $image_name=str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            if($ext!='jpg' && $ext!='png' && $ext!='gif'){
                echo 'File Type is not valid';
                exit();
            }else{
                $image_full_name=$image_name.'.'.$ext;
                $upoad_path= 'public/product_image/';
                $image_url= $upoad_path.$image_full_name;
                $success= $image->move($upoad_path,$image_full_name);
                if($success){
                    $url=$request->product_image_url;
                         if($url!=null){
                            unlink($url);
                         }
                    return $image_url;
                }else{
                    $errors= $image->getErrorMessage();
                }
            }
        }else{
            $image_url=$request->product_image_url;
            return $image_url;
        }
     }


    public function logout()
    {
        Session::put('admin_id',null);
        Session::put('admin_name',null);
        Session::put('message','You are logout Successfully!');
        return Redirect::to('/adda');
        
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
