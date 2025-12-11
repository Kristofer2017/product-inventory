<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Product;

class ShowStats extends Component
{
    public function render()
    {
        $products = Product::all();
        return view('livewire.dashboard.show-stats',  ['products' => $products]);
    }
}
