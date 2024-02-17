@extends('layouts.admin')

@section('title')
    Products
@endsection

@section('content')
    <div class="w-full h-full">
        <div class="grid grid-cols-2 grid-rows-1 gap-4 h-full w-full px-5  sm:px-8">
            <div class="rounded-lg border border-neutral-30 pl-4 pt-4 pr-4 h-full overflow-auto md:col-span-1 col-span-2">
                <table class="table-auto w-full divide-y divide-neutral-20">
                    <thead>
                        <tr class="text-left text-lg font-formula1">
                            <th>Product Name</th>
                            <th class="text-center">Total Stocks</th>
                            <th class="text-right">More Details</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-20">

                        <tr class="h-10">
                            <td class="align-middle flex items-center h-10  gap-4 "> <div class="w-6 aspect-square bg-primary-50 rounded-sm"><img src="" alt=""></div>Product Name</td>
                            <td class="text-center">50</td>
                            <td class="text-right"><button class="underline">More details</button></td>
                        </tr>

                        <tr class="h-10">
                            <td class="align-middle flex items-center h-10  gap-4 "> <div class="w-6 aspect-square bg-primary-50 rounded-sm"><img src="" alt=""></div>Product Name</td>
                            <td class="text-center">50</td>
                            <td class="text-right"><button class="underline">More details</button></td>
                        </tr>
                        <tr class="h-10">
                            <td class="align-middle flex items-center h-10  gap-4 "> <div class="w-6 aspect-square bg-primary-50 rounded-sm"><img src="" alt=""></div>Product Name</td>
                            <td class="text-center">50</td>
                            <td class="text-right"><button class="underline">More details</button></td>
                        </tr>



































                        {{-- example code for table row, add backend code --}}
                        {{-- <tr>
                            <td>Shining Star</td>
                            <td>Earth, Wind, and Fire</td>
                            <td>1975</td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
            <div>2</div>
        </div>

    </div>
@endsection
