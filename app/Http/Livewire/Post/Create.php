<?php

namespace App\Http\Livewire\Post;

use Carbon\Carbon;
use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public function render()
    {
        $posts = Post::orderBy('created_at', 'desc')
            ->take(6)
            ->where('user_id', '=', Auth::user()->id)
            ->where('team_id', '=', Auth::user()->currentTeam->id)
            ->get();

        return view('livewire.post.create', compact('posts'));
    }
}
