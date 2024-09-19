<x-admin-wow-layout>
    <div class="p-10 h-screen ml-[17%] mt-[60px]">
        <div class="grid grid-cols-4 gap-10 mb-6">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Permissions</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the permissions in the system.</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <a href="{{ route('admin.permissions.create') }}" class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add permission</a>
            </div>
        </div>

        <div class="-mx-4 mt-8 sm:-mx-0">
            <table class="min-w-full divide-y divide-gray-300">
                <thead>
                <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Name</th>
                    {{--                            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 sm:table-cell">Title</th>--}}
                    {{--                            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Email</th>--}}
                    {{--                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Role</th>--}}
                    {{--                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">--}}
                    {{--                                <span class="sr-only">Edit</span>--}}
                    {{--                            </th>--}}
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                @foreach($permissions as $permission)
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                            <div class="flex items-center">
                                {{ $permission->name }}
                            </div>
                        </td>
                        {{--                                    <td class="hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500 sm:table-cell">Front-end Developer</td>--}}
                        {{--                                    <td class="hidden whitespace-nowrap px-3 py-4 text-sm text-gray-500 lg:table-cell">lindsay.walton@example.com</td>--}}
                        {{--                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Member</td>--}}
                        <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                            <div class="flex justify-end">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Edit</a>
                                    {{--                                            <a href="#" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">Delete</a>--}}
                                    <form method="POST" action="{{ route('admin.permissions.destroy', $permission->id) }}" onsubmit="return confirm('Are you sure?');" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- More people... -->
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-wow-layout>
