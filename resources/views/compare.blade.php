@extends('components.mainlayout')
@section('maincontent')


<div>
    <form action="{{route("compare")}}" method="GET">
        <input type="text" name = "name" />
        <button>Find</button>
    <form>
    <h1>This is compare page</h1>
    @isset($products)
        @foreach ($products as $product)

        @endforeach
    @endisset
</div>


@endsection
