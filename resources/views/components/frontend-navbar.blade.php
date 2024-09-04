<nav class="bg-primary py-4 border-y border-gray-600 text-white">
    <div class="container">
        <div>
            <ul class="md:flex gap-6 hidden">
                <li>
                    <a href="{{ route('home') }}" class="active">गृहपृष्ठ</a>
                </li>

                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('cat', $category->slug) }}">{{ $category->nep_title }}</a>
                    </li>
                @endforeach
            </ul>


            <!-- drawer init and toggle -->
            <div class="md:hidden">
                <button type="button" data-drawer-target="nav-drawer" data-drawer-show="nav-drawer"
                    aria-controls="nav-drawer">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- drawer component -->
            <div id="nav-drawer"
                class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-primary w-80 dark:bg-gray-800"
                tabindex="-1" aria-labelledby="drawer-label">

                <button type="button" data-drawer-hide="nav-drawer" aria-controls="nav-drawer"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>

                <ul class="space-y-4 pt-8">
                    <li>
                        <a href="{{ route('home') }}">गृहपृष्ठ</a>
                    </li>

                    <li>
                        <a href="{{ route('home') }}">गृहपृष्ठ</a>
                    </li>

                    <li>
                        <a href="{{ route('home') }}">गृहपृष्ठ</a>
                    </li>

                    <li>
                        <a href="{{ route('home') }}">गृहपृष्ठ</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>
