<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create property') }}
        </h2>
    </x-slot>

    <div class="w-full flex justify-center">
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post"
                action={{ route('property.store') }}>
                @csrf

                <div class="mb-4">
                    @if ($errors->any())
                        <div class="bg-red-500 text-white rounded py-2 text-center">
                            <p> {{ $errors->first() }}</p>
                        </div>
                    @endif
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="client_id">
                        Client
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="client_id" type="text" placeholder="Client name" name="client_id"
                        value={{ $client->id }} readonly>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="name" type="text" placeholder="Property name" name="name">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="cadastral_number">
                        Cadastral number
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="cadastral_number" type="text" placeholder="Cadastral number" name="cadastral_number">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                        Status
                    </label>

                    <select name="status" id="status"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach (App\Models\Property::statuses() as $status)
                            <option value={{ $status }}> {{ $status }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Create property
                    </button>
                </div>
            </form>
        </div>
    </div>

    @vite('resources/js/functions/client.js')
</x-app-layout>
