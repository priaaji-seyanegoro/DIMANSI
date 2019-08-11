<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Konten;
use File;

class KontenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $kontens = Konten::all();
        return view ('konten.index',compact('kontens','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::all();
        return view ('konten.create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'     => 'required|min:5',
            'content'   => 'required',
            'category'   => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048'
        ]);

        $konten = new Konten;
        $konten->title = $request->title;
        $konten->slug = str_slug($konten->title);
        $konten->content = $request->content;
        $konten->category_id = $request->category;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $file->move($destinationPath , $fileName);
            $konten->image = $fileName;
        }

        $konten->save();

        return redirect()->route('konten.index')->withInfo('Konten Baru Berhasil Ditambah');
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
        $konten = Konten::find($id);
        File::delete('images/'.$konten->image);
        $konten->delete();
        
        
        return back()->withInfo('Post Berhasil Di Hapus');
    }
}
