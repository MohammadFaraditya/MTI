{{-- @extends('admin.sidebar') --}}

@section('navbar')
<nav
class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl mt-4 lg:flex-nowrap lg:justify-start"
navbar-main navbar-scroll="true">
<div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
  <div class="flex grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto justify-end">
    <div class="flex items-center">
      <button class="block px-0 py-2 text-sm font-semibold transition-all ease-nav-brand text-slate-500"
        id="adminButton">
        <i class="fa fa-user sm:mr-1"></i>
        <span class="hidden sm:inline">Admin</span>
      </button>
    </div>
    <div class="hidden ease-in-out relative z-10" id="adminDropdown">
      <div class=" bg-slate-200 flex flex-col rounded-xl absolute right-1 top-12 w-40 p-5 gap-3">
        <button><a href="#">Ubah Password</a></button>
        <button><a href="#">Logout</a></button>
      </div>
    </div>
  </div>
</div>
</nav>

@endsection
