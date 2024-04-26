@extends('components.mainlayout')
@section('maincontent')


<div>
    <h1>This is compare page</h1>
    @isset($products)
        @foreach ($products as $product)

        @endforeach
    @endisset
</div>


@endsection
