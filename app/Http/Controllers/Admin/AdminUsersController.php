<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Photo;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed|min:6',
            'role_id'   => 'required',
            'image_id'  => 'image|max:500'
        ];
        $message = [
            'role_id.required' => "Role can't be empty ",
            'image_id.image'   => "Image format should be png, jpg, jpeg type."
        ];

        $this->validate($request, $rules, $message);

        $input = $request->all();
        if(trim($request->password == ''))
        {
            $input = $request->except('password');
        }
        else
        {
            $input['password'] = bcrypt($request->password);
        }
        if($file = $request->file('image_id'))
        {
            $name = time().$file->getClientOriginalName();

            $image_resize = Photo::make($file->getRealPath());
            $image_resize->resize(150,150);
            $image_resize->save(public_path('assets/img/' .$name));

            $image = Image::create(['file'=>$name]);
            $input['image_id'] = $image->id;
        }

        $create_user = User::create($input);
        return redirect('/admin/users')
            ->with('success_message', 'User created successfully');

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
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
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
        $rules = [
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email,'.$id,
            'password'  => 'confirmed',
            'role_id'   => 'required',
            'image_id'  => 'image|max:500'
        ];
        $message = [
            'role_id.required' => "Role can't be empty ",
            'image_id.image'   => "Image format should be png, jpg, jpeg type."
        ];

        $this->validate($request, $rules, $message);

        $input = $request->all();
        if(trim($request->password == ''))
        {
            $input = $request->except('password');
        }
        else
        {
            $input['password'] = bcrypt($request->password);
        }
        if($file = $request->file('image_id'))
        {
            $name = time().$file->getClientOriginalName();

            $image_resize = Photo::make($file->getRealPath());
            $image_resize->resize(150,150);
            $image_resize->save(public_path('assets/img/' .$name));

            $image = Image::create(['file'=>$name]);
            $input['image_id'] = $image->id;
        }

        $user = User::findOrFail($id);
        $user->update($input);
        return redirect('/admin/users')
            ->with('success_message', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        if(! is_null($user->image_id))
        {
            unlink(public_path().'/assets/img/'.$user->image->file);
        }
        $user->image()->delete();
        $user->orders()->delete();
        $user->reviews()->delete();
        $user->delete();
        return redirect()->back()
            ->with('alert_message', 'User deleted successfully');
    }
}
