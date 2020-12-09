<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use App\model\backend\Product;
class NewsController extends Controller
{
     public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_news(){
        $this->AuthLogin();
        $dsuser = DB::table('admin')->get();
        return view('admin.add_news')->with('dsuser',$dsuser);
    }
    public function all_news(){
        $this->AuthLogin();
    	$all_news = DB::table('news')->get();
        $dsuser = DB::table('admin')->get();
        
    	$manager_news  = view('admin.all_news')->with('dsuser',$dsuser)->with('all_news',$all_news);
    	return view('admin.admin_layout',compact('dsuser'))->with('admin.all_news', $manager_news);

    }
    public function save_news(Request $request){
         $this->AuthLogin();
    	$data = array();
        $this->validate($request,
                [
                    'subject'=>'required',
                    'slug'=>'required',
                    'content'=>'required',
                ],
                [
                    'subject.required'=>'Vui lòng nhập tên danh mục',
                    'slug.required'=>'Vui lòng nhập slug',
                    'content.required'=>"Vui lòng nhập mô tả",  
                ]);

    	$data['subject'] = $request->subject;
        $data['slug'] = $request->slug;
        $data['content'] = $request->content;
    	$data['admin_id'] = Session::get('id');
        $get_image = $request->file('image');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move(public_path('uploads/new'),$new_image);
            $data['image'] = $new_image;
            DB::table('news')->insert($data);
            Session::put('message','Thêm tin tức thành công');
            return Redirect::to('add-news');
        }
        DB::table('news')->insert($data);
    	Session::put('message','Thêm tin tức thành công');
    	return Redirect::to('add-news');
    }
    public function edit_product($id){
         $this->AuthLogin();
        $cate_product = DB::table('category_product')->orderby('id','desc')->get(); 
        $brand_product = DB::table('brand_product')->orderby('id','desc')->get(); 
        $edit_product = DB::table('product')->where('id',$id)->get();
        $dsuser = DB::table('admin')->get();
        $manager_product  = view('admin.edit_product')->with('edit_product',$edit_product)
        ->with('cate_product',$cate_product)->with('brand_product',$brand_product)->with('dsuser',$dsuser);
        return view('admin.admin_layout',compact('dsuser'))->with('admin.edit_product', $manager_product);
    }
    public function update_product(Request $request,$id){
         $this->AuthLogin();
        $data = array();
       $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $data['mota'] = $request->mota;
        $data['price'] = $request->price;
        $data['count'] = $request->count;
        $data['color'] = $request->color;
        $data['chatlieu'] = $request->chatlieu;
        $data['ngandung'] = $request->ngandung;
        $data['size'] = $request->size;
        $data['baohanh'] = $request->baohanh;
        $data['weight'] = $request->weight;
        $data['taitrong'] = $request->taitrong;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['status'] = $request->product_status;
        $get_image = $request->file('image');
        
        if($get_image){
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move(public_path('uploads/product'),$new_image);
                    $data['image'] = $new_image;
                    DB::table('product')->where('id',$id)->update($data);
                    Session::put('message','Cập nhật sản phẩm thành công');
                    return Redirect::to('all-product');
        }
            
        DB::table('product')->where('id',$id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function delete_news($id){
        $this->AuthLogin();
        DB::table('news')->where('id',$id)->delete();
        Session::put('message','Xóa tin tức thành công');
        return Redirect::to('all-news');
    }
    public function detail_product($id){
        $this->AuthLogin();
        $detail = Product::where('id',$id)->first();
        $dsuser = DB::table('admin')->get();
        $manager_detail_product  = view('admin.detail_product')->with('detail',$detail)->with('dsuser',$dsuser);
        return view('admin.admin_layout',compact('dsuser'))->with('admin.detail_product', $manager_detail_product);

    }
}
