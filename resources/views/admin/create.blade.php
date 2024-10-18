<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nuevo Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Nombre</label>
                            <input type="text" name="name" class="form-input w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email</label>
                            <input type="email" name="email" class="form-input w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="role" class="block text-gray-700">Rol</label>
                            <select name="role" class="form-select w-full">
                                <option value="Miembro">Miembro</option>
                                <option value="Bibliotecario">Bibliotecario</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700">Contraseña</label>
                            <input type="password" name="password" class="form-input w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-gray-700">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" class="form-input w-full" required>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Crear Usuario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>