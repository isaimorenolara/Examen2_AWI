<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Préstamos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Libro</th>
                                <th class="px-4 py-2">Usuario</th>
                                <th class="px-4 py-2">Fecha de Préstamo</th>
                                <th class="px-4 py-2">Estado</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prestamos as $prestamo)
                                <tr>
                                    <td class="border px-4 py-2">{{ $prestamo->libro->titulo }}</td>
                                    <td class="border px-4 py-2">{{ $prestamo->user->name }}</td>
                                    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($prestamo->fecha_prestamo)->format('d-m-Y') }}</td>
                                    <td class="border px-4 py-2">{{ ucfirst($prestamo->estado) }}</td>
                                    <td class="border px-4 py-2">
                                        <form action="{{ route('prestamos.actualizarEstado', $prestamo->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="estado" class="form-select">
                                                <option value="pendiente" {{ $prestamo->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                                <option value="devuelto" {{ $prestamo->estado == 'devuelto' ? 'selected' : '' }}>Devuelto</option>
                                            </select>
                                            <button type="submit" style="background-color: #10B981; color: white; font-weight: bold; padding: 0.25rem 0.5rem; border-radius: 0.25rem; border: none; cursor: pointer;">
                                                Actualizar
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