<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\PostType;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $posts = Post::orderBy('updated_at', 'desc')->take(6)->get();
        $posttype = PostType::all();

        return view('livewire.dashboard', compact('posts', 'posttype'));
    }
}
