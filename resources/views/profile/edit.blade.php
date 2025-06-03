<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <img src="https://facturacion.ugb.edu.sv/img/job-profile2.a5201693.png" alt="UGB Logo" class="w-11 h-14">
            <div>
                <h2 class="font-bold text-2xl text-indigo-700">
                    {{ __('Encuéntranos UGB') }}
                </h2>
                <p class="text-sm text-gray-500">Gestiona tu información personal, actualiza tu contraseña o solicita la eliminación de tu cuenta.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">

            {{-- Editar Información del Perfil --}}
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Actualizar Información Personal</h3>
                <p class="text-sm text-gray-600 mb-4">Modifica tus datos personales como nombre, dirección de correo electrónico o número de contacto.</p>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Editar Contraseña --}}
            <div class="bg-white p-6 rounded-xl shadow-md">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Cambiar Contraseña</h3>
                <p class="text-sm text-gray-600 mb-4">Por seguridad, utiliza una contraseña segura y actualízala con frecuencia.</p>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Eliminar Cuenta --}}
            <div class="bg-white p-6 rounded-xl shadow-md border border-red-200">
                <h3 class="text-lg font-semibold text-red-600 mb-4">Eliminar Cuenta</h3>
                <p class="text-sm text-red-500 mb-2">Si decides cerrar tu cuenta, ten en cuenta que esta acción no se puede deshacer.</p>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
