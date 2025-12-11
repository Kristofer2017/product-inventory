<?php

namespace App\Livewire\Productos;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class EditProduct extends Component
{
    use WithFileUploads;

    public $productId;
    public $nombre = '';
    public $descripcion = '';
    public $precio = '';
    public $cantidad = '';
    public $imagen;
    public $imagenActual;
    public $showModal = false;

    protected $rules = [
        'nombre' => 'required|min:3|max:255',
        'descripcion' => 'required|min:10',
        'precio' => 'required|numeric|min:0',
        'cantidad' => 'required|integer|min:0',
        'imagen' => 'nullable|image|max:2048',
    ];

    protected $messages = [
        'nombre.required' => 'El nombre es obligatorio',
        'nombre.min' => 'El nombre debe tener al menos 3 caracteres',
        'descripcion.required' => 'La descripción es obligatoria',
        'descripcion.min' => 'La descripción debe tener al menos 10 caracteres',
        'precio.required' => 'El precio es obligatorio',
        'precio.numeric' => 'El precio debe ser un número',
        'precio.min' => 'El precio no puede ser negativo',
        'cantidad.required' => 'El inventario es obligatorio',
        'cantidad.integer' => 'El inventario debe ser un número entero',
        'cantidad.min' => 'El inventario no puede ser negativo',
        'imagen.image' => 'El archivo debe ser una imagen',
        'imagen.max' => 'La imagen no puede superar los 2MB',
    ];

    protected $listeners = ['editProduct'];

    public function editProduct($productId)
    {
        $product = Product::findOrFail($productId);
        
        $this->productId = $product->id;
        $this->nombre = $product->nombre;
        $this->descripcion = $product->descripcion;
        $this->precio = $product->precio;
        $this->cantidad = $product->cantidad;
        $this->imagenActual = $product->imagen;
        $this->imagen = null;
        
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->productId = null;
        $this->nombre = '';
        $this->descripcion = '';
        $this->precio = '';
        $this->cantidad = '';
        $this->imagen = null;
        $this->imagenActual = null;
        $this->resetValidation();
    }

    public function removeCurrentImage()
    {
        $this->imagenActual = null;
    }

    public function update()
    {
        $this->validate();

        $product = Product::findOrFail($this->productId);

        $imagePath = $this->imagenActual;

        // Si hay una nueva imagen
        if ($this->imagen) {
            // Eliminar la imagen anterior si existe
            if ($product->imagen) {
                Storage::disk('public')->delete($product->imagen);
            }
            $imagePath = $this->imagen->store('products', 'public');
        }
        // Si se eliminó la imagen actual sin subir una nueva
        elseif (!$this->imagenActual && $product->imagen) {
            Storage::disk('public')->delete($product->imagen);
            $imagePath = null;
        }

        $product->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'cantidad' => $this->cantidad,
            'imagen' => $imagePath,
        ]);

        session()->flash('message', 'Producto actualizado exitosamente');
        
        $this->closeModal();
        $this->dispatch('productUpdated');
    }

    public function render()
    {
        return view('livewire.productos.edit-product');
    }
}