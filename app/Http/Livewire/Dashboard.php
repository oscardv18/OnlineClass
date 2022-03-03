<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\PostType;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public function render()
    {
        $posts = Post::orderBy('updated_at', 'desc')->where('user_id', '=', Auth::user()->id)->take(6)->get();
        $posttype = PostType::all();

        return view('livewire.dashboard', compact('posts', 'posttype'));
    }
}
