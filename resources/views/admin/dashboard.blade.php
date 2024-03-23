@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="grid grid-cols-2  grid-rows-4 md:grid-cols-4 md:grid-rows- gap-4 px-4">
        <div class="rounded-lg p-4 border border-neutral-30 row-start-1">
            <h6 class="text-neutral-400">Number of users</h6>
            <p class="text-2xl font-formula1 text-neutral-900">100</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-1">
            <h6 class="text-neutral-400">Number of products</h6>
            <p class="text-2xl font-formula1 text-neutral-900">100</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-2 md:row-start-1">
            <h6 class="text-neutral-400">Number of orders</h6>
            <p class="text-2xl font-formula1 text-neutral-900">100</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-2 md:row-start-1">
            <h6 class="text-neutral-400">Number of enquiries</h6>
            <p class="text-2xl font-formula1 text-neutral-900">100</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-3 md:row-start-2">
            <h6 class="text-neutral-400">Orders to process</h6>
            <p class="text-2xl font-formula1 text-neutral-900">100</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-3 md:row-start-2">
            <h6 class="text-neutral-400">Orders processing</h6>
            <p class="text-2xl font-formula1 text-neutral-900">100</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-4 md:row-start-2">
            <h6 class="text-neutral-400">Orders dispatched</h6>
            <p class="text-2xl font-formula1 text-neutral-900">100</p>
        </div>
        <div class="rounded-lg p-4 border border-neutral-30 row-start-4 md:row-start-2">
            <h6 class="text-neutral-400">Orders delivered</h6>
            <p class="text-2xl font-formula1 text-neutral-900">100</p>
        </div>

    </div>
@endsection
