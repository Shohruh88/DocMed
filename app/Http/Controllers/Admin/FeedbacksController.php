<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feedback;

class FeedbacksController extends Controller
{
    public function index()
    {
        $page_size = env('ADMIN_PAGE_SIZE', 15);
        $items = Feedback::latest()->paginate($page_size);
        $links = $items->links();

        return view('admin.feedbacks.index', compact('items', 'links'));
    }

    public function show($id)
    {
        $item = Feedback::findOrFail($id);
        $item->update([
            'status' => Feedback::STATUS_READED
        ]);
        
        return view('admin.feedbacks.show', compact('item'));
    }

    public function delete($id)
    {
        $item = Feedback::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.feedbacks.index')->with('delete', 'Xabar o`chirldi!');
    }
}
