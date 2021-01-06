<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DataTables extends Component
{
    use WithPagination;

    public $active = true;

    public function render()
    {
        return view('livewire.data-tables', [
            'users' => User::where('active', $this->active)->paginate(6),
        ]);
    }

    public function paginationView()
    {
        return 'vendor.livewire.tailwind';
    }
}
