<x-layouts.app>
    <section class="h-100-vh mb-8">
        <div class="page-header align-items-start section-height-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('../assets/img/curved-images/curved14.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">{{ __('Buscar Tu intitutción!') }}</h1>
                        <p class="text-lead text-white">
                            {{ __('Con este Buscador en Tiempo Real podrás encontrar tu lugar de estudio') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @livewire('institutes.search-institute')
    </section>
</x-layouts.app>
