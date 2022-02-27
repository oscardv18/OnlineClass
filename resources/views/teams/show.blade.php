<x-layouts.app>
    <main class="main-content">
        <div class="container-fluid py-4">
            <x-slot name="header">
                <h2 class="h4 font-weight-bold">
                    {{ __('Team Settings') }}
                </h2>
            </x-slot>

            <div>
                @livewire('teams.update-team-name-form', ['team' => $team])

                @livewire('teams.team-member-manager', ['team' => $team])

                @if (Gate::check('delete', $team) && ! $team->personal_team)
                <x-jet-section-border />

                <div>
                    @livewire('teams.delete-team-form', ['team' => $team])
                </div>
                @endif
            </div>
        </div>
    </main>
</x-layouts.app>
