<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Libros Disponibles para Préstamo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Título</th>
                                <th class="px-4 py-2">Autor</th>
                                <th class="px-4 py-2">Cantidad Disponible</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($libros as $libro)
                                <tr>
                                    <td class="border px-4 py-2">{{ $libro->titulo }}</td>
                                    <td class="border px-4 py-2">{{ $libro->autor }}</td>
                                    <td class="border px-4 py-2">{{ $libro->cantidad_disponible }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('prestamos.solicitar', $libro->id) }}" 
                                            style="background-color: #3B82F6; color: white; font-weight: bold; padding: 0.25rem 0.5rem; border-radius: 0.25rem; text-align: center; display: inline-block; text-decoration: none;">
                                            Solicitar Préstamo
                                        </a>
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