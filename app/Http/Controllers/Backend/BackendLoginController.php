<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\model\Admin;
//use Faker\Provider\Image;
use App\model\student;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class BackendLoginController extends Controller
{

    private $_view = 'backend.backendLogin';


//   start Admin

    public function addAdmin()
    {
        return view($this->_view . '.addAdmin');
    }

    public function addAdminAction(Request $request)
    {
//        return $request->all();

        $this->validate($request, [
            'username' => 'required|min:4|unique:admins,username',
            'email' => 'required|unique:admins,email',
            'photo' => 'required',
            'password' => 'required|confirmed|min:4',
            'address' => 'required',
            'status' => 'required',
            'phone' => 'required|numeric'
        ]);

        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['status'] = $request->status;
        $data['password'] = bcrypt($request->password);


        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extention = strtolower($file->extension());

            $newName = time() . '_.' . $extention;

            Image::make($file)->resize(300, null, function ($ar) {
                $ar->aspectRatio();
            })->crop(200, 200)->save(public_path('uploads/AdminImage/' . $newName));

            $data['photo'] = $newName;

        }

        if (Admin::create($data)) {
            return redirect()->back()->with('success', 'Admin Added');
        }

        return redirect()->back()->with('fail', 'Error');
    }

    public function manageAdmin()
    {
        $data['item'] = Admin::all();
        return view($this->_view . '.manageAdmin', $data);
    }

    public function statusAdmin(Request $request)
    {
        $id = (int)$request->id;
        $data = Admin::find($id);
        if (isset($request->_enable)) {
            $data->status = 1;
        } else {
            $data->status = 0;
        }
        $data->save();

        return redirect()->back();
    }
//End Admin


//start student
    public function addStudent()
    {
        return view($this->_view . '.addStudent');
    }

    public function addStudentAction(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:4|unique:admins,username',
            'email' => 'required|unique:admins,email',
            'photo' => 'required',
            'password' => 'required|confirmed|min:4',
            'address' => 'required',
            'status' => 'required',
            'phone' => 'required|numeric'
        ]);

        $data['username'] = ucfirst($request->username);
        $data['email'] = $request->email;
        $data['address'] = ucfirst($request->address);
        $data['phone'] = $request->phone;
        $data['password'] = bcrypt($request->password);
        $data['status'] = $request->status;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = strtolower($file->extension());
            $newName = time() . '_.' . $extension;

            Image::make($file)->resize(300, null, function ($ar) {
                $ar->aspectRatio();
            })->crop(200, 200)->save(public_path('uploads/StudentImage/' . $newName));
            $data['photo'] = $newName;

        }

        if (student::create($data)) {
            return redirect()->back()->with('success', 'Student Added');
        }
        return redirect()->back()->with('fail', 'Failed');

    }

    public function manageStudent()
    {
        $data['item'] = student::all();
        return view($this->_view . '.manageStudent', $data);
    }

    public function viewStudent(Request $request)
    {
        $id = $request->id;
        $value['item'] = student::find($id);
        return view($this->_view . '.viewStudent', $value);
    }

    public function statusStudent(Request $request)
    {
        $id = (int)$request->id;
        $value = student::find($id);
        if (isset($request->_enable)) {
            $value->status = 1;
        } else {
            $value->status = 0;
        }
        $value->save();
        return redirect()->to('/@admin@/manageStudent')->with('success','status Updated');

    }


//    end student

////delete and manage Admin

    public function deleteAdmin(Request $request)
    {
        $id = (int)$request->id;
        if ($request->_delete) {

            Admin::findorfail($id)->delete();
            return redirect()->back();

        } elseif ($request->_update) {
            $data['item'] = Admin::find($id);
            return view($this->_view . '.updateAdmin', $data);
        }
    }

//    updateAdmin

    public function updateAdmin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:4|unique:admins,username',
            'email' => 'required|unique:admins,email',
            'address' => 'required',
            'phone' => 'required|numeric',
            'password' => 'required|confirmed',
            'photo' => 'required',
            'status' => 'required'
        ]);
        $data['username'] = ucfirst($request->username);
        $data['email'] = $request->email;
        $data['address'] = ucfirst($request->address);
        $data['phone'] = $request->phone;
        $data['password'] = bcrypt($request->password);
        $data['status'] = $request->status;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->extension();

            $newName = time() . '_.' . $extension;
            Image::make($file)->resize(300, null, function ($ar) {
                $ar->aspectRatio();
            })->crop(200, 200)->save(public_path('uploads/AdminImage/' . $newName));
            $data['photo']=$newName;
        }

        if (Admin::find($request['id'])->update($data)) {
            return redirect()->to('/@admin@/manageAdmin')->with('success', 'Updated');
        }
        return redirect()->to('/@admin@/manageAdmin')->with('fail', 'Not Updated');

    }


//    student delete

public function deleteStudent(Request $request){
        $id=(int)$request->id;
        student::findorfail($id)->delete();
        return redirect()->back();
}

}
