<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show client') }}
        </h2>
    </x-slot>

    <div class="w-full flex flex-col gap-5">
        <div class="w-full flex justify-center mt-10">
            <a href={{ route('client.edit', $client) }}
                class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-4 border rounded">
                Update client
            </a>
        </div>
        <div class="w-full flex justify-center">
            <div
                class="rounded-lg shadow-lg w-2/4 gap-5 text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <div class="p-6 text-center">
                    <h5 class="text-xl font-medium mb-2 text-gray-900">ID:</h5>
                    <p class="text-base">
                        {{ $client->id }}
                    </p>
                </div>
                @if ($client->type === App\Models\Client::TYPE_PRIVATE)
                    <div class="p-6 text-center">
                        <h5 class="text-xl font-medium mb-2 text-gray-900">First name:</h5>
                        <p class="text-base">
                            {{ $client->name }}
                        </p>
                    </div>

                    <div class="p-6 text-center">
                        <h5 class="text-xl font-medium mb-2 text-gray-900">Last name:</h5>
                        <p class="text-base">
                            {{ $client->last_name }}
                        </p>
                    </div>

                    <div class="p-6 text-center">
                        <h5 class="text-xl font-medium mb-2 text-gray-900">Personal code:</h5>
                        <p class="text-base">
                            {{ $client->personal_code }}
                        </p>
                    </div>
                @else
                    <div class="p-6 text-center">
                        <h5 class="text-xl font-medium mb-2 text-gray-900">Comapny name:</h5>
                        <p class="text-base">
                            {{ $client->company_name }}
                        </p>
                    </div>
                    <div class="p-6 text-center">
                        <h5 class="text-xl font-medium mb-2 text-gray-900">Comapny reg nr:</h5>
                        <p class="text-base">
                            {{ $client->company_reg_nr }}
                        </p>
                    </div>
                @endif
            </div>
        </div>


        <div class="w-full">
            <div class="flex flex-col gap-5">
                <div class="w-full flex justify-center">
                    <a href={{ route('property.create', $client) }}
                        class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-4 border rounded">
                        Create property
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
                                    Name
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Cadastral number
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $property)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" id="property-col"
                                    data-url={{ route('property.show', $property) }}>
                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $property->id }}
                                    </th>
                                    <td class="py-4 px-6">
                                        {{ $property->name }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $property->cadastral_number }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $property->status }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="justify-center">
                    {{ $properties->links() }}
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/functions/property.js')
</x-app-layout>
