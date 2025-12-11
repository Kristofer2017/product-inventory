<?php

namespace App\Livewire\Productos;

use Livewire\Component;
use App\Models\Product;

class ShowProducts extends Component
{
    public $search = '';
    public $sortField = 'nombre';
    public $sortDirection = 'asc';
    protected $listeners = [
        'productCreated' => '$refresh', 
        'productUpdated' => '$refresh', 
        'productDeleted' => '$refresh'
    ];

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
        $products = Product::query()
            ->when($this->search, function ($query) {
                $query->where('nombre', 'like', '%' . $this->search . '%')
                    ->orWhere('descripcion', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->get();

        return view('livewire.productos.show-products', ['products' => $products]);
    }
}
