<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Album; 

class AlbumsController extends Controller
{
    //
    //相册信息保存
    public function store(Request $request)
    {
        
        //数据验证
        $this->validate($request, [
            'name' => 'required|max:50',
        ]);

        //数据存储
       /* 
        $album = Album::create([
            'name' => $request->name,
            'intro' => $request->intro,
            'cover' => $request->cover,
        ]);
       */ 
        
        $album = new Album;
        $album->name = $request->name; 
        $album->intro = $request->rintro;
        $album->cover = $request->cover; 
        $album->save();
        //返回
        
        
        session()->flash('success', 'create successful');
        return back();
    }    // 

    public function show($id)
    {
        $album = Album::findOrFail($id); 


        return view('albums.show', compact('album'));

    }

    public function update(Request $request, $id) 
    {
        // 
        $this->validate($request, [
            'name' => 'required|max:50',
        ]);

        
        // update 
        $album = Album::findOrFail($id); 
        
        /*
        $album->update([
            'name' => $request->name,
            'intro' => $request->intro,
        ]);
        */
        $album->name = $request->name; 
        $album->intro = $request->intro;

        if ($request->hasFile('cover')) {
            //
            $cover_path = "img/album/covers/" . time() . ".jpg" ;
            Image::make($request->cover)->resize(355,200)->save(public_path($cover_path)); 
            // 
            $album->cover = $cover_path; 
        }
        $album->save(); 
        
        session()->flash('success', 'Edit successful'); 
        
        return back();
        
    }

    public function destroy($id) 
    {

        $album = Album::findOrFail($id); 
        $album->delete(); 

        session()->flash('success', 'Delete successful'); ;
        return redirect()->route('home'); 
    }
}
