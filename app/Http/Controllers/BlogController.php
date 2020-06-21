<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use App\Category;
use App\Tag;
Use App\Comment;
use PhpParser\Node\Stmt\Foreach_;

class BlogController extends Controller
{
   
    public function index()
    {
        $data = Post::orderBy('created_at','desc')->get();
        $tag = Tag::get();
        $category = Category::get();
        return view('blog.index', ['posts' => $data,'category' => $category,'tag' => $tag]);
    
    }
    public function view($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $comments = Comment::where('post_id',$post->id)->get();
        $tag = Tag::get();
        $category = Category::get();
        return view('blog.view', ['post' => $post,'category' => $category,'tag' => $tag, 'comments' => $comments]);
    }
    public function list()
    {
        $data = Post::orderBy('created_at','desc')->paginate(8);
         
        $tag = Tag::get();
        $category = Category::get();
        return view('blog.list',['posts' => $data,'category' => $category,'tag' => $tag]);
    }
    public function list_category(category $category)
    {
        $data = $category->posts()->get();
        
        $tag = Tag::get();
        $category = Category::get();
        return view('blog.list',['posts' => $data,'category' => $category,'tag' => $tag]);
    }
    public function cari(Request $request)
    {
      
        $data = Post::
		where('judul','like',"%".$request->search."%")
		->paginate();
        
        $tag = Tag::get();
        $category = Category::get();
        return view('blog.list',['posts' => $data,'category' => $category,'tag' => $tag]);
    }
    public function comment(Request $request)
    {
        $request->validate([
            'pesan' => 'required',
            'nama' => 'required',
            'email' => 'required',
            
        ]);
        Comment::create([
            'pesan' => $request->pesan,
            'nama' => $request->nama,
            'email' => $request->email,
            'website' => $request->website,
            'post_id' => $request->id 
        ]);
        session()->flash('pesan', 'Data berhasil di tambahkan');
        return redirect()->back();
    }
}
