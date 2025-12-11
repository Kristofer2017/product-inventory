<?php

namespace App\Livewire\Productos;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class DeleteProduct extends Component
{
    public $product;
    public $showModal = false;

    protected $listeners = ['confirmDelete'];

    public function confirmDelete($productId)
    {
        $this->product = Product::findOrFail($productId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->product = null;
    }

    public function delete()
    {
        if ($this->product) {
            if ($this->product->imagen) {
                Storage::disk('public')->delete($this->product->imagen);
            }

            $this->product->delete();

            session()->flash('message', 'Producto eliminado exitosamente');
            
            $this->closeModal();
            $this->dispatch('productDeleted');
        }
    }

    public function render()
    {
        return view('livewire.productos.delete-product');
    }
}