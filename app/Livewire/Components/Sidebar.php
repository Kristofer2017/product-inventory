<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Sidebar extends Component
{
    public $activeMenu = 'dashboard';
    protected $listeners = ['setActiveMenu'];

    public function mount()
    {
        $this->activeMenu = request()->route()->getName() ?? 'dashboard';
    }

    public function setActiveMenu($menu)
    {
        $this->activeMenu = $menu;
    }
    
    public function render()
    {
        return view('livewire.components.sidebar');
    }
}
