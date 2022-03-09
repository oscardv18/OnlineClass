<div class="col-md-5 mt-4">
    <div class="card h-100 mb-4">
        <div class="card-header pb-0 px-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="mb-0">Menú de Archivos</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                    <i class="far fa-calendar-alt me-2"></i>
                    <small>23 - 30 March 2020</small>
                </div>
            </div>
        </div>
        <div class="card-body pt-4 p-3">
            <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Recursos del Post</h6>
            <i class="ni ni-button-play"></i>
            <ul class="list-group">
                @foreach ($files as $file)
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">{{ $file->name_file }}</h6>
                                <span class="text-xs">{{ $file->created_at }}</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                            <button type="button" class="btn bg-outline-success"
                                wire:click="downloadFile('{{ $file->name_file }}')">Descargar</button>
                        </div>
                    </li>
                @endforeach
                <hr>
            </ul>
            <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Evaluaciones de los Estudiantes</h6>
            <ul class="list-group">
                @foreach ($evals as $e)
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            @if (Auth::user()->rol_id < 3)
                                @livewire('posts.rating-test', ['postId' => $e->post_id, 'userId' => $e->user_id,
                                'evalId' => $e->id], key($e->id))
                            @endif
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">{{ $e->name }}</h6>
                                <span class="text-xs">{{ $e->created_at }}</span>
                                @foreach ($users as $user)
                                    @if ($e->user_id === $user->id)
                                        <span class="text-xs">{{ $user->name }}</span>
                                    @endif
                                @endforeach
                                @foreach ($ratings as $rating)
                                    @if ($e->id === $rating->evaluation_id)
                                        @if ($rating->rating < 10 or $rating->rating < 5)
                                            <span class="text-xs text-danger">{{ $rating->rating }}/{{ $rating->max_rating }}</span>
                                        @else
                                            <span class="text-xs text-info">{{ $rating->rating }}/{{ $rating->max_rating }}</span>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                            <button type="button" class="btn bg-outline-success"
                                wire:click="downloadFile('{{ $e->name }}')">Descargar</button>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
