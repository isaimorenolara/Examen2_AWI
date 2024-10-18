<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Préstamos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($prestamos->isEmpty())
                        <p>No tienes préstamos activos.</p>
                    @else
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Título</th>
                                    <th class="px-4 py-2">Fecha de Préstamo</th>
                                    <th class="px-4 py-2">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prestamos as $prestamo)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $prestamo->libro->titulo }}</td>
                                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($prestamo->fecha_prestamo)->format('d-m-Y') }}</td>
                                        <td class="border px-4 py-2">{{ ucfirst($prestamo->estado) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>