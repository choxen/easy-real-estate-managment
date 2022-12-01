<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create land') }}
        </h2>
    </x-slot>

    <div class="w-full flex justify-center">
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action={{ route('land.store') }}>
                @csrf

                <div class="mb-4">
                    @if ($errors->any())
                        <div class="bg-red-500 text-white rounded py-2 text-center">
                            <p> {{ $errors->first() }}</p>
                        </div>
                    @endif
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="property_id">
                        Property:
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="property_id" type="text" placeholder="Client name" name="property_id"
                        value={{ $property->id }} readonly>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="cadastral_sign">
                        Cadastral sign:
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="cadastral_sign" type="text" placeholder="Cadastral sign" name="cadastral_sign">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="total_area">
                        Total area:
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="total_area" type="text" placeholder="Total area" name="total_area">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="measurement_date">
                        Measurement date:
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="measurement_date" type="date" name="measurement_date">
                </div>

                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Create land
                    </button>
                </div>
            </form>
        </div>
    </div>

    @vite('resources/js/functions/client.js')
</x-app-layout>
