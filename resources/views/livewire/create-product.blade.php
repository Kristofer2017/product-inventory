<div>
    <!-- Button to open modal -->
    <button wire:click="openModal" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition duration-200 shadow-sm hover:shadow-md whitespace-nowrap">
        + Nuevo Producto
    </button>

    <!-- Modal -->
    @if($showModal)
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="closeModal"></div>

            <!-- Center modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>

            <!-- Modal panel -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full">
                <form wire:submit.prevent="save">
                    <!-- Header -->
                    <div class="bg-white px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-bold text-gray-900">Crear Nuevo Producto</h3>
                            <button type="button" wire:click="closeModal" class="text-gray-400 hover:text-gray-500">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="bg-white px-6 py-6 space-y-6">
                        <!-- Nombre -->
                        <div>
                            <label for="nombre" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nombre del Producto <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="nombre"
                                wire:model="nombre"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('nombre') border-red-500 @enderror"
                                placeholder="Ej: Laptop Dell XPS 15"
                            >
                            @error('nombre') 
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Descripción -->
                        <div>
                            <label for="descripcion" class="block text-sm font-semibold text-gray-700 mb-2">
                                Descripción <span class="text-red-500">*</span>
                            </label>
                            <textarea 
                                id="descripcion"
                                wire:model="descripcion"
                                rows="3"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('descripcion') border-red-500 @enderror"
                                placeholder="Describe el producto..."
                            ></textarea>
                            @error('descripcion') 
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Precio y Cantidad -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Precio -->
                            <div>
                                <label for="precio" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Precio <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">$</span>
                                    <input 
                                        type="number" 
                                        id="precio"
                                        wire:model="precio"
                                        step="0.01"
                                        class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('precio') border-red-500 @enderror"
                                        placeholder="0.00"
                                    >
                                </div>
                                @error('precio') 
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Inventario Inicial -->
                            <div>
                                <label for="cantidad" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Inventario Inicial <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="number" 
                                    id="cantidad"
                                    wire:model="cantidad"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition @error('cantidad') border-red-500 @enderror"
                                    placeholder="0"
                                >
                                @error('cantidad') 
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div>
                            <label for="imagen" class="block text-sm font-semibold text-gray-700 mb-2">
                                Imagen del Producto
                            </label>
                            <div class="flex items-center gap-4">
                                <label class="flex-1 cursor-pointer">
                                    <div class="w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-lg hover:border-blue-500 transition text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        <p class="mt-1 text-sm text-gray-600">
                                            <span class="text-blue-600 font-medium">Subir imagen</span> o arrastra aquí
                                        </p>
                                        <p class="text-xs text-gray-500 mt-1">PNG, JPG hasta 2MB</p>
                                    </div>
                                    <input 
                                        type="file" 
                                        id="imagen"
                                        wire:model="imagen"
                                        accept="image/*"
                                        class="hidden"
                                    >
                                </label>

                                @if ($imagen)
                                    <div class="relative">
                                        <img src="{{ $imagen->temporaryUrl() }}" alt="Preview" class="h-24 w-24 object-cover rounded-lg border-2 border-blue-500">
                                        <button 
                                            type="button"
                                            wire:click="$set('imagen', null)"
                                            class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 transition"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            @error('imagen') 
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <div wire:loading wire:target="imagen" class="mt-2">
                                <p class="text-sm text-blue-600">Subiendo imagen...</p>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="bg-gray-50 px-6 py-4 flex items-center justify-end gap-3">
                        <button 
                            type="button"
                            wire:click="closeModal"
                            class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium"
                        >
                            Cancelar
                        </button>
                        <button 
                            type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium shadow-sm hover:shadow-md"
                            wire:loading.attr="disabled"
                            wire:target="save"
                        >
                            <span wire:loading.remove wire:target="save">Crear Producto</span>
                            <span wire:loading wire:target="save">Guardando...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>