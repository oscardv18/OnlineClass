<x-layouts.app>
    <main class="main-content">
        <div class="container-fluid py-4">
            <div class="col-12 mt-4">
                <div class="card mb-4">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-1">Publicaciones</h6>
                        <p class="text-sm">Todas mis publicaciones</p>
                    </div>
                    <div class="card-body p-3">
                        <div class="row">
                            @foreach ($posts as $post)
                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-6">
                                <div class="card card-blog card-plain">
                                    <div class="position-relative">
                                        <a class="d-block shadow-xl border-radius-xl">
                                            <img src="../assets/img/home-decor-1.jpg" alt="img-blur-shadow"
                                                class="img-fluid shadow border-radius-xl">
                                        </a>
                                    </div>
                                    <div class="card-body px-1 pb-0">
                                        <p class="text-gradient text-dark mb-2 text-sm">Publicación #{{ $post->id }}</p>
                                        <a href="javascript:;">
                                            <h5>
                                                {{ $post->title }}
                                            </h5>
                                        </a>
                                        <p class="mb-4 text-sm">
                                            {{ $post->description }}
                                        </p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <button type="button" class="btn bg-gradient-info">
                                                <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                                                    class="text-white">Ver más</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                <div class="card h-100 card-plain border">
                                    <div class="card-body d-flex flex-column justify-content-center text-center">
                                        <a href="{{ route('posts.create') }}">
                                            <i class="fa fa-plus text-secondary mb-3"></i>
                                            <h5 class=" text-secondary"> Nuevo Post </h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</x-layouts.app>
