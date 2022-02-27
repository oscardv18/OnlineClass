<?php

namespace App\Http\Livewire\Post;

use Carbon\Carbon;
use App\Models\Post;
use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(6)->get();

        return view('livewire.post.create', compact('posts'));
    }
}
