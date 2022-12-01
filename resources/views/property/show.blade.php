<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View property') }}
        </h2>
    </x-slot>

    <div class="w-full flex flex-col gap-5">
        <div class="w-full flex justify-center mt-10">
            <a href={{ route('property.edit', $property) }}
                class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-4 border rounded">
                Update property
            </a>
        </div>
        <div class="w-full flex justify-center">
            <div
                class="rounded-lg shadow-lg w-2/4 gap-5 text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <div class="p-6 text-center">
                    <h5 class="text-xl font-medium mb-2 text-gray-900">Client ID:</h5>
                    <p class="text-base">
                        {{ $property->client_id }}
                    </p>
                </div>

                <div class="p-6 text-center">
                    <h5 class="text-xl font-medium mb-2 text-gray-900">Name:</h5>
                    <p class="text-base">
                        {{ $property->name }}
                    </p>
                </div>

                <div class="p-6 text-center">
                    <h5 class="text-xl font-medium mb-2 text-gray-900">Cadastral number:</h5>
                    <p class="text-base">
                        {{ $property->cadastral_number }}
                    </p>
                </div>

                <div class="p-6 text-center">
                    <h5 class="text-xl font-medium mb-2 text-gray-900">Status:</h5>
                    <p class="text-base">
                        {{ $property->status }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
