<?php

namespace App\Livewire\Productos;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $nombre = '';
    public $descripcion = '';
    public $precio = '';
    public $cantidad = '';
    public $imagen;
    public $showModal = false;

    protected $rules = [
        'nombre' => 'required|min:3|max:255',
        'descripcion' => 'required|min:10',
        'precio' => 'required|numeric|min:0',
        'cantidad' => 'required|integer|min:0',
        'imagen' => 'nullable|image|max:2048', // 2MB Max
    ];

    protected $messages = [
        'nombre.required' => 'El nombre es obligatorio',
        'nombre.min' => 'El nombre debe tener al menos 3 caracteres',
        'descripcion.required' => 'La descripción es obligatoria',
        'descripcion.min' => 'La descripción debe tener al menos 10 caracteres',
        'precio.required' => 'El precio es obligatorio',
        'precio.numeric' => 'El precio debe ser un número',
        'precio.min' => 'El precio no puede ser negativo',
        'cantidad.required' => 'El inventario inicial es obligatorio',
        'cantidad.integer' => 'El inventario debe ser un número entero',
        'cantidad.min' => 'El inventario no puede ser negativo',
        'imagen.image' => 'El archivo debe ser una imagen',
        'imagen.max' => 'La imagen no puede superar los 2MB',
    ];

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->nombre = '';
        $this->descripcion = '';
        $this->precio = '';
        $this->cantidad = '';
        $this->imagen = null;
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        $imagePath = null;
        if ($this->imagen) {
            $imagePath = $this->imagen->store('products', 'public');
        }

        Product::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'cantidad' => $this->cantidad,
            'imagen' => $imagePath,
        ]);

        session()->flash('message', 'Producto creado exitosamente');
        
        $this->closeModal();
        $this->dispatch('productCreated');
    }

    public function render()
    {
        return view('livewire.productos.create-product');
    }
}