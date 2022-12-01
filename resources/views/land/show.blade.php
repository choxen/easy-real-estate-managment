<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View land') }}
        </h2>
    </x-slot>

    <div class="w-full flex flex-col gap-5">
        <div class="w-full flex justify-center mt-10">
            <a href={{ route('land.edit', $land) }}
                class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-4 border rounded">
                Update land
            </a>
        </div>
        <div class="w-full flex justify-center">
            <div
                class="rounded-lg shadow-lg w-2/4 gap-5 text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <div class="p-6 text-center">
                    <h5 class="text-xl font-medium mb-2 text-gray-900">Property ID:</h5>
                    <p class="text-base">
                        {{ $land->property_id }}
                    </p>
                </div>

                <div class="p-6 text-center">
                    <h5 class="text-xl font-medium mb-2 text-gray-900">Cadastral sign:</h5>
                    <p class="text-base">
                        {{ $land->cadastral_sign }}
                    </p>
                </div>

                <div class="p-6 text-center">
                    <h5 class="text-xl font-medium mb-2 text-gray-900">Total area:</h5>
                    <p class="text-base">
                        {{ $land->total_area }}
                    </p>
                </div>

                <div class="p-6 text-center">
                    <h5 class="text-xl font-medium mb-2 text-gray-900">Measurement date:</h5>
                    <p class="text-base">
                        {{ $land->measurement_date }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
