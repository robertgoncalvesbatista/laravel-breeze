<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciar permissões') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex items-center justify-between">
                    <p>You're logged in!</p>
                    <a href="/permission/create" class="p-2 bg-green-600 text-white rounded">Criar</a>
                </div>
            </div>


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                <table class="w-full text-sm text-left text-white">
                    <thead class="text-xs text-white uppercase bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-4">
                                #
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Permissão
                            </th>
                            <th scope="col" class="px-6 py-4">
                                Guard
                            </th>

                            <th scope="col" class="px-6 py-4">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $key => $permission)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{$key + 1 }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{$permission->name}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{$permission->guard_name}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium flex text-gray-900 whitespace-nowrap">
                                <a href="/permission/{{ $permission->id }}/edit" class="p-2 bg-blue-500 text-white rounded mx-1">Editar</a>
                                <form method="POST" class="mx-1" action=" {{ route('permission.destroy', $permission->id) }}">
                                    @method('DELETE')
                                    @csrf

                                    <button type="submit" class="p-2 bg-red-500 text-white rounded">{{ __('Excluir') }}</button>
                                </form>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>