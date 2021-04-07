<x-app-layout>
@include('history.history-nav')
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 w-3/4">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="m-9  min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Created At
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-left">
                            @foreach ($prices as $price)
                                <tr>
                                    <th class="pl-4">{{ $price->name }}</th>
                                    <td class="pl-8">{{ $price->price  }}</td>
                                    <td class="pl-8">{{ $price->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-8 p-10">
                            {{$prices->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

