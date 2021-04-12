<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Edit') }}
        </h2>
    </x-slot>
var_dump($product);
    exit;
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form method="POST" action="{{ route('product.update', [ $product->id, app()->getLocale()  ] )}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="EAN" class="block text-sm font-medium text-gray-700">Ean</label>
                            <input type="text" name="ean" id="ean" value="{{$product->ean}}"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" value="{{$product->name}}"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                            <input type="text" name="type" id="type" value="{{$product->type}}"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="color" class="block text-sm font-medium text-gray-700">Color</label>
                            <select id="color" name="color" value="{{$product->color}}"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($colors as $color)
                                    <option>{{ $color->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-3">
                            <label for="weight" class="block text-sm font-medium text-gray-700">Weight</label>
                            <input type="text" name="weight" id="weight" value="{{$product->weight}}"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select id="status" name="status" value="{{$product->active}}"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option>Active</option>
                                <option>Not Active</option>
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" name="image" id="image"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                            <input type="text" name="price" id="price" value="{{$price}}"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <input type="text" name="quantity" id="quantity" value="{{$quantity}}"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <div>
                            <div class="text-left text-red-600 col-span-6 sm:col-span-6 lg:col-span-2">
                                @if ($errors->any())
                                    <div>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <button type="submit"
                                        class="inline-flex ml-64 justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
        </form>
    </div>
    </div>
    </div>
</x-app-layout>
