<!-- Navbar -->
<div class="w-full border-b border-dashed border-sky-800 bg-sky-900 p-5">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <a href="/" class="flex items-center gap-2">
                <img src="{{ asset('warehouse.png') }}" class="w-7 h-7 object-center object-cover" />
                <h1 class="text-white text-2xl font-semibold">Gudangku</h1>
            </a>
            <div class="flex gap-4 text-white">
                @guest
                    <a href="{{ route('login') }}" class="border px-2 py-1 rounded-lg font-medium hover:bg-sky-900">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="border px-2 py-1 rounded-lg font-medium hover:bg-sky-900">
                        Daftar
                    </a>
                @endguest
                @auth
                    <div class="hidden md:flex items-center gap-4">
                        <a href="{{ route('cart.index') }}" class="relative group">
                            <div
                                class="text-sm absolute -right-2 -top-3 bg-rose-500 rounded-full px-2 group-hover:bg-rose-700">
                                {{ Auth::user()->carts()->count() }}
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket"
                                width="32" height="32" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <polyline points="7 10 12 4 17 10"></polyline>
                                <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
                                <circle cx="12" cy="15" r="2"></circle>
                            </svg>
                        </a>
                        @role('Admin|Super Admin')
                            <a href="{{ route('admin.dashboard') }}" class="rounded-lg border px-2 py-1">Dashboard</a>
                        @endrole
                        @role('Customer')
                            <a href="{{ route('customer.dashboard') }}" class="rounded-lg border px-2 py-1">Dashboard</a>
                        @endrole
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>
