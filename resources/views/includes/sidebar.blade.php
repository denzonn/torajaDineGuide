<div class="flex flex-col h-full justify-between text-gray-600">
    <ul class="flex flex-col gap-4 menu text-base">
        <li
            class="{{ request()->is('admin/dashboard*') ? 'bg-secondary text-white' : '' }} py-2 px-6 rounded-md  hover:bg-secondary hover:text-white transition">
            <a href="/admin/dashboard" class="p-0"><i class="fa-solid fa-house pr-1"></i> Dashboard</a>
        </li>
        <li
            class="{{ request()->is('admin/category*') ? 'bg-secondary text-white' : '' }} py-2 px-6 rounded-md  hover:bg-secondary hover:text-white transition">
            <a href="/admin/category" class="p-0"><i class="fa-solid fa-layer-group"></i> Kategori</a>
        </li>
        <li
            class="{{ request()->is('admin/cafe*') ? 'bg-secondary text-white' : '' }} py-2 px-6 rounded-md  hover:bg-secondary hover:text-white transition">
            <a href="/admin/cafe" class="p-0"><i class="fa-solid fa-mug-saucer"></i> Kuliner</a>
        </li>
    </ul>
    <div>
        <ul>
            <li class="py-2 rounded-md px-6 hover:bg-red-500 hover:text-white  transition">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="fa-solid fa-right-from-bracket pr-1"></i> Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
