<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            <div class="w-full">
                <a href={{ route('client.create') }}
                    class="bg-slate-500 hover:bg-slate-700 text-white font-bold py-2 px-4 border rounded">
                    Create client
                </a>
            </div>
            <div class="overflow-x-auto relative">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                ID
                            </th>
                            <th scope="col" class="py-3 px-6">
                                First name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Last name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Personal code
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Company name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Company reg nr
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" id="client-col" data-url={{ route('client.show', $client)}}>
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $client->id }}
                                </th>
                                <td class="py-4 px-6">
                                    {{ $client->name }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $client->last_name }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $client->personal_code }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $client->company_name }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $client->company_reg_nr }}
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
    </div>
    @vite('resources/js/functions/client.js')
</x-app-layout>
