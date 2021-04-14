<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Create') }}
        </h2>
    </x-slot>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form method="POST" action="{{ route('product.store', ['language' => app()->getLocale()] ) }}">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="EAN" class="block text-sm font-medium text-gray-700">{{__('Ean')}}</label>
                            <input type="text" name="ean" id="ean"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <div class="text-left text-red-600 col-span-6 sm:col-span-6 lg:col-span-2">
                                @if ($errors->any())
                                    {{ $errors->first('ean') }}
                                @endif
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">{{__('Title')}}</label>
                            <input type="text" name="name" id="name"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="type" class="block text-sm font-medium text-gray-700">{{__('Type')}}</label>
                            <input type="text" name="type" id="type"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <div class="text-left text-red-600 col-span-6 sm:col-span-6 lg:col-span-2">
                                @if ($errors->any())
                                    {{ $errors->first('type') }}
                                @endif
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="color" class="block text-sm font-medium text-gray-700">{{__('Color')}}</label>
                            <select id="color" name="color"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($colors as $color)
                                    <option>{{ $color->title }}</option>
                                @endforeach
                            </select>
                            <div class="text-left text-red-600 col-span-6 sm:col-span-6 lg:col-span-2">
                                @if ($errors->any())
                                    {{ $errors->first('color') }}
                                @endif
                            </div>
                        </div>

                        <div class="col-span-3">
                            <label for="weight" class="block text-sm font-medium text-gray-700">{{__('Weight')}}</label>
                            <input type="text" name="weight" id="weight"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <div class="text-left text-red-600 col-span-6 sm:col-span-6 lg:col-span-2">
                                @if ($errors->any())
                                    {{ $errors->first('weight') }}
                                @endif
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="status" class="block text-sm font-medium text-gray-700">{{__('Status')}}</label>
                            <select id="status" name="status"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option>true</option>
                                <option>false</option>
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="image" class="block text-sm font-medium text-gray-700">{{__('Image')}}</label>
                            <input type="file" name="image" id="image"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @if ($errors->any())
                                {{ $errors->first('image') }}
                            @endif
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="price" class="block text-sm font-medium text-gray-700">{{__('Price')}}</label>
                            <input type="text" name="price" id="price"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <div class="text-left text-red-600 col-span-6 sm:col-span-6 lg:col-span-2">
                                @if ($errors->any())
                                    {{ $errors->first('price') }}
                                @endif
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                            <label for="quantity"
                                   class="block text-sm font-medium text-gray-700">{{__('Quantity')}}</label>
                            <input type="text" name="quantity" id="quantity"
                                   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <div class="text-left text-red-600 col-span-6 sm:col-span-6 lg:col-span-2">
                                @if ($errors->any())
                                    {{ $errors->first('quantity') }}
                                @endif
                            </div>
                        </div>


                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{__('Save')}}
                            </button>
                        </div>
                    </div>
        </form>
    </div>
    </div>
    </div>
</x-app-layout>
