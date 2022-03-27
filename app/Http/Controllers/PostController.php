<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Post;
use App\Models\User;
use App\Models\PostType;
use App\Models\Evaluation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Mail\PostCreatedNotificationMailable;
use App\Mail\PostUpdateNotificationMailable;

class PostController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')
            ->where('team_id', '=', Auth::user()->currentTeam->id)
            ->get();

        $users = User::all();
        return view('components.posts.index', compact('posts', 'users'));
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
        $eval_duration = date('Y-m-d H:i:s');
        $eval_duration = $request->input('duration');

        # Creacion del post dentro de la DB usando Eloquent para este trabajo
        Post::create([
            'title' => $title,
            'description' => $description,
            'content' => $content,
            'user_id' => Auth::user()->id,
            'post_type_id' => $post_type_id,
            'team_id' => Auth::user()->currentTeam->id,
            'duration' => $eval_duration,
        ]);

        # Obtencion del post id para asignarlo a la tabla files para saber a que post pertenecen cada archivo
        $post_id = DB::table('posts')->orderBy('id', 'desc')->first();

        # Creación de los registro de los archivos en la tabla files

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = $file->getClientOriginalName();
                $fileExtension = $file->getClientOriginalExtension();
                $path = Storage::putFileAs('posts', $file, $fileName);

                File::create([
                    'name_file' => $fileName,
                    'extension' => $fileExtension,
                    'file_path' => $path,
                    'post_id' => $post_id->id,
                ]);
            }
        }

        # Send mail for notificate to the members
        $members = Auth::user()->currentTeam->allUsers();

        foreach ($members as $member) {
            $mail = new PostCreatedNotificationMailable(
                Auth::user()->currentTeam->name,
                $post_id->title,
                $post_id->description);
            Mail::to($member->email)->send($mail);
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
    public function show(Post $post)
    {
        $this->authorize('view', $post);

        $files = File::where('post_id', '=', $post->id)->get();
        $evaluations = Evaluation::where('post_id', '=', $post->id)->get();
        $postId = $post->id;
        $post = Post::where('id', '=', $post->id)->get();
        $post_type = PostType::all();
        $wtf = [];

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
        return view('components.posts.show', compact('post', 'wtf', 'files', 'evaluations', 'postId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $postToEdit = DB::table('posts')->where('id', '=', $post->id)->get();
        $post_files = DB::table('files')->where('post_id', '=', $post->id)->get();

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
        $eval_duration = date('Y-m-d H:i:s');
        $eval_duration = $request->input('duration');

        $post->update([
            'title' => $title,
            'description' => $description,
            'content' => $content,
            'user_id' => Auth::user()->id,
            'post_type_id' => $post_type_id,
            'team_id' => Auth::user()->currentTeam->id,
            'duration' => $eval_duration,
        ]);

        # Send mail for notificate to the members
        $members = Auth::user()->currentTeam->allUsers();

        foreach ($members as $member) {
            $mail = new PostUpdateNotificationMailable();
            Mail::to($member->email)->send($mail);
        }

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
