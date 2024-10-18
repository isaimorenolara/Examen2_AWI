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
                        <p>Aquí puedes gestionar usuarios, libros y modificar el estado de los préstamos de los
                            miembros.</p>

                        <br>
                        <a href="{{ route('bibliotecario.index') }}"
                            style="background-color: #1D4ED8; color: white; padding: 0.5rem 1rem; text-decoration: none; border-radius: 0.25rem; display: inline-block; margin-bottom: 10px;">
                            Ver Libros
                        </a>
                        <br>

                        <a href="{{ route('admin.index') }}"
                            style="background-color: #1D4ED8; color: white; padding: 0.5rem 1rem; text-decoration: none; border-radius: 0.25rem; display: inline-block; margin-bottom: 10px;">
                            Ver Usuarios
                        </a>
                        <br>

                        <a href="{{ route('bibliotecario-prestamos') }}"
                            style="background-color: #1D4ED8; color: white; padding: 0.5rem 1rem; text-decoration: none; border-radius: 0.25rem; display: inline-block; margin-bottom: 10px;">
                            Gestionar Préstamos de Miembros
                        </a>
                    @elseif (auth()->user()->role === 'Bibliotecario')
                        <h3>Bienvenido Bibliotecario</h3>
                        <p>Aquí puedes gestionar libros y modificar el estado de los préstamos de los miembros.</p>

                        <br>
                        <a href="{{ route('bibliotecario.index') }}"
                            style="background-color: #10B981; color: white; padding: 0.5rem 1rem; text-decoration: none; border-radius: 0.25rem; display: inline-block; margin-bottom: 10px;">
                            Ver Libros
                        </a>
                        <br>

                        <a href="{{ route('bibliotecario-prestamos') }}"
                            style="background-color: #10B981; color: white; padding: 0.5rem 1rem; text-decoration: none; border-radius: 0.25rem; display: inline-block; margin-bottom: 10px;">
                            Gestionar Préstamos de Miembros
                        </a>
                    @elseif (auth()->user()->role === 'Miembro')
                        <h3>Bienvenido Miembro</h3>
                        <p>Aquí puedes ver los libros disponibles y solicitar un préstamo.</p>

                        <br>
                        <a href="{{ route('prestamos.index') }}"
                            style="background-color: #3B82F6; color: white; padding: 0.5rem 1rem; text-decoration: none; border-radius: 0.25rem; display: inline-block; margin-bottom: 10px;">
                            Ver Libros Disponibles
                        </a>
                        <br>

                        <a href="{{ route('prestamos.misPrestamos') }}"
                            style="background-color: #3B82F6; color: white; padding: 0.5rem 1rem; text-decoration: none; border-radius: 0.25rem; display: inline-block; margin-bottom: 10px;">
                            Mis Préstamos
                        </a>
                    @else
                        <p>No tienes asignado un rol específico.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>