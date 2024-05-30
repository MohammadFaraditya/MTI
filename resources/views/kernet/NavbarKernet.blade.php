@section('navbarKernet')
    <nav class="relative bg-black flex w-full items-center justify-between transition-all shadow-none duration-250 ease-soft-in"
        navbar-main navbar-scroll="true">
        <div class="h-full">
            <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-white xl:hidden"
                sidenav-close></i>
            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="{{ route('TugasKernet') }}">
                <img src="{{ URL('images/logo-mh.jpg') }}"
                    class="inline w-12 transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
            </a>
        </div>
        <div class="flex items-center p-4 gap-4">
            <div class="flex grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto justify-end">
                <div class="flex items-center">
                    <button class="block px-0 py-2 text-sm font-semibold transition-all ease-nav-brand text-slate-500"
                        id="adminButton">
                        <i class="fa fa-user text-2xl sm:mr-1"></i>
                        <span class="pl-1"></span>
                    </button>
                </div>
                <div class="hidden ease-in-out relative z-10" id="adminDropdown">
                    <div class="bg-slate-200 flex flex-col rounded-xl absolute right-1 top-12 w-40 p-5 gap-3">
                        <button><a href="{{ route('ShowChangePasswordForm') }}">Ubah Password</a></button>
                        <button><a href="{{ route('logout') }}">Logout</a></button>
                    </div>
                </div>
            </div>
            <div class="lg:hidden">
                <button class="text-white" id="buttonBurger">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>
@endsection
