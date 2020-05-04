<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Image;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_size = env('ADMIN_PAGE_SIZE', 15);
        $posts = Post::latest()
                     ->paginate($page_size);
        
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_list = $this->getAllCategory();

        return view('admin.posts.create', compact('category_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation rules
        $request->validate([
            'title_uz' => 'required',
            'short_uz' => 'required',
            'content_uz' => 'required',
            'title_ru' => 'required',
            'short_ru' => 'required',
            'content_ru' => 'required',
            'title_en' => 'required',
            'short_en' => 'required',
            'content_en' => 'required',
            'id_cat' => 'required',
            'picture' => 'required|file|mimes:jpeg,jpg,png'
        ]);        
        //Upload image to storage
        $img_name = $request->file('picture')->store('posts', ['disk' => 'public']);
        //Create thumbnail
        $full_path = storage_path('app/public/'.$img_name);
        $full_thumb_path = storage_path('app/public/thumbs/'.$img_name);
        $thumb = Image::make($full_path);

        //Proporsiya bilan qirqib olish
        // $thumb->resize(350, 350, function($constraint) {
        //     $constraint->aspectRatio();
        // })->save($full_thumb_path);
        //Kvadrat proporsiya
        $thumb->fit(350, 350, function($constraint){
            $constraint->aspectRatio();
        })->save($full_thumb_path);

        //Create post item
        Post::create([
            'title_uz' => $request->post('title_uz'),
            'short_uz' => $request->post('short_uz'),
            'content_uz' => $request->post('content_uz'),

            'title_ru' => $request->post('title_ru'),
            'short_ru' => $request->post('short_ru'),
            'content_ru' => $request->post('content_ru'),

            'title_en' => $request->post('title_en'),
            'short_en' => $request->post('short_en'),
            'content_en' => $request->post('content_en'),

            'img' => $img_name,
            'thumb' => 'thumbs/'.$img_name,
            'id_cat' => $request->post('id_cat')
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Item created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $category_list = $this->getAllCategory();

        return view('admin.posts.edit', compact('post', 'category_list'));
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
        $post = Post::findOrFail($id);
        
        $request->validate([
            'title_uz' => 'required',
            'short_uz' => 'required',
            'content_uz' => 'required',
            'title_ru' => 'required',
            'short_ru' => 'required',
            'content_ru' => 'required',
            'title_en' => 'required',
            'short_en' => 'required',
            'content_en' => 'required',
            
            'id_cat' => 'required'
        ]);
        
        if ($request->file('picture')) {
            //Delete old file
            Storage::disk('public')->delete([
                $post->img,
                $post->thumb
            ]);
            
            $img_name = $request->file('picture')->store('posts', ['disk' => 'public']);
            $thumb_name = 'thumbs/'.$img_name;
            //Create thumbnail
            $full_path = storage_path('app/public/'.$img_name);
            $full_thumb_path = storage_path('app/public/'.$thumb_name);
            $thumb = Image::make($full_path);

            // Proporsiya bilan qirqib olish
            $thumb->resize(350, 350, function($constraint) {
                $constraint->aspectRatio();
            })->save($full_thumb_path);
            
        }
        else {
            $img_name = $post->img;
            $thumb_name = $post->thumb;
        }

        $post->update([
            'title_uz' => $request->post('title_uz'),
            'short_uz' => $request->post('short_uz'),
            'content_uz' => $request->post('content_uz'),

            'title_ru' => $request->post('title_ru'),
            'short_ru' => $request->post('short_ru'),
            'content_ru' => $request->post('content_ru'),

            'title_en' => $request->post('title_en'),
            'short_en' => $request->post('short_en'),
            'content_en' => $request->post('content_en'),
            
            'img' => $img_name,
            'thumb' =>$thumb_name,
            'id_cat' => $request->post('id_cat')
        ]);

        return redirect()->route('admin.posts.index')->with(['success' => 'Item updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Post::findOrFail($id);

        $model->delete();

        return redirect()->route('admin.posts.index')->with('delete', 'Item deleted!');
    }

    private function getAllCategory()
    {
        return Category::all();
    }
}
