<div id="overlay"
    class="hidden lg:hidden absolute w-full h-screen opacity-50 bg-default-black transition-all duration-150 ease-in-out">
</div>
<div id="sideBar"
    class=" text-base absolute lg:static z-10 h-screen bg-secondary-500 w-3/4 lg:w-[232px] shrink-0 bg-white shadow-sm  px-4 py-4 -translate-x-full lg:translate-x-0 transition-all duration-150 ease-in-out rounded-r-lg lg:rounded-[0px]">
    <div class="flex items-center justify-between lg:justify-center py-4 px-2">
        <h6 class="text-lg text-neutral-30 font-formula1">Views</h6>
        <img onclick="closeSideBar()" class="lg:hidden hover:cursor-pointer"
            src="{{ asset('icons/admin-dashboard/cancel-icon.svg') }}" alt="" />
    </div>

    <x-sidebar-item title="Products" href="admin.products-view" />
    <x-sidebar-item title="User Accounts" href="admin.user-accounts-view" />
    <x-sidebar-item title="Customer Enquiries" href="admin.customer-enquiries-view" />
    <x-sidebar-item title="Orders" href="admin.orders-view" />
</div>

<script>
    function closeSideBar() {
        let sideBar = document.getElementById("sideBar");
        let overlay = document.getElementById("overlay");

        overlay.classList.add("hidden");
        sideBar.classList.add("-translate-x-full");
    }

    function OpenSideBar() {
        let sideBar = document.getElementById("sideBar");
        let overlay = document.getElementById("overlay");



        overlay.classList.remove("hidden");
        sideBar.classList.remove("-translate-x-full");
    }
</script>
