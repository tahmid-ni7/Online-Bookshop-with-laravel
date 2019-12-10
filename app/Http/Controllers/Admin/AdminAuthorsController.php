<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Photo;

class AdminAuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::with('image')->orderBy('id', 'DESC')->get();
        return view('admin.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
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
            'name' => 'required',
            'slug' => 'required|unique:authors',
            'bio'  => 'required',
            'image_id'=> 'image|max:500'
        ];
        $message = [
            'image_id.image' => 'Image should be PNG, jpg, jpeg type'
        ];
        $this->validate($request, $rules, $message);

        $input = $request->all();
        if($file = $request->file('image_id'))
        {
            $name = time().$file->getClientOriginalName();

            $image_resize = Photo::make($file->getRealPath());
            $image_resize->resize(150,150);
            $image_resize->save(public_path('assets/img/' .$name));

            $image = Image::create(['file'=>$name]);
            $input['image_id'] = $image->id;
        }

        $create_author = Author::create($input);
        return redirect('/admin/authors')
            ->with('success_message', 'Author created successfully');


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
        $author = Author::findOrFail($id);
        return view('admin.author.edit', compact('author'));
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
            'name' => 'required',
            'slug' => 'required|unique:authors,slug,'.$id,
            'bio'  => 'required',
            'image_id'=> 'image|max:500'
        ];
        $message = [
            'image_id.image' => 'Image should be PNG, jpg, jpeg type'
        ];
        $this->validate($request, $rules, $message);

        $input = $request->all();
        if($file = $request->file('image_id'))
        {
            $name = time().$file->getClientOriginalName();

            $image_resize = Photo::make($file->getRealPath());
            $image_resize->resize(150,150);
            $image_resize->save(public_path('assets/img/' .$name));

            $image = Image::create(['file'=>$name]);
            $input['image_id'] = $image->id;
        }

        $author = Author::findOrFail($id);
        $author->update($input);
        return redirect('/admin/authors')
            ->with('success_message', 'Author updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);

        if(! is_null($author->image_id))
        {
            unlink(public_path().'/assets/img/'.$author->image->file);
        }
        $author->image()->delete();
        $author->books()->delete();
        $author->delete();

        return redirect()->back()
            ->with('alert_message', "Author deleted successfully.");
    }
}
