<?php

namespace App\Http\Controllers;
use DB;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;

class CategoryProduct extends Controller
{
    public function AuthLogin(){
        // $admin_id = Session::get('admin_id');
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    
    public function add_category_product(){
        $this->AuthLogin();
        return view('/admin.add_category_product');
    }

    public function all_category_product(){
        $this->AuthLogin();

        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('/admin_layout')->with('admin.all_category_product', $manager_category_product);
    }

    
    public function save_category_product(Request $request){
        $this->AuthLogin();

        $data = array();
        $data['category_name'] = $request-> category_product_name;
        $data['category_desc'] = $request-> category_product_desc;
        $data['category_status'] = $request-> category_product_status;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công!');
        return Redirect::to('add-category-product');
    }

    public function unactive_category_product($category_product_id){
        $this->AuthLogin();

        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status' => 1]);
        Session::put('message', 'Kích hoạt thành công!');
        return Redirect::to('all-category-product'); 
    }


    public function active_category_product($category_product_id){
        $this->AuthLogin();

        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status' => 0]);
        Session::put('message', 'Không kích hoạt thành công!');
        return Redirect::to('all-category-product'); 
    }

    public function edit_category_product($category_product_id){
        $this->AuthLogin();

        $edit_category_product = DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }

    public function update_category_product(Request $request, $category_product_id){
        $this->AuthLogin();

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update($data);
        Session::put('message', 'Cập nhật thành công!');
        return Redirect::to('all-category-product'); 
    }

    public function delete_category_product($category_product_id){
        $this->AuthLogin();

        DB::table('tbl_category_product')->where('category_id', $category_product_id)->delete();
        Session::put('message', 'Xóa thành công!');
        return Redirect::to('all-category-product'); 
    }
    // end function admin page

    public function show_category_home($category_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();

        $category_by_id = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_product.category_id', '=', 'tbl_category_product.category_id')
        ->where('tbl_product.category_id', $category_id)->where('tbl_product.product_status', '1')->get();

        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id', $category_id)->limit(1)->get();



        return view('pages.category.show_category')->with('category', $cate_product)->with('brand', $brand_product)->with('category_by_id', $category_by_id)
        ->with('category_name', $category_name);
    }

    public function tim_kiem_category(Request $request)
    {

        $keywords = $request->keywords_submit;
        if ($keywords) {
            $search_category = DB::table('tbl_category_product')->where('category_name', 'like', '%' . $keywords . '%')
                ->get();
            // $admin_ids = $search_admin->pluck('admin_id');
            // $admin = ModelsAdmin::with('roles')->whereIn('admin_id', $admin_ids)->paginate(5);

            return view('admin.search_category_product')->with('search_category', $search_category)->with('keywords', $keywords);
                
        } else {
            return Redirect::to('all-category-product');
        }
    }



    // inventory
    public function all_category_product_inventory(){
        // $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('inventory.all_category_product')->with('all_category_product', $all_category_product);
        return view('/inventory_layout')->with('inventory.all_category_product', $manager_category_product);
    }

    public function add_category_product_inventory(){
        // $this->AuthLogin();
        return view('/inventory.add_category_product');
    }

    public function save_category_product_inventory(Request $request){
        // $this->AuthLogin();

        $data = array();
        $data['category_name'] = $request-> category_product_name;
        $data['category_desc'] = $request-> category_product_desc;
        $data['category_status'] = $request-> category_product_status;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công!');
        return Redirect::to('add-category-product-inventory');
    }

    public function unactive_category_product_inventory($category_product_id){
        // $this->AuthLogin();

        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status' => 1]);
        Session::put('message', 'Kích hoạt thành công!');
        return Redirect::to('all-category-product-inventory'); 
    }


    public function active_category_product_inventory($category_product_id){
        // $this->AuthLogin();

        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status' => 0]);
        Session::put('message', 'Không kích hoạt thành công!');
        return Redirect::to('all-category-product-inventory'); 
    }

    public function edit_category_product_inventory($category_product_id){
        // $this->AuthLogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();
        $manager_category_product = view('inventory.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('inventory_layout')->with('inventory.edit_category_product', $manager_category_product);
    }

    public function update_category_product_inventory(Request $request, $category_product_id){
        // $this->AuthLogin();

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update($data);
        Session::put('message', 'Cập nhật thành công!');
        return Redirect::to('all-category-product-inventory'); 
    }

    public function delete_category_product_inventory($category_product_id){
        // $this->AuthLogin();

        DB::table('tbl_category_product')->where('category_id', $category_product_id)->delete();
        Session::put('message', 'Xóa thành công!');
        return Redirect::to('all-category-product-inventory'); 
    }

    public function tim_kiem_category_inventory(Request $request)
    {
        $keywords = $request->keywords_submit;
        if ($keywords) {
            $search_category = DB::table('tbl_category_product')->where('category_name', 'like', '%' . $keywords . '%')
                ->get();
            // $admin_ids = $search_admin->pluck('admin_id');
            // $admin = ModelsAdmin::with('roles')->whereIn('admin_id', $admin_ids)->paginate(5);

            return view('inventory.search_category_product')->with('search_category', $search_category)->with('keywords', $keywords);
        } else {
            return Redirect::to('all-category-product-inventory');
        }
    }
}
