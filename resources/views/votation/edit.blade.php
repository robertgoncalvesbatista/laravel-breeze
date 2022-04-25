<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar votação') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>

                <div class="p-6 bg-white border-b border-gray-200 mt-4">
                    <form method="POST" action="{{ route('votation.update', $votation->id) }}">
                        @method('PUT')
                        @csrf

                        <div>
                            <x-label for="company" :value="__('Empresa')" />
                            <x-input id="company" class="block mt-1 w-full" type="text" name="company" value="{{$votation->company}}" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="cnpj" :value="__('CNPJ')" />
                            <x-input id="cnpj" class="block mt-1 w-full" type="text" name="cnpj" value="{{$votation->cnpj}}" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="opening_at" :value="__('Abertura às')" />
                            <x-input id="opening_at" class="block mt-1 w-full" type="datetime-local" name="opening_at" value="{{$votation->opening_at}}" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="closing_at" :value="__('Encerramento às')" />
                            <x-input id="closing_at" class="block mt-1 w-full" type="datetime-local" name="closing_at" value="{{$votation->closing_at}}" required />
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