<div class="lg:drawer-side !relative max-lg:!hidden !w-64"></div>
<div class="max-lg:drawer-side lg:fixed z-50 shadow-lg lg:z-[9999] lg:outline-base-content/20">
    <label for="sidebar-nav" aria-label="close sidebar" class="drawer-overlay"></label>
    <div class="max-w-full min-h-screen bg-base-100 shadow-lg">
        <div id="drawer-title-parent"
            class="w-full transition-all z-[1000] border-b-[1px] border-base-content/20 shadow navbar justify-center items-stretch lg:px-5 md:px-10">
            <div class="max-lg:container lg:w-full flex justify-between items-stretch">
                <div id="drawer-title"
                    class="text-xl font-semibold select-none rounded-sm px-5 flex justify-center items-center">Menu</div>
                <button data-compact="false" id="drawer-compactor" tabindex="1"
                    class="base-links rounded text-xl py-1 group">
                    <span class="icon-[ci--chevron-left-duo] group-data-[compact=true]:hidden"></span>
                    <span class="icon-[ci--chevron-right-duo] group-data-[compact=false]:hidden"></span>
                </button>
            </div>
        </div>

        <ul id="sidebar-ul" class="flex flex-col gap-2 px-6 py-2 w-64 menu-custom">
            <li>
                <input id="side-collapse-1" type="checkbox" class="hidden peer" />
                <label for="side-collapse-1" class="collapse-title p-0 min-h-0 peer-checked:mb-2">
                    <div class="drawer-links">
                        <span class="drawer-links-icon text-xl icon-[ic--round-home]"></span>
                        <span class="drawer-links-name">Beranda</span>
                    </div>
                </label>
                <ul class="collapse-content !pb-0">
                    <li>
                        <input id="side-collapse-1-1" type="checkbox" class="hidden peer" />
                        <label for="side-collapse-1-1" class="collapse-title p-0 min-h-0 peer-checked:mb-2">
                            <div class="drawer-links">
                                <span class="drawer-links-icon text-xl icon-[ic--round-home]"></span>
                                <span class="drawer-links-name">Beranda 1</span>
                            </div>
                        </label>
                        <ul class="collapse-content !pb-0">
                            <li class="drawer-links">
                                <span class="drawer-links-icon text-xl icon-[ic--round-home]"></span>
                                <span class="drawer-links-name">Beranda 2</span>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <a role="list" href="{{ route('dashboard') }}" class="drawer-links">
                <span class="drawer-links-icon text-xl icon-[ic--round-home]"></span>
                <span class="drawer-links-name">Dashboard</span>
            </a>
            <a role="list" href="{{ route('venues.index') }}" class="drawer-links">
                <span class="drawer-links-icon text-xl icon-[ic--round-home]"></span>
                <span class="drawer-links-name">Venue</span>
            </a>
            <a role="list" href="{{ route('categories.index') }}" class="drawer-links">
                <span class="drawer-links-icon text-xl icon-[ic--round-home]"></span>
                <span class="drawer-links-name">Category</span>
            </a>
            {{-- <li class="mb-1 max-lg:mb-4 rounded-full max-lg:opacity-0 max-w-full h-[2px] bg-primary/60"></li> --}}
        </ul>
    </div>
</div>
