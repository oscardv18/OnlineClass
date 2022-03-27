@component('mail::message')
    {{ __('Se ha Creado una nueva Publicación en: ', ['team' => $teamName]) }}
    {{ __("Título:  ", ['title' => $postTitle]) }}
    {{ __("Descripción:  ", ['description' => $postDescription]) }}

    @component('mail::button', ['url' => route('home')])
        {{ __('Ir') }}
    @endcomponent
@endcomponent
