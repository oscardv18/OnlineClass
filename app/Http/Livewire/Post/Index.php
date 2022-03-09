<?php

namespace App\Http\Livewire\Post;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $posts = DB::table('posts')
            ->orderBy('id', 'desc')
            ->where('user_id', '=', Auth::user()->id)
            ->where('team_id', '=', Auth::user()->currentTeam->id)
            ->paginate(10);

        return view('livewire.post.index', compact('posts'));
    }
}
