<aside class="w-64 bg-white shadow-md h-screen hidden md:block">
    <div class="p-6 font-bold text-xl text-blue-600 border-b">Admin Panel</div>
    <nav class="mt-6">
        <a href="{{ url('/admin/dashboard') }}"
           class="block py-2.5 px-4 {{ request()->is('admin/dashboard') ? 'bg-blue-100 text-blue-700' : 'text-gray-700' }} hover:bg-blue-50">
            Dashboard
        </a>
        <a href="{{ route('admin.usuarios') }}"
           class="block py-2.5 px-4 {{ request()->routeIs('admin.usuarios*') ? 'bg-blue-100 text-blue-700' : 'text-gray-700' }} hover:bg-blue-50">
            Usuarios
        </a>
        
    </nav>
</aside>