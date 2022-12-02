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
                    <h5 class="text-xl font-medium mb-2 text-gray-900">ID:</h5>
                    <p class="text-base">
                        {{ $land->id }}
                    </p>
                </div>

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

        <div class="w-full">
            <div class="flex flex-col gap-5">
                <div class="w-full flex justify-center">
                    <a href={{ route('area.create', $land) }}
                        class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-4 border rounded">
                        Create area
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
                                    Land ID
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Type
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Area covered
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($areas as $area)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" id="area-col"
                                    data-url={{ route('area.show', $area) }}>
                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $area->id }}
                                    </th>
                                    <td class="py-4 px-6">
                                        {{ $area->land_id }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $area->type }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $area->area_covered }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="justify-center">
                    {{ $areas->links() }}
                </div>
            </div>
            @vite('resources/js/functions/area.js')
        </div>
    </div>
</x-app-layout>
