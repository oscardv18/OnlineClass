<x-layouts.app>
    <main class="main-content">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-7 mt-4">
                    @foreach ($post as $pub)
                        <div class="card card-blog card-plain">
                            <div class="card-body px-0 pt-4">
                                <p
                                    class="text-gradient text-primary text-gradient font-weight-bold text-sm text-uppercase">
                                    {{ $wtf['name'] }}
                                </p>
                                <a href="javascript:;">
                                    <h4>
                                        {{ $pub->title }}
                                    </h4>
                                </a>
                                <p>
                                    {{ $pub->content }}
                                </p>
                                <button type="button" class="btn bg-gradient-primary mt-3">Editar Publicación</button>
                            </div>
                        </div>
                    @endforeach
                </div>
                @livewire('post.show', ['files' => $files]);
            </div>
        </div>
    </main>
</x-layouts.app>
