<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Wishlist') }}
        </h2>
    </x-slot>

    <div class="px-4 py-8 sm:px-6 lg:px-8">
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">

                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Title</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Publisher</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Release Date</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Pages</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">View</span>
                                    <span class="sr-only">Remove</span>
                                </th>
                            </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($wishlist as $item)
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        <a href="{{ route('books.show', $item->book->slug )}}"> {{ $item->book->title }} </a></td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->book->publisher->name }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->book->publish_date->format('d/m/Y') }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->book->pages }}</td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="{{ route('books.show', $item->book->slug) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                        <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="text-indigo-600 hover:text-indigo-900">
                                                Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                        {{ $wishlist->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
