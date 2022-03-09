<div>
    <button data-bs-toggle="modal" data-bs-target="#modal-form"
        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
            class="fas fa-arrow-up" data-bs-toggle="tooltip" data-bs-placement="top" title="Calificar"
            data-container="body" data-animation="true"></i></button>
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h3 class="font-weight-bolder text-info text-gradient">Califica la Evaluación</h3>
                            <p class="mb-0">Ingrese los datos solicitados</p>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent='ratingStudent' role="form text-left">
                                <label>Puntos Totales</label>
                                <div class="input-group mb-3">
                                    <input required type="number" class="form-control" placeholder="Total" wire:model.defer='rating'>
                                </div>
                                <label>Puntaje Máximo</label>
                                <div class="input-group mb-3">
                                    <input required type="number" class="form-control" placeholder="Máximo" wire:model.defer='max_rating'>
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Calificar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
