@extends('components.mainlayout')
@section('maincontent')
<style>
    .main-content {
        max-width: 80%;
        margin: auto;
        display: flex;
        align-items: center;
    }

    .text-right {
        text-align: right;
    }
</style>
<div class="bg-orange-200">
    <div class="main-content">
        <div class="grid grid-cols-12">
            <div class="col-span-12 bg-white flex m-2 border rounded-lg grid grid-cols-3 p-4">
                <div class="col-span-2">
                    {{ __('List product') }}
                </div>
                <div class="col-span-1 text-right">
                    <x-nav-link :href="route('addnew')" :active="request()->routeIs('addnew')">
                        {{ __('Add new') }}
                    </x-nav-link>
                </div>
            </div>
            <div class="border rounded-lg col-span-12 bg-white m-2">
                <table class=" col-span-12 table-auto text-center ">
                    <thead>
                        <tr>
                            <th class='p-3 w-1/12'>id</th>
                            <th class='p-3 w-2/12'>image</th>
                            <th class='p-3 w-2/12'>product Name</th>
                            <th class='p-3 w-2/12'>brand Name</th>
                            <th class='p-3 w-3/12'>description</th>
                            <th class='p-3 w-3/12'>price</th>
                            <th class='p-3 w-3/12'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listproducts as $product)
                        <tr>
                            <td class='p-3'>{{ $product->id }}</td>
                            <td class='p-3'><img src="{{ asset($product->image) }}" width="200" /></td>
                            <td class='p-3'>{{ $product->pname }}</td>
                            <td class='p-3'>{{ $product->bname }}</td>
                            <td class='p-3 text-left'>{{ $product->description }}</td>
                            <td class='p-3'>{{ $product->price }}</td>
                            <td class='p-3' class="inline-flex">
                                <form action="{{route('editproduct')}}" method="POST" id="editForm">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                                <a href="{{ route('deleteproduct', ['id' => $product->id]) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-span-12">
                    {{ $listproducts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection