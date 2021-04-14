<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product List') }}
            <form method="GET" action="{{ route('product.create', ['language' => app()->getLocale()] ) }}">
                <div class="text-right sm:px-6">
                    <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{__('New Product')}}
                    </button>
                </div>
            </form>
        </h2>
    </x-slot>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{__('Ean')}}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{__('Title')}}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{__('Type')}}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{__('Color')}}
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{__('Weight')}}
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{__('Status')}}
                            </th>

                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                {{__('Image')}}
                            </th>

                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">{{__('Edit')}}</span>
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">{{__('Remove')}}</span>
                            </th>

                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($products as $product)
                            <tr>
                                <th class="pl-4">{{ $product->ean }}</th>
                                {{ $errors->first() }}
                                <td class="pl-8">{{$product->name  }}</td>
                                <td class="pl-8">{{ $product->type }}</td>
                                <td class="pl-8">{{ $product->color }}</td>
                                <td class="pl-8">{{ $product->weight }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        @if($product->active)
                                            {{__('Active')}}
                                        @else
                                            {{__('Not Active')}}
                                        @endif
                                    </span>
                                </td>
                                <td><img src="{{ storage_path('app/public/storage/images'.$product->image) }}"></td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <form
                                        action={{ route('product.destroy', [  'product' => $product->id, 'language' => app()->getLocale()] )  }} method="POST">
                                        @csrf @method('delete')
                                        <input type="submit" class="text-red-600 hover:text-red-900"
                                               value="{{__('Remove') }}">
                                        <a href="{{route('product.edit', [  'product' => $product->id, 'language' => app()->getLocale()])}}" class="text-indigo-600 hover:text-indigo-900">
                                              {{__('Edit') }}</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-8">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
