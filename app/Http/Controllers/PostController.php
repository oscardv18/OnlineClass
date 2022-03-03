<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Post;
use App\Models\PostType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->where('user_id', '=', Auth::user()->id)->get();
        return view('components.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        # Asignando cada valor de cada campo del formulario a una variable de este metodo
        $title = $request->input('title');
        $description = $request->input('description');
        $content = $request->input('content');
        $post_type_id = $request->input('post_type_id');

        # Uso de el Query Buildder de laravel para obtener el id del team actual, pero este debe coincidir con el numero de id del usuario actual del team
        $team_id = DB::table('teams')->select('id')
            ->where('id', '=', Auth::user()->id)
            ->value('id');

        # Creacion del post dentro de la DB usando Eloquent para este trabajo
        Post::create([
            'title' => $title,
            'description' => $description,
            'content' => $content,
            'user_id' => Auth::user()->id,
            'post_type_id' => $post_type_id,
            'team_id' => $team_id,
        ]);

        # Obtencion del post id para asignarlo a la tabla files para saber a que post pertenecen cada archivo
        $post_id = DB::table('posts')->orderBy('id', 'desc')->first();

        # Creación de los registro de los archivos en la tabla files

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = $file->getClientOriginalName();
                $fileExtension = $file->getClientOriginalExtension();
                $path = Storage::putFileAs('posts', $file, $fileName);
                // $url = Storage::url($path);

                File::create([
                    'name_file' => $fileName,
                    'extension' => $fileExtension,
                    'file_path' => $path,
                    'post_id' => $post_id->id,
                ]);
            }
        }

        # Retorno a la ruta de create que maneja el metodo homónimo
        return back()->with('status', 'Publicación Creada Correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', '=', $id)->get();
        $post_type = PostType::all();
        $wtf = [];

        $files = File::where('post_id', '=', $id)->get();

        foreach ($post_type as $type) {
            foreach ($post as $p) {
                if ($p->post_type_id == $type->id) {
                    $wtf = [
                        'id' => $p->post_type_id,
                        'name' => $type->name_type
                    ];
                }
            }
        }

        return view('components.posts.show', compact('post', 'wtf', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postToEdit = DB::table('posts')->where('id', '=', $id)->get();
        $post_files = DB::table('files')->where('post_id', '=', $id)->get();

        return view('components.posts.edit', compact('postToEdit', 'post_files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        # Asignando cada valor de cada campo del formulario a una variable de este metodo
        $title = $request->input('title');
        $description = $request->input('description');
        $content = $request->input('content');
        $post_type_id = $request->input('post_type_id');

        # Uso de el Query Buildder de laravel para obtener el id del team actual, pero este debe coincidir con el numero de id del usuario actual del team
        $team_id = DB::table('teams')->select('id')
            ->where('id', '=', Auth::user()->id)
            ->value('id');

        $post->update([
            'title' => $title,
            'description' => $description,
            'content' => $content,
            'user_id' => Auth::user()->id,
            'post_type_id' => $post_type_id,
            'team_id' => $team_id,
        ]);

        return back()->with('status', 'Publicación actualizada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('status', 'Publicación eliminada correctamente');
    }
}
