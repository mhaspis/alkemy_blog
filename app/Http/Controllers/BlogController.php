<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
		
		if($image_path){
			$image_path_name = time().$image_path->getClientOriginalName();
			Storage::disk('images')->put($image_path_name, File::get($image_path));
			$blog->image_path = $image_path_name;
		}
		
		$blog->save();
		
		return redirect()->route('blog.detail', ['id'=>$blog->id])->with([
			'message' => 'El blog se ha publicado correctamente!!'
		]);


    }

    public function detail($id){
        if(Blog::find($id) == null){
            return redirect()->route('home')->with([
                'message' => 'El blog no existe!!!'
            ]);
        }
        
        $blog = Blog::find($id);
        $category = Category::where('id', '=', $blog->category_id)->first();

        

		return view('blog.show',[
            'blog' => $blog,
            'category' => $category
		]);
    }
    
    public function getImage($image_path){      
        $image = Storage::disk('images')->get($image_path);
        
		return new Response($image, 200);
    }
    
    public function edit($id){
        $blog = Blog::find($id);
        if(!isset($blog)){
            return redirect()->route('home')->with([
                'message' => 'El blog no existe!!!'
            ]);
        }
        $categories = Category::all();

		return view('blog.edit',[
            'blog' => $blog,
            'categories' => $categories
		]);
    }

    public function update(Request $request, $id){
        $user = \Auth::user();
        $blog = Blog::find($id);

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
		
		if($image_path){
			$image_path_name = time().$image_path->getClientOriginalName();
			Storage::disk('images')->put($image_path_name, File::get($image_path));
			$blog->image_path = $image_path_name;
		}
		
		$blog->update();
		
		return redirect()->route('home')->with([
			'message' => 'El post se ha editado correctamente!!'
		]);


    }

    public function delete($id){
        $blog = Blog::find($id);

        if(!isset($blog)){

            return redirect()->route('home')->with([
                'message' => 'El blog no existe!!!'
            ]);
        }

    Blog::destroy($id);

    return redirect()->route('home')->with([
        'message' => 'El blog se eliminó con exito!!!'
    ]);

    }
}
