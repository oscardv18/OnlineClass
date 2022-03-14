<?php

namespace App\Http\Livewire\Institutes;

use App\Models\InstituteData;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SearchInstitute extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->where('rol_id', '=', 1)
            ->paginate(10);

        $rifs = InstituteData::all();
        return view('livewire.institutes.search-institute', compact('users', 'rifs'));
    }
}
