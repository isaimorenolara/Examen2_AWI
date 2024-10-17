<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (auth()->user()->role === 'Administrador')
                        <h3>Bienvenido Administrador</h3>
                        <p>Aquí puedes gestionar usuarios y ver el estado de los libros prestados.</p>
                        <a href="{{ route('admin.index') }}">Ver Usuarios</a>

                    @elseif (auth()->user()->role === 'Bibliotecario')
                        <h3>Bienvenido Bibliotecario</h3>
                        <p>Aquí puedes gestionar libros y realizar préstamos.</p>
                        <a href="{{ route('bibliotecario.index') }}">Ver Libros</a>

                    @else
                        <p>No tienes asignado un rol específico.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>