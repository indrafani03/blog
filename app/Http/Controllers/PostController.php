<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::paginate(7);
        return view('admin.post.index', ['posts' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $category = Category::all();
        return view('admin.post.post',['category' => $category, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     */
    public function store(Request $request)
    {

       
        $request->validate([
           'judul' => 'required',
           'category_id' => 'required',
           'content' => 'required',
           'gambar' => 'required',
       ]);
      
       $gambar = $request->gambar;
       $slug = Str::slug($request->judul);
       $new_gambar = time().$gambar->getClientOriginalName();

       $post = Post::create([
            'judul' => $request->judul,
            'slug'  => $slug,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => $new_gambar,
            'users_id' => Auth::id()
       ]);
       $post->tags()->attach($request->tags);

       $gambar->move('public/uploads/posts/', $new_gambar);

       session()->flash('pesan', 'Data berhasil di tambahkan');
       return redirect()->route('post.index');

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
        $category = Category::all();
        $post = Post::find($id);
        $tag = Tag::all();
        return view('admin.post.edit', ['post' => $post, 'category' => $category, 'tags' => $tag]);
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
        $request->validate([
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            
        ]);
       

       $post = Post::find($id);

       if($request->has('gambar')) {
        
        unlink(public_path('/uploads/posts/') . $post->gambar);
       $gambar = $request->gambar;
       $slug = Str::slug($request->judul);
       $new_gambar = time().$gambar->getClientOriginalName();
       $gambar->move('public/uploads/posts/', $new_gambar);
       $post_data = [
            'judul' => $request->judul,
            'slug'  => $slug,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => $new_gambar
       ];
       
       
       } else {
        $slug = Str::slug($request->judul);
        $post_data = [
            'judul' => $request->judul,
            'slug'  => $slug,
            'category_id' => $request->category_id,
            'content' => $request->content,
            
       ];  
       }

       $post->tags()->sync($request->tags);
       $post->update($post_data);

      

       session()->flash('pesan', 'Data berhasil di update');
       return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

    
    }
    public function hapus($id)
    {
        
        $post = Post::find($id);
        $post->delete();
        session()->flash('pesan', 'Data berhasil di hapus ada di tongsampah');
       return redirect()->route('post.index');
    }
    public function sampah()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.post.sampah', ['posts' => $posts]);
        
        return $posts;
                
    }
    public function restore($id)
    {
        
         $post = Post::onlyTrashed()->where('id', $id)->first();
         $post->restore();

        session()->flash('pesan', 'Data berhasil di hapus ada di restore');
        return redirect()->back();
    }

    


}
