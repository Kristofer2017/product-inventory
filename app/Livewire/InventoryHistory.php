<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\InventoryMovement;

class InventoryHistory extends Component
{
    public $searchMovement = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    protected $listeners = ['inventoryUpdated' => '$refresh', 'productUpdated' => '$refresh'];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $movements = InventoryMovement::with('product')
            ->when($this->searchMovement, function ($query) {
                $query->whereHas('product', function ($q) {
                    $q->where('nombre', 'like', '%' . $this->searchMovement . '%');
                })->orWhere('reason', 'like', '%' . $this->searchMovement . '%')
                  ->orWhere('reference_number', 'like', '%' . $this->searchMovement . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->get();

        return view('livewire.inventory-history', ['movements' => $movements]);
    }
}