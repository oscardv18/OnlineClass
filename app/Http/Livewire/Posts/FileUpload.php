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

    public function uploadFile()
    {
        $this->validate([
            'files.*' => 'max:6049',
            'files' => 'required',
        ]);

        foreach ($this->files as $file) {
            $fileName = $file->getClientOriginalName();
            $path = Storage::putFileAs('posts', $file, $fileName);

            Evaluation::create([
                'path' => $path,
                'name' => $fileName,
                'post_id' => $this->post_id,
                'user_id' => Auth::user()->id,
            ]);
        }

        session()->flash('success', 'Evaluación entregada');
        return redirect()->route('posts.show', ['post' => $this->post_id]);
    }

    public function render()
    {
        return view('livewire.posts.file-upload');
    }
}
