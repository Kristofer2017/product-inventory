<div>
    <!-- Botón para abrir modal -->
    <button wire:click="openModal()"
        class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200 shadow-sm hover:shadow-md whitespace-nowrap">
        + Movimiento
    </button>

    <!-- Modal -->
    @if ($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="closeModal"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>

                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md sm:w-full">
                    <form wire:submit.prevent="register">
                        <!-- Header -->
                        <div class="bg-white px-6 py-4 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-bold text-gray-900">Movimiento de Inventario</h3>
                                <button type="button" wire:click="closeModal"
                                    class="text-gray-400 hover:text-gray-500">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="bg-white px-6 py-6 space-y-4">
                            <!-- Producto -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Producto <span class="text-red-500">*</span>
                                </label>
                                <select wire:model="productId"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition @error('productId') border-red-500 @enderror">
                                    <option value="">Seleccionar producto...</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('productId')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tipo de movimiento -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Tipo <span class="text-red-500">*</span>
                                </label>
                                <div class="flex gap-4">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" wire:model="type" value="entrada"
                                            class="w-4 h-4 text-green-600">
                                        <span class="ml-2 text-sm text-gray-700">Entrada</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="radio" wire:model="type" value="salida"
                                            class="w-4 h-4 text-red-600">
                                        <span class="ml-2 text-sm text-gray-700">Salida</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Cantidad -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Cantidad <span class="text-red-500">*</span>
                                </label>
                                <input type="number" wire:model="quantity" min="1"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition @error('quantity') border-red-500 @enderror"
                                    placeholder="0">
                                @error('quantity')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Motivo -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Motivo
                                </label>
                                <input type="text" wire:model="reason"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition"
                                    placeholder="Ej: Compra a proveedor, Venta cliente...">
                            </div>

                            <!-- Número de referencia -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Referencia
                                </label>
                                <input type="text" wire:model="referenceNumber"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition"
                                    placeholder="Ej: OC-001, INV-234...">
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="bg-gray-50 px-6 py-4 flex items-center justify-end gap-3">
                            <button type="button" wire:click="closeModal"
                                class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium">
                                Cancelar
                            </button>
                            <button type="submit"
                                class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition font-medium shadow-sm hover:shadow-md"
                                wire:loading.attr="disabled">
                                <span wire:loading.remove>Registrar</span>
                                <span wire:loading>Registrando...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
