<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Collaborators Channel') }}
    </h2>
</x-slot>

<div class="">
    <div class="">
        <div class="min-h-screen bg-gray-100">
          
            @include('layouts.collaborators.header')

            <div class="py-10">
                <div class="max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
                    <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
                        <!-- sidebar -->
                        @include('layouts.collaborators.sidebar')
                        <!-- sidebar -->
                    </div>
                    <main class="xl:col-span-10 lg:col-span-9">
                        <div class="mt-4">
                            <div class="w-full">
                                <x-auth-session-status-custom class="mt-4 mb-4" :status="session('status')" />
                            </div>
                                episode view
                        </div>
                    </main>
                    <!-- aside -->

                    <!-- aside -->
                </div>
            </div>
        </div>
    </div>
</div>
