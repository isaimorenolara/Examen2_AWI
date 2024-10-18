<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Libro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('bibliotecario.update', $libro->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="titulo" class="block text-gray-700 font-bold mb-2">Título:</label>
                            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $libro->titulo) }}" class="form-input w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="autor" class="block text-gray-700 font-bold mb-2">Autor:</label>
                            <input type="text" name="autor" id="autor" value="{{ old('autor', $libro->autor) }}" class="form-input w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="cantidad_disponible" class="block text-gray-700 font-bold mb-2">Cantidad Disponible:</label>
                            <input type="number" name="cantidad_disponible" id="cantidad_disponible" value="{{ old('cantidad_disponible', $libro->cantidad_disponible) }}" class="form-input w-full" required>
                        </div>

                        <div>
                            <button type="submit" style="background-color: #10B981; color: white; font-weight: bold; padding: 0.25rem 0.5rem; border-radius: 0.25rem; border: none; cursor: pointer;">
                                Actualizar Libro
                            </button>
                            <a href="{{ route('bibliotecario.index') }}" class="ml-4 text-gray-600">Cancelar</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>