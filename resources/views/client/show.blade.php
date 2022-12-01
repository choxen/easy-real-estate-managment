<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create client') }}
        </h2>
    </x-slot>

    <div class="w-full flex justify-center">
        <div
            class="rounded-lg shadow-lg w-2/4 mt-10 gap-5 text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
</x-app-layout>
