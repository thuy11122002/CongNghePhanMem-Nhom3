<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Roles;
use App\Models\Roles as ModelsRoles;
use App\Admin;
use App\Models\Admin as ModelsAdmin;
use Session;
use Auth;
use DB;

class UserController extends Controller

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

    public function index(){
        $admin = ModelsAdmin::with('roles')->orderBy('admin_id', 'DESC')->paginate(5);
        return view('admin.users.all_users')->with(compact('admin'));
    }

    public function assign_roles(Request $request){
        // $data = $request->all();
        
        if(Auth::id() == $request->admin_id){
            return redirect()->back()->with('message', 'Không thể gán quyền cho user đang hoạt động hiện tại!');  
        }

        $user = ModelsAdmin::where('admin_email',$request->admin_email)->first();
        $user->roles()->detach();
        if($request->author_role){
           $user->roles()->attach(ModelsRoles::where('name','author')->first());     
        }
        if($request->user_role){
           $user->roles()->attach(ModelsRoles::where('name','user')->first());     
        }
        if($request->admin_role){
           $user->roles()->attach(ModelsRoles::where('name','admin')->first());     
        }
        // return redirect()->back()->with('message', 'Cấp quyền thành công!'); 
        return Redirect::to('users')->with('message', 'Cấp quyền thành công!');
 
    }

    public function add_users(){
        return view('admin.users.add_users');
    }

    public function store_users(Request $request){
        $data = $request->all();
        $admin = new ModelsAdmin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->save();
        $admin->roles()->attach(ModelsRoles::where('name','user')->first());
        Session::put('message','Thêm users thành công');
        return Redirect::to('users');
    }

    public function delete_user_roles($admin_id){
        if(Auth::id() == $admin_id){
            return redirect()->back()->with('message', 'Không thể xóa user đang hoạt động hiện tại!');  
        }
        $admin = ModelsAdmin::find($admin_id);
        if($admin){
            $admin->roles()->detach();
            $admin->delete();
        }
        return redirect()->back()->with('message', 'Xóa user thành công!');  
    }

    public function search(Request $request)
    {

        $keywords = $request->keywords_submit;
        if ($keywords) {
            $search_admin = DB::table('tbl_amin')->where('admin_name', 'like', '%' . $keywords . '%')
                ->orWhere('admin_email', 'like', '%' . $keywords . '%')
                ->orWhere('admin_phone', 'like', '%' . $keywords . '%')
                ->get();

            $admin_ids = $search_admin->pluck('admin_id');
            $admin = ModelsAdmin::with('roles')->whereIn('admin_id', $admin_ids)->paginate(5);

            return view('admin.users.search_user')->with('search_admin', $search_admin)->with('keywords', $keywords)
                ->with(compact('admin'));
        } else {
            return Redirect::to('users');
        }
    }

   

}
