<div class="w-1/2 m-auto my-2">
    <div class="py-2">
        <div class="mx-auto">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Create New User</h2>
        </div>

        @if (session('success'))
            <div class="flex items-center mt-2 p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 "
                role="alert">
                <span class="sr-only">Info</span>
                <div>
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="mt-4">
            {{-- gunakan prevent di wire:submit untuk menonaktifkan submit bawaan dari html supaya tidak error --}}
            <form wire:submit.prevent="createNewUser" action="#" method="POST" class="space-y-6">
                <div>
                    <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
                    <div class="mt-2">
                        <input wire:model="name" id="name" type="text" name="name" autocomplete="name"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        @error('name')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500"><span
                                    class="font-medium">{{ $message }}</p>
                        @enderror

                    </div>
                </div>
                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input wire:model="email" id="email" type="email" name="email" autocomplete="email"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        @error('email')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500"><span
                                    class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                    </div>
                    <div class="mt-2">
                        <input wire:model="password" id="password" type="password" name="password"
                            autocomplete="current-password"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        @error('password')
                            <p class="mt-2 text-xs text-red-600 dark:text-red-500"><span
                                    class="font-medium">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <button
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
                        New User</button>
                </div>
            </form>
        </div>
    </div>

    <hr class="border my-1">
    <h2 class="font-semibold text-2xl mb-2">User List :</h2>
    <ul>
        @foreach ($users as $user)
            <li class="list-disc">{{ $user->name }}</li>
        @endforeach
    </ul>

</div>
