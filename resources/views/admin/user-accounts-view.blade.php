@extends('layouts.admin')

@section('title')
    <div class="flex items-center">
        <div class="flex-1 text-left pl-10 lg:pl-0">User Accounts</div>
    </div>
@endsection

@section('content')
    <div class="w-full h-full">
        <div class=" grid grid-cols-2 grid-rows-1 gap-4 h-full w-full px-5  sm:px-8">
            <div id="usersTable" class="lg:col-span-2 rounded-lg overflow-hidden lg:col-span-1 col-span-2">
                <div class="rounded-lg border border-neutral-30 pl-4 pt-4 pr-4 h-full overflow-auto ">
                    <table class="table-auto w-full divide-y divide-neutral-20 text-base">
                        <thead>
                            <tr class="text-left text-lg font-formula1">
                                <th class="text-left">Name</th>
                                <th class="text-left">Email</th>
                                <th class="text-left">Mobile number</th>
                                <th class="text-left">Address</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-20">

                            @foreach ($users as $user)
                                <tr class="h-10">
                                    <td class="text-left px-1">
                                        {{ $user->name }}
                                    </td>
                                    <td class="text-left px-1">{{ $user->email }}</td>
                                    @if ($user->mobile_number == null)
                                        <td class="text-left px-1">Not provided</td>
                                    @else
                                        <td class="text-left px-1">{{ $user->mobile_number }}</td>
                                    @endif
                                    @if ($user->address == null)
                                        <td class="text-left px-1">Not provided</td>
                                    @else
                                        <td class="text-left px-1">{{ $user->getAddress() }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
