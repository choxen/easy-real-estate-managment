<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create client') }}
        </h2>
    </x-slot>

    <div class="w-full flex justify-center">
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post"
                action={{ route('client.store') }}>
                @csrf

                <div class="mb-4">
                    @if ($errors->any())
                        <div class="bg-red-500 text-white rounded py-2 text-center">
                            <p> {{ $errors->first() }}</p>
                        </div>
                    @endif
                </div>

                <div class="mb-4 inline-flex space-x-4 justify-center w-full type-options">
                    <div class="flex items-center">
                        <input id="type_private" type="radio" value="{{ App\Models\Client::TYPE_PRIVATE }}"
                            @if (request('type') != 1) then checked @endif name="type"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="type_private"
                            class="ml-2 font-bold text-sm text-gray-700 dark:text-gray-700">Private</label>
                    </div>
                    <div class="flex items-center">
                        <input id="type_legal" type="radio" value="{{ App\Models\Client::TYPE_LEGAL }}" name="type"
                            @if (request('type') == 1) then checked @endif
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="type_legal"
                            class="ml-2 font-bold text-sm text-gray-700 dark:text-gray-700">Legal</label>
                    </div>
                </div>

                @includeWhen(request('type') != 1, 'client.form-fields.private')

                @includeWhen(request('type') == 1, 'client.form-fields.legal')

                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Create client
                    </button>
                </div>
            </form>
        </div>
    </div>

    @vite('resources/js/functions/client.js')
</x-app-layout>
