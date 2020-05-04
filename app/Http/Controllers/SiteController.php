<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Feedback;
use App\Doctor;
use App\Services\SendTelegramService;

class SiteController extends Controller
{
    public function home() 
    {
        $doctors = Doctor::all();

        return view('home',compact('doctors')); //['doctors' => $doctors] <=> compact('doctors') 
    }

    public function services()
    {
        return view('services');
    }

    public function news()
    {
        // Model methods Model::get() hammasini = massiv
        //Model::get = massiv qaytaradi
        //Model::paginate() = massiv
        //Model::first()
        // $posts = Post::orderBy('id', 'DESC')->paginate(2);
        $posts = Post::latest()->paginate(2);
        $links = $posts->links();
        
        return view('news', compact('posts', 'links'));
    }

    public function newsMore($id)
    {
        $post = Post::findOrFail($id);
        $post->increment('views');
        // dd($post);

        $most_viewed = Post::mostViews()->get();

        return view('news-more', [
            'post' => $post,
            'most_posts' => $most_viewed
        ]);
    }

    public function search(Request $request)
    {
        //SQL code:
        //SELECT * FROM `posts` 
        //WHERE `title` LIKE '%sar%' OR `short` LIKE '%sar%' OR `content` LIKE '%Sar%'
        $key = $request->get('key');
        $key = '%'.trim($key).'%';
        $results = Post::where('title', 'LIKE', $key)
                       ->orWhere('short', 'LIKE', $key)
                       ->orWhere('content', 'LIKE', $key)
                       ->paginate(10);
        // dd($results->toSql());
        $links = $results->links();

        return view('search', compact('results', 'links'));
    }
    
    public function contact()
    {
        return view('contact');
    }

    public function feedbackStore(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|',
            'subject' => 'required|min:10|max:128',
            'message' => 'required|max:2048'
        ]);
        
        Feedback::create([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'subject' => $request->post('subject'),
            'message' => $request->post('message')
        ]);
        
        return redirect()
                ->route('contact')
                ->with('success', 'Xabar uchun rahmat! Tez orada sizga javob qaytaramiz.');
    }

    public function makeAppointment(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'doctor' => 'required',
            'name' => 'required|min:3',
            'phone' => 'required|min:9|max:9'
        ]);
        //Formatting
        $message = 'Doktor: '.$data['doctor'].PHP_EOL;
        $message .= 'Sana: '.$data['date'].PHP_EOL;
        $message .= 'Ismi: '.$data['name'].PHP_EOL;
        $message .= 'Telefon: '.$data['phone'];

        //Save Feedback
        Feedback::create([
            'name' => $data['name'],
            'email' => $data['phone'],
            'subject' => 'Qabulga yozilish',
            'message' => $message
        ]);
        //Send to telegram bot
        SendTelegramService::send($message);

        return redirect()
                ->route('contact')
                ->with('success', 'Qabul qilindi. Sizga tez orada telefon qilamiz! Katta rahmat.');
    }

    public function switchLang($lang)
    {
        session()->put('lang', $lang);

        return redirect()->back();
    }
    
    public function test()
    {
        //$model = Post::findOrFail(4);

        //dd($model->category->name);

        //$category = \App\Category::findOrFail(3);

        //dd($category->posts);
        
        // $user = \App\User::find(1);
        // dd($user->roles);

        $role = \App\Role::find(2);
        dd($role->users);
    }

}
