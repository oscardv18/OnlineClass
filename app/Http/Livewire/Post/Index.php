<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $posts = DB::table('posts')->orderBy('id', 'desc')->paginate(10);
        return view('livewire.post.index', compact('posts'));
    }
}
