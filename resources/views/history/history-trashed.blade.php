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
                                Id
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Deleted At
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 text-left">
                        @foreach ($details as $detail)
                            <tr>
                                <th class="pl-4">{{ $detail->id }}</th>
                                <td class="pl-8">{{ $detail->name  }}</td>
                                <td class="pl-8">{{ $detail->deleted_at }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-centered text-sm font-medium">
                                    <form action={{ route('history.destroy', $detail->id) }} method="POST">
{{--                                        <a class="text-indigo-600 hover:text-indigo-900"--}}
{{--                                           href={{ route('history.destroy', $detail->id) }}>Restore</a>--}}
                                        @csrf @method('delete')
                                        <input type="submit" class="text-red-600 hover:text-red-900" value="Restore"/>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
{{--                    <div class="mt-8 p-10">--}}
{{--                        {{$details->links()}}--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

