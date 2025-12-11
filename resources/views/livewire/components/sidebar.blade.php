<div class="h-full flex flex-col w-75 bg-gray-100 text-gray-900 shadow-lg">
    

    <!-- Navigation Menu -->
    <nav class="flex-1 px-4 py-8 space-y-2">

        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}"
            wire:click="setActiveMenu('dashboard')"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group
            @if($activeMenu === 'dashboard' || request()->route()->getName() === 'dashboard')
                bg-purple-600 text-white shadow-lg
            @else
                text-gray-700 hover:bg-gray-100 hover:text-gray-900
            @endif">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-4m0 0l7-4 7 4M5 8v10a1 1 0 001 1h12a1 1 0 001-1V8m-9 4v4m0 0v2m0-2v-2m9-2v2m0 0v2m0-2v-2">
                </path>
            </svg>
            <span class="font-medium text-sm">Dashboard</span>
        </a>

        <!-- Productos -->
        <a href="{{ route('productos') }}"
            wire:click="setActiveMenu('productos')"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group
            @if($activeMenu === 'productos' || request()->route()->getName() === 'productos')
                bg-purple-600 text-white shadow-lg
            @else
                text-gray-700 hover:bg-gray-100 hover:text-gray-900
            @endif">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                </path>
            </svg>
            <span class="font-medium text-sm">Productos</span>
        </a>

        <!-- Movimientos -->
        <a href="{{ route('movimientos') }}"
            wire:click="setActiveMenu('movimientos')"
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all duration-200 group
            @if($activeMenu === 'movimientos' || request()->route()->getName() === 'movimientos')
                bg-purple-600 text-white shadow-lg
            @else
                text-gray-700 hover:bg-gray-100 hover:text-gray-900
            @endif">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7h12M8 11h12m-12 4h12M3 7h.01M3 11h.01M3 15h.01">
                </path>
            </svg>
            <span class="font-medium text-sm">Movimientos</span>
        </a>
    </nav>

    <!-- Footer User -->
    <div class="border-t border-gray-300 p-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate">
                    {{ Auth::user()->name }}
                </p>
                <p class="text-xs text-gray-500 truncate">
                    {{ Auth::user()->email }}
                </p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}" class="mt-3">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-900 rounded-lg transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                Cerrar Sesión
            </button>
        </form>
    </div>
</div>
