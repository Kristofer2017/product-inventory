<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\InventoryMovement;

class StockMovement extends Component
{
    public $productId;
    public $type = 'entrada';
    public $quantity = '';
    public $reason = '';
    public $referenceNumber = '';
    public $showModal = false;

    protected $rules = [
        'productId' => 'required|exists:products,id',
        'type' => 'required|in:entrada,salida',
        'quantity' => 'required|integer|min:1',
        'reason' => 'nullable|string|max:255',
        'referenceNumber' => 'nullable|string|max:100',
    ];

    protected $messages = [
        'productId.required' => 'Debe seleccionar un producto',
        'quantity.required' => 'La cantidad es obligatoria',
        'quantity.integer' => 'La cantidad debe ser un número entero',
        'quantity.min' => 'La cantidad debe ser mayor a 0',
    ];

    public function openModal($productId = null)
    {
        $this->productId = $productId;
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
        $this->type = 'entrada';
        $this->quantity = '';
        $this->reason = '';
        $this->referenceNumber = '';
        $this->resetValidation();
    }

    public function register()
    {
        $this->validate();

        $product = Product::findOrFail($this->productId);

        // Validar que no haya salida mayor al stock
        if ($this->type === 'salida' && $this->quantity > $product->cantidad) {
            $this->addError('quantity', 'No hay suficiente stock disponible');
            return;
        }

        // Registrar movimiento
        InventoryMovement::create([
            'product_id' => $this->productId,
            'type' => $this->type,
            'quantity' => $this->quantity,
            'reason' => $this->reason,
            'reference_number' => $this->referenceNumber,
        ]);

        // Actualizar cantidad del producto
        $newQuantity = $this->type === 'entrada' 
            ? $product->cantidad + $this->quantity
            : $product->cantidad - $this->quantity;

        $product->update(['cantidad' => $newQuantity]);

        session()->flash('message', 'Movimiento de inventario registrado exitosamente');
        
        $this->closeModal();
        $this->dispatch('inventoryUpdated');
        $this->dispatch('productUpdated');
    }

    public function render()
    {
        $products = Product::orderBy('nombre')->get();
        return view('livewire.stock-movement', ['products' => $products]);
    }
}