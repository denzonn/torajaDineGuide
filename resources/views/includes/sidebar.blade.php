<div class="flex flex-col h-full justify-between text-gray-600">
    <ul class="flex flex-col justify-center items-center gap-4 menu text-base">
        <a href="/admin/dashboard"
            class="{{ request()->is('admin/dashboard*') ? 'bg-secondary text-white' : '' }} rounded-md p-3  hover:bg-secondary hover:text-white transition flex items-center justify-center">
            <i class="fa-solid fa-house pr-1"></i>
        </a>
        <a href="/admin/category"
            class="{{ request()->is('admin/category*') ? 'bg-secondary text-white' : '' }} rounded-md p-3  hover:bg-secondary hover:text-white transition flex items-center justify-center">
            <i class="fa-solid fa-layer-group"></i>
        </a>
        <a href="/admin/cafe"
            class="{{ request()->is('admin/cafe*') ? 'bg-secondary text-white' : '' }} rounded-md p-3  hover:bg-secondary hover:text-white transition flex items-center justify-center">
            <i class="fa-solid fa-mug-saucer"></i>
        </a>
    </ul>
    <div>
        <ul>
            <li class="p-3 rounded-md hover:bg-red-500 hover:text-white  transition flex justify-center">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                        class="fa-solid fa-right-from-bracket pr-1"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
