<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ViewProduct extends Component
{
    public $product;
    public $showModal = false;

    protected $listeners = ['viewProduct'];

    public function viewProduct($productId)
    {
        $this->product = Product::findOrFail($productId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->product = null;
    }

    public function render()
    {
        return view('livewire.view-product');
    }
}