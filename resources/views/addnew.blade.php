
@extends('components.mainlayout')
@section('maincontent')
<style>
    .main-content {
        max-width: 80%;
        margin: auto;
        display: flex;
        align-items: center;
    }
</style>
    <div class="container">
    @if(session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg grid grid-cols-3">
                    <div class="col-span-2">
                        <div class="p-6 text-black ">
                            <form action="{{ route('addnew') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="product Name" class="form-label">Product Name:</label>
                                    <input type="text" class="form-control" id="pname" name="pname" require>
                                </div>
                                <div class="mb-3">
                                    <label for="blogo" class="form-label">Brand logo:</label>
                                    <input type="file" class="form-control" id="blogo" name="blogo" require>
                                </div>
                                <div class="mb-3">
                                    <label for="bname" class="form-label">Product Brand:</label>
                                    <input type="text" class="form-control" id="bname" name="bname" require>
                                </div>
                                <div class="mb-3">
                                    <label for="cname" class="form-label">Product Chipname:</label>
                                    <input type="text" class="form-control" id="cname" name="cname" require>
                                </div>
                                <div class="mb-3">
                                    <label for="ram" class="form-label">Product Ram:</label>
                                    <input type="number" class="form-control" id="ram" name="ram" require>
                                </div>
                                <div class="mb-3">
                                    <label for="disk" class="form-label">Product Disk:</label>
                                    <input type="number" class="form-control" id="disk" name="disk" require>
                                </div>
                                <div class="mb-3">
                                    <label for="battery" class="form-label">Product Battery:</label>
                                    <input type="number" class="form-control" id="battery" name="battery" require>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">image:</label>
                                    <input type="file" class="form-control" id="image" name="image" require>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price:</label>
                                    <input type="number" class="form-control" id="price" name="price" require>
                                </div>
                                <div class="mb-3">
                                    <label for="product Desc" class="form-label">product Desc:</label>
                                    <input type="text_field" class="form-control" id="description" name="description" require>
                                </div>
                                <button type="submit" class="btn btn-primary">add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection