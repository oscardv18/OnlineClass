<?php

namespace App\Http\Livewire\Post;

use App\Models\Rating;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Show extends Component
{
    public $files, $evals;

    protected $listeners = ['render'];

    public function mout($fil, $eval) {
        $this->files = $fil;
        $this->evals - $eval;
    }

    public function downloadFile($file_name) {
        $theFile = storage_path("app/posts/$file_name");
        return response()->download($theFile);
    }

    public function render()
    {
        $users = User::all();
        $ratings = Rating::all();
        return view('livewire.post.show', compact('users', 'ratings'));
    }
}
