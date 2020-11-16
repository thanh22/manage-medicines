<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate(10);
		if ($request->key) {
			$users = User::where('name','LIKE','%'.$request->key.'%')->paginate(10);
		}
        return view('backend.user.index',compact('users'));
    }

    public function add()
    {
        return view('backend.user.add');
    }

    public function post_add(Request $request)
    {
        
        $this->validate($request,[
            'name'              => 'required',
            'phone'             => 'required',
            'email'             => 'required|email|unique:users',
            'password'          => 'required',
            'confirm_password'  => 'required|same:password'
        ],[
            'name.required'                 => 'Tên không được để trống',
            'email.required'                => 'Email không được để trống',
            'phone.required'                => 'Số điện thoại không được để trống',
            'password.required'             => 'Mật khẩu không được để trống',
            'confirm_password.required'     => 'Xác nhận mật khẩu không được để trống',
            'email'                         => 'Địa chỉ email không hợp lệ',
            'same'                          => 'Xác nhận mật khẩu không khớp',
            'unique'                        => 'Email đã tồn tại'
        ]);

        $password = bcrypt($request->password);
        $request->merge(['password'=>$password]);
        User::create($request->all());
        return redirect()->route('admin.user.index')->with('ok','Thêm mới người dùng thành công!');
    }    

    public function addRole($id)
    {
        $user = User::find($id);
        $role = Role::all();
        return view('backend.user.addRole',compact('user','role'));
    }

    public function post_addRole($id,Request $request)
    {
        
        foreach ($request->role_id as $key => $value) {
            $role = Role::find($value);
            $user = User::find($id);
            $user->assignRole($role);
        }

        return redirect()->route('admin.user.index')->with('ok','Add role successfully');
    }

    public function addPermission($id)
    {
        $user = User::find($id);
        $per  = Permission::all();
        return view('backend.user.addPermission',compact('user','per'));
    }
    public function post_addPermission(Request $request, $id)
    {
        foreach($request->permission_id as $key => $value)
        {
            $per  = Permission::find($value); 
            $user = User::find($id);
            $user->givePermissionTo($per);
        }

        return redirect()->route('admin.user.index')->with('ok','Add permission successfully');

    }

    public function getPer($id)
    {
        $user = User::find($id);
        // $permissions = $user->getAllPermissions();// tất các quyền
        $perLive = $user->getDirectPermissions();//quyền trục tiếp
        $perRole = $user->getPermissionsViaRoles();//quyền qua role
        // dd($perRole);

        return view('backend.user.getPer',compact('user','perLive','perRole'));
    }

    public function getRole($id)
    {
        $user = User::find($id);
        $listRole = $user->roles;
        // dd($user->roles);
        return view('backend.user.getRole',compact('listRole','user'));
    }

    public function edit($id)
    {
        $model = User::find($id);
        return view('backend.user.edit',compact('model'));
    }

    public function post_edit(Request $request,$id)
    {
        $this->validate($request,[
            'name'              => 'required',
            'phone'             => 'required',
            'email'             => 'required|email'
        ],[
            'name.required'                 => 'Tên không được để trống',
            'email.required'                => 'Email không được để trống',
            'phone.required'                => 'Số điện thoại không được để trống',
            'email'                         => 'Địa chỉ email không hợp lệ'
        ]);
        
        $request->offsetUnset('_token');
        User::where('id',$id)->update($request->all());
        return Redirect()->route('admin.user.index')->with('ok','Cập nhật thông tin người dùng thành công!');
    } 

    public function edit_pass($id)
    {
        $model = User::find($id);
        return view('backend.user.edit_pass',compact('model'));
    }

    public function post_edit_pass(Request $request,$id)
    {
        $this->validate($request,[
            'password'          => 'required',
            'confirm_password'  => 'required|same:password'
        ],[
            'password.required'             => 'Mật khẩu không được để trống',
            'confirm_password.required'     => 'Xác nhận mật khẩu không được để trống',
            'same'                          => 'Xác nhận mật khẩu không khớp',
        ]);

        $password = bcrypt($request->password);
        $user = User::find($id);
        $user->password = $password;
        $user->save();
        return Redirect()->route('admin.user.index')->with('ok','Cập nhật mật khẩu mới thành công!');
    } 

    public function delete($id)
    {
        if (Auth::user()->id != $id) {
			User::find($id)->delete();
			return redirect()->route('admin.user.index')->with('ok','Xóa người dùng thành công!');
		}else{
			return redirect()->route('admin.user.index')->with('error','Xóa người dùng không thành công');
		}
    }

    public function del_per($id_per,$id_user)
    {
        $user = User::find($id_user);
        $per = Permission::find($id_per);
        $user->revokePermissionTo($per);
        return redirect()->back()->with('ok','Delete permission successfully');
    }

    public function del_role($id,$id_user)
    {
        $user = User::find($id_user);
        $role = Role::find($id);
        if ($user->removeRole($role)) {
            return redirect()->back()->with('ok','Delete role successfully');
        }
        

        return redirect()->back()->with('error','Delete role not successfully');
    }
}
