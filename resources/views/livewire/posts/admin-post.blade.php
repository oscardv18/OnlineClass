<div class="main-content">
    <div class="container-fluid py-4">
        <div class="alert alert-secondary mx-4" role="alert">
            <span class="text-white">
                <strong>Crea, Edita, Elimina tus publicaciones!</strong> Dentro del Team actual </span>
        </div>
        <div class="row mx-3">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group input-group-alternative mb-4">
                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                        <input class="form-control form-control-alternative" placeholder="Search" type="text"
                            wire:model="search">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-3">
            @if (session()->has('status'))
                <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Listo!</strong> {{ session()->get('status') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Todas las Publicaciones</h5>
                            </div>
                            <a href="{{ route('posts.create') }}"
                                class="btn bg-gradient-primary flex flex-row items-center justify-center btn-sm mb-0"
                                type="button">+&nbsp;Crear</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Creador
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Título
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Creado
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Actualizado
                                        </th>
                                        {{-- @if (Auth::user()->id === $post->user_id) --}}
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Acción
                                        </th>
                                        {{-- @endif --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td class="ps-4">
                                                <p class="text-xs font-weight-bold mb-0">{{ $post->id }}</p>
                                            </td>
                                            {{-- <td>
                                            <div>
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                                <p class="text-xs font-weight-bold mb-0">{{ $post->user_id }}</p>
                                            </div>
                                        </td> --}}
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $post->user_id }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $post->title }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p class="text-xs font-weight-bold mb-0">{{ $post->created_at }}</p>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $post->updated_at }}</span>
                                            </td>
                                            @if (Auth::user()->id === $post->user_id)
                                                <td class="text-center">
                                                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}"
                                                        class="mx-3" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Editar post">
                                                        <i class="fas fa-user-edit text-secondary"></i>
                                                    </a>
                                                    <i class="cursor-pointer fas fa-trash text-secondary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modal-notification-{{ $post->id }}"></i>
                                                    <div class="modal fade"
                                                        id="modal-notification-{{ $post->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="modal-notification"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title"
                                                                        id="modal-title-notification">
                                                                        ¿Eliminar pub?</h6>
                                                                    <button type="button" class="btn-close text-black"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">x</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="py-3 text-center">
                                                                        <i class="ni ni-bell-55 ni-3x"></i>
                                                                        <h4 class="text-gradient text-danger mt-4">
                                                                            ¿Estás
                                                                            Seguro
                                                                            que deseas eliminar el Post?</h4>
                                                                        <p>
                                                                            ID: {{ $post->id }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form
                                                                        action="{{ route('posts.destroy', ['post' => $post->id]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Si,
                                                                            Eliminar</button>
                                                                        <button type="button"
                                                                            class="btn btn-secondary text-white ml-auto"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ __('Ninguna') }}</span>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mx-4 my-2">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
