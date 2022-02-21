<section>
    <form wire:submit.prevent="updatePass">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
            <div class="bg-white py-6 px-4 sm:p-6">
                <div>
                    <h2 id="payment_details_heading" class="text-lg leading-6 font-medium text-gray-900">Password</h2>
                    <p class="mt-1 text-sm text-gray-500">Update your password.</p>
                </div>

                <div class="mt-6 grid grid-cols-4 gap-6">
                    <div class="col-span-4 sm:col-span-4">
                        <h3 class="text-md leading-6 font-medium text-gray-900">Old Password</h3>
                        <input wire:model="oldPass" type="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
                    </div>

                    <div class="col-span-4 sm:col-span-4">
                        <h3 class="text-md leading-6 font-medium text-gray-900">New Password</h3>
                        <input wire:model="newPass" type="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-gray-900 focus:border-gray-900 sm:text-sm" />
                    </div>

                    <div class="col-span-4 sm:col-span-4 text-right">
                        <button
                            type="submit"
                            class="bg-custom-pink border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex float-right text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                        >
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
