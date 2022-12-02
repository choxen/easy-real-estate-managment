<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create area') }}
        </h2>
    </x-slot>

    <div class="w-full flex justify-center">
        <div class="w-full max-w-xs">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="post" action={{ route('area.store') }}>
                @csrf

                <div class="mb-4">
                    @if ($errors->any())
                        <div class="bg-red-500 text-white rounded py-2 text-center">
                            <p> {{ $errors->first() }}</p>
                        </div>
                    @endif
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="land_id">
                        Land
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="land_id" type="text" placeholder="Land" name="land_id" value={{ $land->id }}
                        readonly>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="type">
                        Type
                    </label>

                    <select name="type" id="type"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach (App\Models\Area::types() as $type)
                            <option value="{{ $type }}"> {{ $type }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="area_covered">
                        Area covered
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="area_covered" type="text" placeholder="Area covered" name="area_covered">
                </div>

                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Create area
                    </button>
                </div>
            </form>
        </div>
    </div>

    @vite('resources/js/functions/client.js')
</x-app-layout>
