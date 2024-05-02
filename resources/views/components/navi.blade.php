<div class="col-span-2">
    <div class="border rounded-lg m-2 bg-white">
        <div class="grid grid-cols-3 gap-2 navi-container">
            <ul class="col-span-1 items-center justify-center py-2">

                @foreach ($brands as $brand)
                    <li>
                        <div class="rounded-full overflow-hidden h-12 px-1 py-1 my-1">
                            <img src="{{ asset($brand->blogo) }}" alt="{{ $brand->bname }} Logo"
                                class="w-full h-full object-cover">
                        </div>
                    </li>
                @endforeach

            </ul>

            <ul class="col-span-2 space-y-2">

                @foreach ($brands as $brand)
                    <li>
                        <div class="hover:bg-gray-100 h-12 py-1">
                            <a href="#"
                                class="text-gray-700 font-medium text-sm hover:underline">{{ $brand->bname }}</a>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
