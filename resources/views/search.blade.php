@extends('components.mainlayout')
@section('maincontent')

<body class="bg-orange-200">
    <div class="main-content">
        <div class="grid grid-cols-12">
            <h1 class="m-2 col-span-2 font-bold">Search Result</h1>
            @if (!(count($listproducts)==0))
            <div class="m-2 col-span-12 border rounded-lg bg-gray-200 grid-cols-12 grid">
                @foreach($listproducts as $product)
                <div class="m-2 col-span-3 border rounded-lg bg-white">
                    <div class="m-2"><img src="{{ asset($product->image) }}" class="rounded-lg w-100" /></div>
                    <div class="m-2 font-bold">{{ $product->pname }}</div>
                    <div class="m-2 text-red-500">{{ $product->price }}₫</div>
                    <div class="m-2">{{ $product->description }}</div>
                    {{-- <a href="{{ route('download.product.docx', $product->id) }}" class="btn btn-primary">Download DOCX</a> --}}
                </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                @if ($listproducts->links())
                {!! $listproducts->links('pagination::tailwind') !!}
                @endif
            </div>

            @else
            <div class="col-span-12">
                <p>No match result</p>
            </div>
            @endif
        </div>
    </div>
    @endsection