<form class="grid gap-6 mt-5" action="{{ route('checkout.discount') }}" method="POST">
    @csrf
    <div class="flex flex-col space-x-3 sm:flex-row">
        <x-text-input type="text" name="discount_code" class="w-full text-sm shadow-sm"
            placeholder="Enter a discount code here" />
        <div class="flex justify-center max-sm:mt-2">
            <x-primary-button>Apply</x-primary-button>
        </div>
    </div>
</form>
