<x-layouts.app>
    <main class="main-content">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-7 mt-4">
                    @foreach ($post as $pub)
                        <div class="card card-blog card-plain">
                            <div class="card-body px-0 pt-4">
                                <p
                                    class="text-gradient text-primary text-gradient font-weight-bold text-lg text-uppercase">
                                    {{ $wtf['name'] }}
                                    @if ($wtf['name'] === 'Evaluación')
                                        <span class="text-gradient text-info text-sm">- Culminación:
                                            {{ $pub->duration }}</span>
                                    @endif
                                </p>
                                <a href="javascript:;">
                                    <h4>
                                        {{ $pub->title }}
                                    </h4>
                                </a>
                                <p>
                                    {{ $pub->content }}
                                </p>
                            </div>
                            @if ($wtf['name'] === 'Evaluación')
                                @livewire('posts.file-upload', ['post' => $pub])
                            @endif
                        </div>
                    @endforeach
                </div>
                @livewire('post.show', ['fil' => $files, 'eval' => $evaluations, 'postType' => $wtf['name']])
            </div>
        </div>
    </main>
</x-layouts.app>
