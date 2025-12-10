<div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
    <!-- Encabezado con búsqueda -->
    <div class="bg-white rounded-lg shadow-sm mb-0 p-4 border-b border-gray-200">
        <div class="flex flex-col sm:flex-row gap-4 items-center justify-between">
            <h2 class="text-lg font-bold text-gray-900">Historial de Movimientos</h2>
            <div class="relative flex-1 max-w-md w-full">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text" wire:model.live.debounce.300ms="searchMovement"
                    placeholder="Buscar movimientos..."
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent outline-none transition" />
            </div>
        </div>
    </div>

    <!-- Tabla -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <!-- Encabezados -->
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left">
                        <button wire:click="sortBy('created_at')"
                            class="flex items-center gap-2 hover:text-purple-600 transition-colors group">
                            <span
                                class="text-xs font-semibold text-gray-700 uppercase tracking-wider group-hover:text-purple-600">
                                Fecha
                            </span>
                            @if ($sortField === 'created_at')
                                @if ($sortDirection === 'asc')
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7"></path>
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                @endif
                            @else
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                </svg>
                            @endif
                        </button>
                    </th>
                    <th class="px-6 py-4 text-left">
                        <span class="text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Producto
                        </span>
                    </th>
                    <th class="px-6 py-4 text-left">
                        <button wire:click="sortBy('type')"
                            class="flex items-center gap-2 hover:text-purple-600 transition-colors group">
                            <span
                                class="text-xs font-semibold text-gray-700 uppercase tracking-wider group-hover:text-purple-600">
                                Tipo
                            </span>
                            @if ($sortField === 'type')
                                @if ($sortDirection === 'asc')
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7"></path>
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                @endif
                            @else
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                </svg>
                            @endif
                        </button>
                    </th>
                    <th class="px-6 py-4 text-left">
                        <button wire:click="sortBy('quantity')"
                            class="flex items-center gap-2 hover:text-purple-600 transition-colors group">
                            <span
                                class="text-xs font-semibold text-gray-700 uppercase tracking-wider group-hover:text-purple-600">
                                Cantidad
                            </span>
                            @if ($sortField === 'quantity')
                                @if ($sortDirection === 'asc')
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 15l7-7 7 7"></path>
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                @endif
                            @else
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                </svg>
                            @endif
                        </button>
                    </th>
                    <th class="px-6 py-4 text-left hidden lg:table-cell">
                        <span class="text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Motivo
                        </span>
                    </th>
                    <th class="px-6 py-4 text-left hidden md:table-cell">
                        <span class="text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Referencia
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($movements as $movement)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $movement->created_at->format('d/m/Y') }}
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ $movement->created_at->format('H:i') }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $movement->product->nombre }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                @if ($movement->type === 'entrada') bg-green-100 text-green-800
                                @else bg-red-100 text-red-800 @endif">
                                @if ($movement->type === 'entrada')
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Entrada
                                @else
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 12H4"></path>
                                    </svg>
                                    Salida
                                @endif
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-semibold text-gray-900">
                                @if ($movement->type === 'entrada')
                                    <span class="text-green-600">+{{ $movement->quantity }}</span>
                                @else
                                    <span class="text-red-600">-{{ $movement->quantity }}</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 hidden lg:table-cell">
                            <div class="text-sm text-gray-600">
                                {{ $movement->reason ?? '--' }}
                            </div>
                        </td>
                        <td class="px-6 py-4 hidden md:table-cell">
                            <div class="text-sm text-gray-600">
                                {{ $movement->reference_number ?? '--' }}
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 text-gray-400 mb-4" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                <p class="text-gray-500 text-lg font-medium">No hay movimientos registrados</p>
                                <p class="text-gray-400 text-sm mt-1">Los movimientos de inventario aparecerán aquí</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Footer con contador -->
    <div class="bg-white border-t border-gray-200 px-6 py-4">
        <div class="text-sm text-gray-600">
            Total de movimientos: <span class="font-medium">{{ $movements->count() }}</span>
        </div>
    </div>
</div>