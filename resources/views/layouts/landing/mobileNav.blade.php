<div class='fixed bottom-0 w-full sm:hidden border-t-4 rounded-t-lg border-sky-500 p-3 bg-sky-800'>
    <div class='container mx-auto px-4 text-white'>
        @guest
            <div class='grid grid-cols-3 gap-6 justify-items-center'>
                <a href="{{ route('landing') }}"
                    class="font-semibold p-2 rounded-lg hover:bg-sky-700 hover:text-white
                            {{ Route::is('landing') ? 'border-2 border-sky-500 bg-sky-800 text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                    </svg>
                </a>
                <a href="{{ route('category.index') }}"
                    class="font-semibold p-2 rounded-lg hover:bg-sky-700 hover:text-white
                        {{ Route::is('category.index') ? 'border-2 border-sky-500 bg-sky-800' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-color-swatch" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M19 3h-4a2 2 0 0 0 -2 2v12a4 4 0 0 0 8 0v-12a2 2 0 0 0 -2 -2"></path>
                        <path d="M13 7.35l-2 -2a2 2 0 0 0 -2.828 0l-2.828 2.828a2 2 0 0 0 0 2.828l9 9"></path>
                        <path d="M7.3 13h-2.3a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h12"></path>
                        <line x1="17" y1="17" x2="17" y2="17.01"></line>
                    </svg>
                </a>
                <a href="{{ route('product.index') }}"
                    class="font-semibold p-2 rounded-lg hover:bg-sky-700 hover:text-white
                    {{ Route::is('product.index') ? 'border-2 border-sky-500 bg-sky-800' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-loading"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M2 3h1a2 2 0 0 1 2 2v10a2 2 0 0 0 2 2h15"></path>
                        <rect x="9" y="6" width="10" height="8" rx="3">
                        </rect>
                        <circle cx="9" cy="19" r="2"></circle>
                        <circle cx="18" cy="19" r="2"></circle>
                    </svg>
                </a>
            </div>
        @endguest
        @auth
            <div class='grid grid-cols-4 gap-6 justify-items-center text-2xl'>
                <a href="{{ route('landing') }}"
                    class="font-semibold p-2 rounded-lg hover:bg-sky-700 hover:text-white
                            {{ Route::is('landing') ? 'border-2 border-sky-500 bg-sky-800 text-white' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                    </svg>
                </a>
                {{-- <a href="{{ route('category.index') }}"
                    class="font-semibold p-2 rounded-lg hover:bg-sky-700 hover:text-white
                        {{ Route::is('category.index') ? 'border-2 border-sky-500 bg-sky-800' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-color-swatch" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M19 3h-4a2 2 0 0 0 -2 2v12a4 4 0 0 0 8 0v-12a2 2 0 0 0 -2 -2"></path>
                        <path d="M13 7.35l-2 -2a2 2 0 0 0 -2.828 0l-2.828 2.828a2 2 0 0 0 0 2.828l9 9"></path>
                        <path d="M7.3 13h-2.3a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h12"></path>
                        <line x1="17" y1="17" x2="17" y2="17.01"></line>
                    </svg>
                </a> --}}
                <a href="{{ route('cart.index') }}"
                    class="font-semibold p-2 rounded-lg hover:bg-sky-700 hover:text-white relative
                        {{ Route::is('cart.index') ? 'border-2 border-sky-500 bg-sky-800' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <polyline points="7 10 12 4 17 10"></polyline>
                        <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
                        <circle cx="12" cy="15" r="2"></circle>
                    </svg>
                    <div class="text-sm absolute -right-2 -top-1 bg-rose-500 rounded-full px-2 group-hover:bg-rose-700">
                        {{ Auth::user()->carts()->count() }}
                    </div>
                </a>
                <a href="{{ route('product.index') }}"
                    class="font-semibold p-2 rounded-lg hover:bg-sky-700 hover:text-white
                    {{ Route::is('product*') ? 'border-2 border-sky-500 bg-sky-800' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-loading"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M2 3h1a2 2 0 0 1 2 2v10a2 2 0 0 0 2 2h15"></path>
                        <rect x="9" y="6" width="10" height="8" rx="3">
                        </rect>
                        <circle cx="9" cy="19" r="2"></circle>
                        <circle cx="18" cy="19" r="2"></circle>
                    </svg>
                </a>
                {{-- <a href="{{ route('vehicle.index') }}"
                    class="font-semibold p-2 rounded-lg hover:bg-sky-700 hover:text-white {{ Route::is('vehicle*') ? 'border-2 border-sky-500 bg-sky-800' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-steering-wheel"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="12" r="9"></circle>
                        <circle cx="12" cy="12" r="2"></circle>
                        <line x1="12" y1="14" x2="12" y2="21"></line>
                        <line x1="10" y1="12" x2="3.25" y2="10"></line>
                        <line x1="14" y1="12" x2="20.75" y2="10"></line>
                    </svg>
                </a> --}}
                @hasanyrole('Admin|Super Admin')
                    <a href="{{ route('admin.dashboard') }}"
                        class="font-semibold p-2 rounded-lg hover:bg-sky-700 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-apps" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <rect x="4" y="4" width="6" height="6" rx="1">
                            </rect>
                            <rect x="4" y="14" width="6" height="6" rx="1">
                            </rect>
                            <rect x="14" y="14" width="6" height="6" rx="1">
                            </rect>
                            <line x1="14" y1="7" x2="20" y2="7"></line>
                            <line x1="17" y1="4" x2="17" y2="10"></line>
                        </svg>
                    </a>
                @endhasanyrole
                @role('Customer')
                    <a href="{{ route('customer.dashboard') }}"
                        class="font-semibold p-2 rounded-lg hover:bg-sky-700 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-apps" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <rect x="4" y="4" width="6" height="6" rx="1">
                            </rect>
                            <rect x="4" y="14" width="6" height="6" rx="1">
                            </rect>
                            <rect x="14" y="14" width="6" height="6" rx="1">
                            </rect>
                            <line x1="14" y1="7" x2="20" y2="7"></line>
                            <line x1="17" y1="4" x2="17" y2="10"></line>
                        </svg>
                    </a>
                @endrole
            </div>
        @endauth
    </div>
</div>
