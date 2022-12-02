<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="w-full mt-5">
        <div class="flex flex-col gap-5">
            <div class="w-full flex justify-center">
                <a href={{ route('client.create') }}
                    class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-4 border rounded">
                    Create client
                </a>
            </div>
            <div class="overflow-x-auto w-full flex justify-center">
                <table class="w-2/4 text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6 text-center">
                                Client ID
                            </th>
                            <th scope="col" class="py-3 px-6 text-center">
                                Total properties area
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" id="client-col"
                                data-url={{ route('client.show', $client) }}>
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                    {{ $client->id }}
                                </th>
                                <td class="py-4 px-6 text-center">
                                    {{ $client->totalPropertiesArea() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="justify-center">
                {{ $clients->links() }}
            </div>
        </div>
        @vite('resources/js/functions/client.js')
    </div>
</x-app-layout>
