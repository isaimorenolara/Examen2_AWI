<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Usuario') }}
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

                    <form action="{{ route('admin.update', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $usuario->name) }}" class="form-input w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $usuario->email) }}" class="form-input w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="role" class="block text-gray-700 font-bold mb-2">Rol:</label>
                            <select name="role" id="role" class="form-select w-full" required>
                                <option value="Administrador" {{ old('role', $usuario->role) == 'Administrador' ? 'selected' : '' }}>Administrador</option>
                                <option value="Bibliotecario" {{ old('role', $usuario->role) == 'Bibliotecario' ? 'selected' : '' }}>Bibliotecario</option>
                                <option value="Miembro" {{ old('role', $usuario->role) == 'Miembro' ? 'selected' : '' }}>Miembro</option>
                            </select>
                        </div>

                        <div>
                            <button type="submit" style="background-color: #10B981; color: white; font-weight: bold; padding: 0.25rem 0.5rem; border-radius: 0.25rem; border: none; cursor: pointer;">
                                Actualizar Usuario
                            </button>
                            <a href="{{ route('admin.index') }}" class="ml-4 text-gray-600">Cancelar</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>