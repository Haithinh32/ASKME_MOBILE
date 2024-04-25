<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('edit product') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg grid grid-cols-3 flex">
                    <div class="col-span-2">
                        <div class="p-6 text-gray-900 dark:text-gray-100 ">
                            <form action="{{ route('updateproduct') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" id="id" name="id" value = "{{$products->id}}">
                                </div>
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Product Name:</label>
                                    <input type="text" class="form-control" id="productName" name="productName" placeholder="{{$products->productName}}">
                                </div>
                                <div class="mb-3">
                                    <label for="brandName" class="form-label">Brand Name:</label>
                                    <input type="text" class="form-control" id="brandName" name="brandName" placeholder="{{$products->brandName}}">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price:</label>
                                    <input type="number" class="form-control" id="price" name="price" placeholder="{{$products->price}}">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>