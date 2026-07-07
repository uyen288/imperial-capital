<header class="sticky top-0 z-50 border-b border-gray-200 bg-white">
     <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6 lg:px-10">

          {{-- Logo --}}
          <a href="{{ route('home') }}"
               class="text-sm font-normal uppercase tracking-[0.1em] text-gray-900 transition hover:text-[var(--color-red)]">
               Imperial Capital
          </a>

          {{-- Navigation --}}
          <nav class="hidden lg:block">
               <ul class="flex items-center gap-10">

                    @foreach($funds as $fund)

                         <li>
                              <a href="{{ route('funds.show', $fund->slug) }}" class="text-xs font-semibold uppercase tracking-[0.18em] transition hover:text-[var(--color-red)] 
                                 {{ request()->is('funds/' . $fund->slug) ? 'text-[var(--color-red)]' : 'text-gray-700' }}">
                                   {{ $fund->name }}
                              </a>
                         </li>

                    @endforeach

               </ul>
          </nav>

          {{-- Right --}}
          <div class="flex items-center gap-6">

               {{-- Language --}}
               <div class="flex items-center gap-2 border-r border-gray-200 pr-6">

                    <button class="text-xs font-semibold uppercase tracking-widest text-[var(--color-red)]">
                         VI
                    </button>

                    <span class="text-gray-300">/</span>

                    <button
                         class="text-xs font-semibold uppercase tracking-widest text-gray-500 hover:text-[var(--color-red)]">
                         EN
                    </button>

               </div>

               @guest

                    <a href="{{ route('login') }}"
                         class="border border-gray-900 px-5 py-2 text-xs font-semibold uppercase tracking-widest text-gray-900 transition hover:border-red-700 hover:bg-red-700 hover:text-white">

                         Login

                    </a>

               @endguest

               @auth

                    <form method="POST" action="{{ route('logout') }}">
                         @csrf

                         <button
                              class="bg-red-600 px-5 py-2 text-xs font-semibold uppercase tracking-widest text-white transition hover:border-red-700 hover:bg-red-700 hover:text-white">

                              Logout

                         </button>

                    </form>

                    <a href="{{ route('admin.dashboard') }}"
                         class="border border-red-900 px-5 py-2 text-xs font-semibold uppercase tracking-widest text-gray-900 transition hover:border-red-700 hover:bg-red-700 hover:text-white">

                         Dashboard

                    </a>

               @endauth

          </div>

     </div>
</header>