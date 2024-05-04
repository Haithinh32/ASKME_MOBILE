@extends('components.mainlayout')
@section('maincontent')

    <body class="bg-orange-200 bg-no-repeat bg-cover bg-center" style='background-image: url({{$brand->blogo}});'>

        <div class="container mx-auto px-4 py-8">

            <h2 class="text-3xl font-bold text-center my-8">{{ $brand->bname }} Products</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($products as $product)
                    <div class="rounded-lg shadow-md overflow-hidden bg-white">
                        <img src="{{ asset($product->image) }}" class="w-full h-48 object-cover" alt="{{ $product->pname }}">
                        <div class="p-4">
                            <h3 class="text-xl font-bold">{{ $product->pname }}</h3>
                            <p class="text-gray-700 mb-2">{{ $product->description }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-red-500 font-bold">{{ $product->price }}₫</span>
                                <button
                                    class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md font-semibold focus:outline-none">
                                    View More
                                </button> 
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-center mt-8">
                @if ($products->links())
                    {!! $products->links('pagination::tailwind') !!}
                @endif
            </div>
        </div>

    </body>
@endsection
