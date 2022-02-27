<x-layouts.app>
    <main class="main-content">
        <div class="container-fluid py-4">
            <x-slot name="header">
                <h2 class="h4 font-weight-bold">
                    {{ __('Create Team') }}
                </h2>
            </x-slot>

            <div>
                @livewire('teams.create-team-form')
            </div>
        </div>
    </main>
</x-layouts.app>
