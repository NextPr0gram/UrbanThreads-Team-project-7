@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="grid grid-cols-2  grid-rows-6 md:grid-cols-4 md:grid-rows-3 gap-4 px-4">
        <div class="rounded-lg p-4 border border-neutral-30 row-start-1">
            <h6 class="text-neutral-400">Users</h6>
            <p class="text-2xl font-formula1 text-neutral-900">{{$numberOfusers}}</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-1">
            <h6 class="text-neutral-400">Products</h6>
            <p class="text-2xl font-formula1 text-neutral-900">{{$numberOfProducts}}</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-2 md:row-start-1">
            <h6 class="text-neutral-400">Total orders</h6>
            <p class="text-2xl font-formula1 text-neutral-900">{{$numberOfTotalOrders}}</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-2 md:row-start-1">
            <h6 class="text-neutral-400">Orders placed</h6>
            <p class="text-2xl font-formula1 text-neutral-900">{{$ordersPlaced}}</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-3 md:row-start-2">
            <h6 class="text-neutral-400">Orders processing</h6>
            <p class="text-2xl font-formula1 text-neutral-900">{{$ordersProcessing}}</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-3 md:row-start-2">
            <h6 class="text-neutral-400">Orders dispatched</h6>
            <p class="text-2xl font-formula1 text-neutral-900">{{$ordersDispatched}}</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-4 md:row-start-2">
            <h6 class="text-neutral-400">Orders delivered</h6>
            <p class="text-2xl font-formula1 text-neutral-900">{{$ordersDelivered}}</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-4 md:row-start-2">
            <h6 class="text-neutral-400">Orders cancelled</h6>
            <p class="text-2xl font-formula1 text-neutral-900">{{$ordersCancelled}}</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-5 md:row-start-3">
            <h6 class="text-neutral-400">Orders returned</h6>
            <p class="text-2xl font-formula1 text-neutral-900">{{$ordersReturned}}</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-5 md:row-start-3">
            <h6 class="text-neutral-400">Enquiries</h6>
            <p class="text-2xl font-formula1 text-neutral-900">{{$numberOfEnquiries}}</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-6 md:row-start-3">
            <h6 class="text-neutral-400">New enquiries</h6>
            <p class="text-2xl font-formula1 text-neutral-900">{{$newEnquiries}}</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-6 md:row-start-3">
            <h6 class="text-neutral-400">Enquiries processed</h6>
            <p class="text-2xl font-formula1 text-neutral-900">{{$enquiriesProcessed}}</p>
        </div>

    </div>
@endsection
