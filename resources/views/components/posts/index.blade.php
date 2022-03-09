<x-layouts.app>
    <main class="main-content">
        <div class="container-fluid py-4">
            <div class="col-12 mt-4">
                <div class="card mb-4 bg-gradient-light">
                    <div class="card-body p-3">
                        <div class="row">
                            @foreach ($posts as $post)
                                <div class="col-xl-3 col-md-6 mb-xl-0 mb-6">
                                    <div class="card">
                                        <div class="card-body pt-2">
                                            <span
                                                class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">{{ Auth::user()->currentTeam->name }}</span>
                                            <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="card-title h5 d-block text-darker">
                                                {{ $post->title }}
                                            </a>
                                            <p class="card-description mb-4">
                                                {{ $post->description }}
                                            </p>
                                            <div class="author align-items-center">
                                                @foreach ($users as $user)
                                                    @if ($post->user_id === $user->id)
                                                        <img src="{{ $user->profile_photo_url }} alt=" ..."
                                                            class="avatar shadow">
                                                        <div class="name ps-3">
                                                            <span>{{ $user->name }}</span>
                                                            <div class="stats">
                                                                <small>{{ $post->created_at }}</small>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                <div class="card h-100 card-plain border-2 border-white">
                                    <div class="card-body d-flex flex-column justify-content-center text-center">
                                        <a href="{{ route('posts.create') }}">
                                            <i class="fa fa-plus text-white mb-3"></i>
                                            <h5 class=" text-white"> Nuevo Post </h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</x-layouts.app>
