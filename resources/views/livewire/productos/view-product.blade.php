<div>
    <!-- Modal -->
    @if ($showModal && $product)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Background overlay -->
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="closeModal"></div>

                <!-- Center modal -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>

                <!-- Modal panel -->
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
                    <!-- Header -->
                    <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-5">
                        <div class="flex items-center justify-between">
                            <h3 class="text-2xl font-bold text-white">Detalles del Producto</h3>
                            <button type="button" wire:click="closeModal"
                                class="text-white hover:text-gray-200 transition">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="bg-white px-6 py-6">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Left side - Image -->
                            <div class="flex items-center justify-center">
                                @if ($product->imagen)
                                    <img src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}"
                                        class="w-full h-80 object-cover rounded-xl shadow-lg">
                                @else
                                    <div class="w-full h-80 bg-gray-100 rounded-xl flex items-center justify-center">
                                        <div class="text-center">
                                            <svg class="mx-auto h-24 w-24 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            <p class="mt-4 text-gray-500 font-medium">Sin imagen</p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Right side - Details -->
                            <div class="space-y-6">
                                <!-- Product Name -->
                                <div>
                                    <h4 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->nombre }}</h4>
                                    <div class="flex items-center gap-2">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            ID: #{{ $product->id }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <h5 class="text-sm font-semibold text-gray-700 uppercase tracking-wider mb-2">
                                        Descripción</h5>
                                    <p class="text-gray-700 leading-relaxed">{{ $product->descripcion }}</p>
                                </div>

                                <!-- Price and Stock -->
                                <div class="grid grid-cols-2 gap-4">
                                    <!-- Price -->
                                    <div
                                        class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-4 border border-green-200">
                                        <div class="flex items-center gap-2 mb-2">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                            <h5 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">
                                                Precio</h5>
                                        </div>
                                        <p class="text-3xl font-bold text-green-700">
                                            ${{ number_format($product->precio, 2) }}</p>
                                    </div>

                                    <!-- Stock -->
                                    <div
                                        class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg p-4 border border-purple-200">
                                        <div class="flex items-center gap-2 mb-2">
                                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                                </path>
                                            </svg>
                                            <h5 class="text-sm font-semibold text-gray-700 uppercase tracking-wider">
                                                Stock</h5>
                                        </div>
                                        <p class="text-3xl font-bold text-purple-700">{{ $product->cantidad }}</p>
                                        <p class="text-xs text-purple-600 mt-1">unidades disponibles</p>
                                    </div>
                                </div>

                                <!-- Stock Status Badge -->
                                <div class="flex items-center gap-3">
                                    <span class="text-sm font-semibold text-gray-700">Estado del Stock:</span>
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                    @if ($product->cantidad > 30) bg-green-100 text-green-800
                                    @elseif($product->cantidad > 10) bg-yellow-100 text-yellow-800
                                    @else bg-red-100 text-red-800 @endif">
                                        @if ($product->cantidad > 30)
                                            ✓ Stock Alto
                                        @elseif($product->cantidad > 10)
                                            ⚠ Stock Medio
                                        @else
                                            ⚠ Stock Bajo
                                        @endif
                                    </span>
                                </div>

                                <!-- Total Value -->
                                <div class="bg-gray-50 rounded-lg p-4 border-2 border-gray-200">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h5 class="text-sm font-semibold text-gray-600 mb-1">Valor Total en
                                                Inventario</h5>
                                            <p class="text-2xl font-bold text-gray-900">
                                                ${{ number_format($product->precio * $product->cantidad, 2) }}</p>
                                        </div>
                                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Timestamps -->
                                <div class="pt-4 border-t border-gray-200 space-y-2">
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                        <span class="font-medium">Creado:</span>
                                        <span class="ml-2">{{ $product->created_at->format('d/m/Y H:i') }}</span>
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                                            </path>
                                        </svg>
                                        <span class="font-medium">Última actualización:</span>
                                        <span class="ml-2">{{ $product->updated_at->format('d/m/Y H:i') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="bg-gray-50 px-6 py-4 flex items-center justify-end gap-3">
                        <button type="button" wire:click="closeModal"
                            class="px-6 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition font-medium shadow-sm">
                            Cerrar
                        </button>
                        <button type="button"
                            wire:click="closeModal(); $dispatch('editProduct', { productId: {{ $product->id }} })"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium shadow-sm">
                            Editar Producto
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
