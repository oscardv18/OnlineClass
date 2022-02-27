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
            <ul class="list-group">
                @foreach ($files as $file)
                <li
                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                        <button
                            class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-up"></i></button>
                        <div class="d-flex flex-column">
                            <h6 class="mb-1 text-dark text-sm">{{ $file->name_file }}</h6>
                            <small class="" wire:model="path">{{ $file->file_path }}</small>
                            <span class="text-xs">{{ $file->created_at }}</span>
                        </div>
                    </div>
                    <div
                        class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                        <a href="#" wire:click="downloadFile">Descargar</a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
