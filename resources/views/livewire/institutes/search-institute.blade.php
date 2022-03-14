<div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        {{-- <div class="col-xl-4 col-lg-5 col-md-7 mx-auto w-3/6"> --}}
        <div class="card z-index-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card mb-4 mx-4">
                            <div class="card-header pb-0">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative mb-4">
                                                <span class="input-group-text"><i
                                                        class="ni ni-zoom-split-in"></i></span>
                                                <input class="form-control form-control-alternative"
                                                    placeholder="Search" type="text" wire:model="search">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                        <h5 class="mb-0">Todas las userituciones Registradas en
                                            nuestra Plataforma
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    ID
                                                </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Nombre
                                                </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Creado
                                                </th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    RIF
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td class="ps-4">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $user->id }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <a
                                                            href="{{ route('institute.inst-dash', ['account' => $user->name]) }}" target="_blank">
                                                            <p class="text-xs font-weight-bold mb-0">
                                                                {{ $user->name }}</p>
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $user->created_at }}
                                                        </p>
                                                    </td>
                                                    @foreach ($rifs as $r)
                                                        @if ($r->user_id === $user->id)
                                                            <td class="text-center">
                                                                <p class="text-xs font-weight-bold mb-0">
                                                                    {{ $r->rif }}
                                                                </p>
                                                            </td>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="mx-4 my-2">
                                        {{ $users->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}
    </div>
</div>
