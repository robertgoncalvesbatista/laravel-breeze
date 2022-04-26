<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar permissão') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>

                <div class="p-6 bg-white border-b border-gray-200 mt-4">
                    <form method="POST" action="{{ route('permission.update', $permission->id) }}">
                        @method('PUT')
                        @csrf

                        <div>
                            <x-label for="name" :value="__('Permissão')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$permission->name}}" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Editar') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>