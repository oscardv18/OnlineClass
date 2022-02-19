<div>
    <!-- Teams Dropdown -->
    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
    <x-jet-dropdown id="teamManagementDropdown">
        <x-slot name="trigger">
            <span class="d-sm-inline d-none">
                {{ Auth::user()->currentTeam->name }}
            </span>

            <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </x-slot>

        <x-slot name="content">
            <!-- Team Management -->
            <h6 class="dropdown-header">
                {{ __('Administrar Teams') }}
            </h6>

            <!-- Team Settings -->
            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                {{ __('Configuración') }}
            </x-jet-dropdown-link>

            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
            <x-jet-dropdown-link href="{{ route('teams.create') }}">
                {{ __('Crear Team') }}
            </x-jet-dropdown-link>
            @endcan

            <hr class="dropdown-divider">

            <!-- Team Switcher -->
            <h6 class="dropdown-header">
                {{ __('Cambiar Team') }}
            </h6>

            @foreach (Auth::user()->allTeams() as $team)
            <x-jet-switchable-team :team="$team" />
            @endforeach
        </x-slot>
    </x-jet-dropdown>
    @endif
</div>
