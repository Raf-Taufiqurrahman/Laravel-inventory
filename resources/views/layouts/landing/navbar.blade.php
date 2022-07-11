<!-- Navbar -->
<div class="w-full bg-sky-900 p-5">
    <div class="container mx-auto">
        <div class="flex flex-row justify-between items-center">
            <h1 class="text-white font-bold text-2xl">Inventory</h1>
            <div class="hidden md:flex items-center justify-center gap-4">
                <a href="{{ route('landing') }}"
                    class="text-white font-semibold p-2 rounded-lg hover:bg-sky-700 hover:text-white
                            {{ Route::is('landing') ? 'border-2 border-sky-500 bg-sky-800' : '' }}">
                    Home
                </a>
                <a href="{{ route('category.index') }}"
                    class="text-white font-semibold p-2 rounded-lg hover:bg-sky-700 hover:text-white
                        {{ Route::is('category.index') ? 'border-2 border-sky-500 bg-sky-800' : '' }}">
                    Kategori
                </a>
                <a href="{{ route('product.index') }}"
                    class="text-white font-semibold p-2 rounded-lg hover:bg-sky-700 hover:text-white
                    {{ Route::is('product.index') ? 'border-2 border-sky-500 bg-sky-800' : '' }}">
                    Produk
                </a>
                {{-- <a href="{{ route('vehicle.index') }}"
                    class="text-white font-semibold p-2 rounded-lg hover:bg-sky-700 hover:text-white {{ Route::is('vehicle*') ? 'border-2 border-sky-500 bg-sky-800' : '' }}">
                    Kendaraan
                </a> --}}
            </div>
            <div class="flex items-center gap-2">
                @guest
                    <a href="{{ route('login') }}"
                        class="bg-white p-2 rounded-lg font-semibold hover:bg-sky-700 hover:text-white">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="bg-sky-600 p-2 rounded-lg font-semibold text-white hover:bg-sky-700 ">Daftar</a>
                @endguest

                @auth
                    <a href="{{ route('cart.index') }}" class="text-white relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <polyline points="7 10 12 4 17 10"></polyline>
                            <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
                            <circle cx="12" cy="15" r="2"></circle>
                        </svg>
                        <span
                            class="absolute flex items-center h-5 w-5 rounded-full bg-red-600 justify-center bottom-5 left-4 text-xs">
                            {{ Auth::user()->carts()->count() }}
                        </span>
                    </a>
                    @hasanyrole('Admin|Super Admin')
                        <a href="{{ route('admin.dashboard') }}"
                            class="hidden md:flex bg-sky-600 p-2 rounded-lg font-semibold text-white hover:bg-sky-700 ml-2">Dashboard</a>
                    @endhasallroles
                    @role('Customer')
                        <a href="{{ route('customer.dashboard') }}"
                            class="hidden md:flex bg-sky-600 p-2 rounded-lg font-semibold text-white hover:bg-sky-700 ">Dashboard</a>
                    @endrole
                @endauth
            </div>
        </div>
    </div>
</div>
