<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Blog;
use App\Category;
use App\User;

class BlogController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){

        $categories = Category::all();

        return view('blog.create',[
            'categories' => $categories
        ]);
    }

    public function store(Request $request){
        $user = \Auth::user();
        $blog = new Blog();

		$validate = $this->validate($request, [
			'title' => 'required',
			'content' => 'required',
			'category' => 'required',
			'image_path'  => 'required|image'
		]);
        
        $blog->user_id = $user->id;
        $blog->category_id = $request->input('category');
		$blog->title = $request->input('title');
		$blog->content = $request->input('content');
		
		$image_path = $request->file('image_path');
		
		
		// Subir fichero
		if($image_path){
			$image_path_name = time().$image_path->getClientOriginalName();
			Storage::disk('images')->put($image_path_name, File::get($image_path));
			$blog->image_path = $image_path_name;
		}
		
		$blog->save();
		
		return redirect()->route('home')->with([
			'message' => 'La foto ha sido subida correctamente!!'
		]);


    }
}
