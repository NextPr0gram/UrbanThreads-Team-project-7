<div class="flex items-center border-b-2 border-bluish-purple ">
    <img class="m-2 h-16 sm:h-24 aspect-square border-3 border-bluish-purple object-cover object-center"
        src="https://ih1.redbubble.net/image.339900741.3490/ssrco,triblend_tee,mens,navy_triblend,front,square_product,x600-bg,f8f8f8.u4.jpg"
        alt=""
    />
    <div class="flex w-full flex-col p-4">
        <div class="flex justify-between items-center max-w-lg lg:max-w-full">
            <div class="flex justify-between flex-col">
                <h2 class="text-md sm:text-lg font-formula1">{{ $productName }}</h2>
                <p class="text-base font-formula1">{{ $price }}</p>
            </div>
            {{-- counter --}}
            <div class="flex ">
                <button id="decrement" class="hover:bg-bluish-purple hover:text-snow-white transition-colors ease-in-out duration-300 p-3 h-12 border-l-2 border-t-2 border-b-2 border-bluish-purple focus:outline-none">
                    -
                </button>
                <input style="-webkit-appearance: none; margin: 0; -moz-appearance: textfield;" class="w-12 md:w-24 h-12 text-center bg-transparent border-2 border-bluish-purple " type="number" value="1" id="quantity" oninput="validity.valid||(value='1');" >
                <button id="increment" class="hover:bg-bluish-purple hover:text-snow-white transition-colors ease-in-out duration-300 p-3 h-12 border-r-2 border-t-2 border-b-2 border-bluish-purple focus:outline-none">
                    +
                </button>
            </div>
            {{-- TODO: implement remove product --}}
            <div x-data="{ showRemoveText: window.innerWidth > 768 }" x-init="() => { window.addEventListener('resize', () => { showRemoveText = window.innerWidth > 768 }); }">
                <a href="#" class="text-red" x-show="showRemoveText">Remove</a>
                <a href="#" class="text-red text-2xl font-formula1" x-show="!showRemoveText"><img src="{{asset('icons/utility/cancel-icon.png')}}" alt=""></a>
            </div>
        </div>
    </div>
</div>

{{-- script for working product counter --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var quantityInput = document.getElementById("quantity");
        var decrementButton = document.getElementById("decrement");
        var incrementButton = document.getElementById("increment");

        decrementButton.addEventListener("click", function() {
            updateQuantity(-1);
        });

        incrementButton.addEventListener("click", function() {
            updateQuantity(1);
        });

        function updateQuantity(amount) {
            var currentValue = parseInt(quantityInput.value, 10);
            var newValue = currentValue + amount;

            // Ensure the quantity doesn't go below 1
            if (newValue < 0) {
                newValue = 0;
            }

            quantityInput.value = newValue;
        }
    });
</script>

</body>
</html>
