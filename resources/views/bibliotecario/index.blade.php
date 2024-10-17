<!-- resources/views/bibliotecario/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Libros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="mb-4">
                        <a href="{{ route('bibliotecario.create') }}" type="button" class="btn btn-primary">
                            Añadir Nuevo Libro
                        </a>
                    </div>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Título</th>
                                <th class="px-4 py-2">Autor</th>
                                <th class="px-4 py-2">Cantidad Disponible</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($libros as $libro)
                                <tr>
                                    <td class="border px-4 py-2">{{ $libro->id }}</td>
                                    <td class="border px-4 py-2">{{ $libro->titulo }}</td>
                                    <td class="border px-4 py-2">{{ $libro->autor }}</td>
                                    <td class="border px-4 py-2">{{ $libro->cantidad_disponible }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('bibliotecario.edit', $libro->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Editar</a>
                                        <form action="{{ route('bibliotecario.destroy', $libro->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>