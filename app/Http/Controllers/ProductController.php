<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;

class ProductController extends Controller
{
    public function AuthLogin()
    {
        // $admin_id = Session::get('admin_id');
        $admin_id = Auth::id();
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function add_product()
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id', 'desc')->get();
        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }

    public function all_product()
    {
        $this->AuthLogin();

        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->orderby('tbl_product.product_id', 'desc')->get();
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('/admin_layout')->with('admin.all_product', $manager_product);
    }

    public function save_product(Request $request)
    {
        $this->AuthLogin();

        $data = array();
        $data['product_name'] = $request->input('product_name');
        $data['product_price'] = $request->input('product_price');
        $data['product_desc'] = $request->input('product_desc');
        $data['product_content'] = $request->input('product_content');
        $data['category_id'] = $request->input('product_cate');
        $data['brand_id'] = $request->input('product_brand');
        $data['product_status'] = $request->input('product_status');
        $data['product_qty'] = $request->input('product_qty');
        $data['product_sold'] = 0;

        $get_image = $request->file('product_image'); // use $request->file() instead of file()

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $new_image = current(explode('.', $get_name_image));

            $new_image = $new_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image); // use public_path() instead of 'public/'
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công!');
            return Redirect::to('all-product');
        }
        $data['product_image'] = '';        
        DB::table('tbl_product')->insert($data);
        Session::flash('message', 'Thêm sản phẩm thành công!'); // use flash() instead of put()
        return redirect()->to('all-product');
    }


    public function unactive_product($product_id)
    {
        $this->AuthLogin();

        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
        Session::put('message', 'Kích hoạt thương hiệu thành công!');
        return Redirect::to('all-product');
    }


    public function active_product($product_id)
    {
        $this->AuthLogin();

        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
        Session::put('message', 'Không kích hoạt thương hiệu thành công!');
        return Redirect::to('all-product');
    }

    public function edit_product($product_id)
    {
        $this->AuthLogin();

        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id', 'desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product)
            ->with('brand_product', $brand_product);
        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }

    public function update_product(Request $request, $product_id)
    {
        $this->AuthLogin();

        $data = array();
        $data['product_name'] = $request->input('product_name');
        $data['product_price'] = $request->input('product_price');
        $data['product_desc'] = $request->input('product_desc');
        $data['product_content'] = $request->input('product_content');
        $data['category_id'] = $request->input('product_cate');
        $data['brand_id'] = $request->input('product_brand');
        $data['product_status'] = $request->input('product_status');
        $data['product_qty'] = $request->input('product_qty');

        $get_image = $request->file('product_image');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $new_image = current(explode('.', $get_name_image));

            $new_image = $new_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image); // use public_path() instead of 'public/'
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công!');
            return Redirect::to('all-product');
        }

        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công!');
        return Redirect::to('all-product');
    }

    public function delete_product($product_id)
    {
        $this->AuthLogin();

        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công!');
        return Redirect::to('all-product');
    }

    //end admin page
    public function details_product($product_id)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderby('category_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderby('brand_id', 'asc')->get();
        $details_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_product.product_id', $product_id)->get();

        return view('pages.sanpham.show_details')->with('category', $cate_product)->with('brand', $brand_product)->with('product_details', $details_product);
    }

    public function tim_kiem_product(Request $request)
    {
        $keywords = $request->keywords_submit;
        if ($keywords) {
            $search_product = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_brand.brand_name', 'tbl_category_product.category_name')
                ->where('tbl_product.product_name', 'like', '%' . $keywords . '%')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->distinct()
                ->get();
            return view('admin.search_product')->with('search_product', $search_product)->with('keywords', $keywords);
        } else {
            return Redirect::to('all-product');
        }
    }

    public function tim_kiem_nang_cao_product(Request $request)
    {
        $category_words = $request->category_submit;
        $brand_words = $request->brand_submit;
        $price_words = $request->price_submit;

        if (is_null($category_words) && is_null($brand_words) && is_null($price_words)) {
            $search_product = DB::table('tbl_product')->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->distinct()
                ->get();
        } elseif (is_null($category_words) && !is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {
                $search_product = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                    ->orderby('product_price', 'ASC')
                    ->distinct()
                    ->get();
            } else {
                $search_product = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                    ->orderby('product_price', 'DESC')
                    ->distinct()
                    ->get();
            }
        } elseif (!is_null($category_words) && is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {

                $search_product = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->orderby('product_price', 'ASC')
                    ->distinct()
                    ->get();
            } else {
                $search_product = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->orderby('product_price', 'DESC')
                    ->distinct()
                    ->get();
            }
        } elseif (!is_null($category_words) && !is_null($brand_words) && is_null($price_words)) {
            $search_product = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')

                ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                ->distinct()
                ->get();
        } elseif (!is_null($category_words) && !is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {
                $search_product = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                    ->orderby('product_price', 'ASC')
                    ->distinct()
                    ->get();
            } else {
                $search_product = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')

                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                    ->orderby('product_price', 'DESC')

                    ->distinct()
                    ->get();
            }
        } elseif (!is_null($category_words) && is_null($brand_words) && is_null($price_words)) {
            $search_product = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                ->distinct()
                ->get();
        } elseif (is_null($category_words) && !is_null($brand_words) && is_null($price_words)) {

            $search_product = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                ->distinct()
                ->get();
        } elseif (is_null($category_words) && is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {
                $search_product = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->distinct()
                    ->orderby('product_price', 'ASC')
                    ->get();
            } else {
                $search_product = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->distinct()
                    ->orderby('product_price', 'DESC')
                    ->get();
            }
        }

        return view('admin.search_product')
            ->with('search_product', $search_product)
            ->with('category_words', $category_words)
            ->with('brand_words', $brand_words)
            ->with('price_words', $price_words);
    }

    // inventory
    public function all_product_inventory()
    {
        // $this->AuthLogin();
        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->orderby('tbl_product.product_id', 'desc')->get();
        $manager_product = view('inventory.all_product')->with('all_product', $all_product);
        return view('/inventory_layout')->with('inventory.all_product', $manager_product);
    }

    public function add_product_inventory()
    {
        // $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id', 'desc')->get();
        return view('inventory.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }
    
    public function save_product_inventory(Request $request)
    {
        $this->AuthLogin();

        $data = array();
        $data['product_name'] = $request->input('product_name');
        $data['product_price'] = $request->input('product_price');
        $data['product_desc'] = $request->input('product_desc');
        $data['product_content'] = $request->input('product_content');
        $data['category_id'] = $request->input('product_cate');
        $data['brand_id'] = $request->input('product_brand');
        $data['product_status'] = $request->input('product_status');
        $data['product_qty'] = $request->input('product_qty');
        $data['product_sold'] = 0;

        $get_image = $request->file('product_image'); // use $request->file() instead of file()

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $new_image = current(explode('.', $get_name_image));

            $new_image = $new_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image); // use public_path() instead of 'public/'
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công!');
            return Redirect::to('all-product-inventory');
        }
        $data['product_image'] = '';

        DB::table('tbl_product')->insert($data);
        Session::flash('message', 'Thêm sản phẩm thành công!'); // use flash() instead of put()
        return redirect()->to('all-product-inventory');
    }

    public function unactive_product_inventory($product_id)
    {
        // $this->AuthLogin();

        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
        Session::put('message', 'Kích hoạt thương hiệu thành công!');
        return Redirect::to('all-product-inventory');
    }


    public function active_product_inventory($product_id)
    {
        // $this->AuthLogin();

        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
        Session::put('message', 'Không kích hoạt thương hiệu thành công!');
        return Redirect::to('all-product-inventory');
    }

    public function edit_product_inventory($product_id)
    {
        // $this->AuthLogin();

        $cate_product = DB::table('tbl_category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id', 'desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('inventory.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product)
            ->with('brand_product', $brand_product);
        return view('inventory_layout')->with('inventory.edit_product', $manager_product);
    }

    public function update_product_inventory(Request $request, $product_id)
    {
        // $this->AuthLogin();

        $data = array();
        $data['product_name'] = $request->input('product_name');
        $data['product_price'] = $request->input('product_price');
        $data['product_desc'] = $request->input('product_desc');
        $data['product_content'] = $request->input('product_content');
        $data['category_id'] = $request->input('product_cate');
        $data['brand_id'] = $request->input('product_brand');
        $data['product_status'] = $request->input('product_status');
        $data['product_qty'] = $request->input('product_qty');

        $get_image = $request->file('product_image');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $new_image = current(explode('.', $get_name_image));

            $new_image = $new_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image); // use public_path() instead of 'public/'
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công!');
            return Redirect::to('all-product-inventory');
        }

        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công!');
        return Redirect::to('all-product-inventory');
    }

    public function delete_product_inventory($product_id)
    {
        // $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công!');
        return Redirect::to('all-product-inventory');
    }

    public function tim_kiem_product_inventory(Request $request)
    {
        $keywords = $request->keywords_submit;
        if ($keywords) {
            $search_product = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_brand.brand_name', 'tbl_category_product.category_name')
                ->where('tbl_product.product_name', 'like', '%' . $keywords . '%')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->distinct()
                ->get();
            return view('inventory.search_product')->with('search_product', $search_product)->with('keywords', $keywords);
        } else {
            return Redirect::to('all-product-inventory');
        }
    }

    public function tim_kiem_nang_cao_product_inventory(Request $request)
    {
        $category_words = $request->category_submit;
        $brand_words = $request->brand_submit;
        $price_words = $request->price_submit;

        if (is_null($category_words) && is_null($brand_words) && is_null($price_words)) {
            $search_product = DB::table('tbl_product')->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->distinct()
                ->get();
        } elseif (is_null($category_words) && !is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {
                $search_product = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                    ->orderby('product_price', 'ASC')
                    ->distinct()
                    ->get();
            } else {
                $search_product = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                    ->orderby('product_price', 'DESC')
                    ->distinct()
                    ->get();
            }
        } elseif (!is_null($category_words) && is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {

                $search_product = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->orderby('product_price', 'ASC')
                    ->distinct()
                    ->get();
            } else {
                $search_product = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->orderby('product_price', 'DESC')
                    ->distinct()
                    ->get();
            }
        } elseif (!is_null($category_words) && !is_null($brand_words) && is_null($price_words)) {
            $search_product = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')

                ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                ->distinct()
                ->get();
        } elseif (!is_null($category_words) && !is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {
                $search_product = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                    ->orderby('product_price', 'ASC')
                    ->distinct()
                    ->get();
            } else {
                $search_product = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')

                    ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                    ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                    ->orderby('product_price', 'DESC')

                    ->distinct()
                    ->get();
            }
        } elseif (!is_null($category_words) && is_null($brand_words) && is_null($price_words)) {
            $search_product = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_category_product.category_id', 'like', '%' . $category_words . '%')
                ->distinct()
                ->get();
        } elseif (is_null($category_words) && !is_null($brand_words) && is_null($price_words)) {

            $search_product = DB::table('tbl_product')
                ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                ->where('tbl_brand.brand_id', 'like', '%' . $brand_words . '%')
                ->distinct()
                ->get();
        } elseif (is_null($category_words) && is_null($brand_words) && !is_null($price_words)) {
            if ($price_words == 1) {
                $search_product = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->distinct()
                    ->orderby('product_price', 'ASC')
                    ->get();
            } else {
                $search_product = DB::table('tbl_product')
                    ->select('tbl_product.*', 'tbl_brand.*', 'tbl_category_product.*')
                    ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
                    ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
                    ->distinct()
                    ->orderby('product_price', 'DESC')
                    ->get();
            }
        }

        return view('inventory.search_product')
            ->with('search_product', $search_product)
            ->with('category_words', $category_words)
            ->with('brand_words', $brand_words)
            ->with('price_words', $price_words);
    }
}
