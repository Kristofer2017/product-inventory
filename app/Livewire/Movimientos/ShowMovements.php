<?php

namespace App\Livewire\Movimientos;

use Livewire\Component;
use App\Models\InventoryMovement;

class ShowMovements extends Component
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
        $query = InventoryMovement::with('product')
            ->when($this->searchMovement, function ($query) {
                $query->whereHas('product', function ($q) {
                    $q->where('nombre', 'like', '%' . $this->searchMovement . '%');
                })->orWhere('reason', 'like', '%' . $this->searchMovement . '%')
                    ->orWhere('reference_number', 'like', '%' . $this->searchMovement . '%');
            });

        // Aplicar ordenamiento
        if ($this->sortField === 'producto') {
            $query->join('products', 'inventory_movements.product_id', '=', 'products.id')
                ->select('inventory_movements.*')
                ->orderBy('products.nombre', $this->sortDirection);
        } else {
            $query->orderBy($this->sortField, $this->sortDirection);
        }

        $movements = $query->get();

        return view('livewire.movimientos.show-movements', ['movements' => $movements]);
    }
}