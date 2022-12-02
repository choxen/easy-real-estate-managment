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

        <div class="w-full">
            <div class="flex flex-col gap-5">
                <div class="w-full flex justify-center">
                    <a href={{ route('land.create', $property) }}
                        class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-4 border rounded">
                        Create land
                    </a>
                </div>
                <div class="overflow-x-auto w-full flex justify-center">
                    <table class="w-2/4 text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    ID
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Property ID
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Cadastral sign
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Total area
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Measurement date
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lands as $land)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" id="land-col"
                                    data-url={{ route('land.show', $land) }}>
                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $land->id }}
                                    </th>
                                    <td class="py-4 px-6">
                                        {{ $land->property_id }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $land->cadastral_sign }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $land->total_area }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $land->status }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="justify-center">
                    {{ $lands->links() }}
                </div>
            </div>
            @vite('resources/js/functions/land.js')
        </div>
    </div>
</x-app-layout>
