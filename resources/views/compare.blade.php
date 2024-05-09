@extends('components.mainlayout')
@section('maincontent')

    <body class="bg-orange-200">
        <div class="container mx-auto ">
            <table class="table-auto w-full text-left table-bordered border-gray-400 overflow-scroll">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">
                            ID
                        </th>
                        <th class="px-4 py-2">
                            Brand
                        </th>
                        <th class="px-4 py-2">
                            Name
                        </th>
                        <th class="px-4 py-2">
                            Description
                        </th>
                        <th class="px-4 py-2">
                            Chip Name
                        </th>
                        <th class="px-4 py-2">
                            RAM
                        </th>
                        <th class="px-4 py-2">
                            DISK
                        </th>
                        <th class="px-4 py-2">
                            Battery
                        </th>
                    </tr>
                </thead>
                <tr class="hover:bg-gray-200 bg-white">
                    <td class="px-4 py-2 border-b border-gray-400">
                        {{ $main_product->id }}
                    </td>
                    <td class="px-4 py-2 border-b border-gray-400">
                        {{ $main_product->bname }}
                    </td>
                    <td class="px-4 py-2 border-b border-gray-400">
                        {{ $main_product->pname }}
                    </td>
                    <td class="px-4 py-2 border-b border-gray-400">
                        {{ $main_product->description }}
                    </td>
                    <td class="px-4 py-2 border-b border-gray-400">
                        {{ $main_product->cname }}
                    </td>
                    <td class="px-4 py-2 border-b border-gray-400">
                        {{ $main_product->ram }}
                    </td>
                    <td class="px-4 py-2 border-b border-gray-400">
                        {{ $main_product->disk }}
                    </td>
                    <td class="px-4 py-2 border-b border-gray-400">
                        {{ $main_product->battery }}
                    </td>
                </tr>
                @isset($products_sb)
                    @foreach ($products_sb as $product)
                        <tr class="hover:bg-gray-200 bg-white">
                            <td class="px-4 py-2 border-b border-gray-400">
                                {{ $product->id }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-400">
                                {{ $product->bname }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-400">
                                {{ $product->pname }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-400">
                                {{ $product->description }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-400">
                                {{ $product->cname }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-400">
                                {{ $product->ram }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-400">
                                {{ $product->disk }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-400">
                                {{ $product->battery }}
                            </td>
                        </tr>
                    @endforeach
                @endisset
                @isset($products_db)
                    @foreach ($products_db as $product)
                        <tr class="hover:bg-gray-200 bg-white">
                            <td class="px-4 py-2 border-b border-gray-400">
                                {{ $product->id }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-400">
                                {{ $product->bname }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-400">
                                {{ $product->pname }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-400">
                                {{ $product->description }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-400">
                                {{ $product->cname }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-400">
                                {{ $product->ram }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-400">
                                {{ $product->disk }}
                            </td>
                            <td class="px-4 py-2 border-b border-gray-400">
                                {{ $product->battery }}
                            </td>
                        </tr>
                    @endforeach
                @endisset
            </table>
        </div>
    </body>

@endsection
