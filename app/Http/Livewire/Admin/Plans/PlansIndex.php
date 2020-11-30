<?php

namespace App\Http\Livewire\Admin\Plans;

use App\Models\Models\Plan;
use Livewire\Component;
use Livewire\WithPagination;

class PlansIndex extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.admin.plans.plans-index',[
            'plans' => Plan::select('name','price','url')->latest()->paginate(5)
        ]);
    }
}
