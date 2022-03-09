<x-layouts.app>
    <main class="main-content">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-7 mt-4">
                    @if (session()->has('status'))
                        <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <span class="alert-text"><strong>Listo!</strong> {{ session()->get('status') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Editar Publicación</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            @foreach ($postToEdit as $post)
                                <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="title">Título</label>
                                        <input type="text" value="{{ $post->title }}"
                                            class="form-control @error('title') border border-danger rounded-3 @enderror"
                                            id="title" placeholder="Post Title" name="title">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Descripción</label>
                                        <input type="text" value="{{ $post->description }}"
                                            class="form-control @error('description') border border-danger rounded-3 @enderror"
                                            id="description" name="description" placeholder="Post Description">
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="post_type_id"
                                                id="information" value="1">
                                            <label class="custom-control-label"
                                                for="information">{{ __('Información') }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="post_type_id"
                                                id="evaluation" value="2">
                                            <label class="custom-control-label"
                                                for="evaluation">{{ __('Evaluación') }}</label>
                                        </div>
                                        @error('post_type_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Contenido</label>
                                        <textarea name="content"
                                            class="form-control @error('content') border border-danger rounded-3 @enderror"
                                            id="content" rows="3">{{ $post->content }}</textarea>
                                        @error('content')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- <label for="content">{{ __('Seleccione los archivos que desee eliminar') }}</label>
                                    @foreach ($post_files as $file)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $file->id }}"
                                                id="{{ $file->name_file }}" name="{{ $file->id }}">
                                            <label class="custom-control-label"
                                                for="{{ $file->name_file }}">{{ $file->name_file }}</label>
                                        </div>
                                    @endforeach --}}
                                    <div class="form-group">
                                        <label
                                            class="border-2 border-gray-200 p-3 w-full block rounded cursor-pointer my-2"
                                            for="customFile1" x-data="{ files: null }">
                                            <input type="file" class="sr-only" name="files[]" id="customFile1"
                                                multiple="true"
                                                x-on:change="files = Object.values($event.target.files)">
                                            <span
                                                x-text="files ? files.map(file => file.name).join(', ') : 'Elija los archivos que desee subir junto a la publicación...'"></span>
                                        </label>
                                    </div>
                                    <input type="submit" value="Crear" class="btn bg-gradient-info">
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
                @livewire('post.create')
            </div>
        </div>
    </main>
</x-layouts.app>
