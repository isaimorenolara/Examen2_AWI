<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir un Nuevo Libro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('bibliotecario.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="titulo" class="block text-sm font-medium text-gray-700">Título del Libro</label>
                            <input id="titulo" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" name="titulo" required autofocus />
                        </div>

                        <div class="mb-4">
                            <label for="autor" class="block text-sm font-medium text-gray-700">Autor del Libro</label>
                            <input id="autor" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" name="autor" required />
                        </div>

                        <div class="mb-4">
                            <label for="cantidad_disponible" class="block text-sm font-medium text-gray-700">Cantidad Disponible</label>
                            <input id="cantidad_disponible" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="number" name="cantidad_disponible" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit">
                                Añadir Libro
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>