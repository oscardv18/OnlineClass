<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminPost extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('title', 'like', '%' . $this->search . '%')
            ->where('team_id', '=', Auth::user()->currentTeam->id)
            ->paginate(10);
        $users = User::all();
        return view('livewire.posts.admin-post', compact('posts', 'users'));
    }
}
