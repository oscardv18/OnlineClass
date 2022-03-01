<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Show extends Component
{
    public $files;

    public function mout($fil) {
        $this->files = $fil;
    }

    public function downloadFile($file_name) {
        $theFile = storage_path("app/posts/$file_name");
        return response()->download($theFile);
    }

    public function render()
    {
        return view('livewire.post.show');
    }
}
