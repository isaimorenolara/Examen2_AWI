<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('admin.create') }}" class="btn btn-primary mb-4">Crear Nuevo Usuario</a>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Nombre</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Rol</th>
                                <th class="px-4 py-2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td class="border px-4 py-2">{{ $usuario->id }}</td>
                                    <td class="border px-4 py-2">{{ $usuario->name }}</td>
                                    <td class="border px-4 py-2">{{ $usuario->email }}</td>
                                    <td class="border px-4 py-2">{{ $usuario->role }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('admin.edit', $usuario->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Editar</a>
                                        {{-- <form action="{{ route('admin.destroy', $usuario->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Eliminar</button>
                                        </form> --}}
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