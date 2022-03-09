<?php

namespace App\Http\Livewire\Posts;

use App\Models\Evaluation;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class FileUpload extends Component
{
    use WithFileUploads;

    public $files = [], $identificator;
    public $post_id;

    public function mount($post)
    {
        $this->post_id = $post->id;
        $this->identificator = rand();
    }

    public function saveFile($post_id)
    {
        foreach ($this->files as $file) {
            $fileName = $file->getClientOriginalName();
            $path = Storage::putFileAs('posts', $file, $fileName);

            Evaluation::create([
                'path' => $path,
                'name' => $fileName,
                'post_id' => $post_id,
                'user_id' => Auth::user()->id,
            ]);
        }
    }

    public function uploadFile()
    {
        $this->validate([
            'files.*' => 'max:6049',
        ]);

        $this->saveFile($this->post_id);
        $this->reset(['files', 'identificator', 'post_id']);
        $this->emitTo('show', 'render');
    }

    public function render()
    {
        return view('livewire.posts.file-upload');
    }
}
