<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Show extends Component
{
    public $files, $path;

    public function mout($fil) {
        $this->files = $fil;
    }

    public function downloadFile() {
        return Storage::disk('public')->download($this->path);
    }

    public function render()
    {
        return view('livewire.post.show');
    }
}
