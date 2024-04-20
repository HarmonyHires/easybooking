<div
    class="w-full transition-all z-[1000] border-b-[1px] border-base-content/20 shadow navbar justify-center lg:px-5 md:px-10 sticky top-0 bg-base-100/75 backdrop-blur-lg">
    <div class="w-full lg:pe-10 flex justify-between h-full items-stretch">
        <div class="text-xl font-semibold select-none rounded-sm px-5 max-lg:ps-0 flex items-center">Dashboard</div>
        <div class="items-center flex gap-2 grow justify-end h-full">
            <label for="sidebar-nav" aria-label="open sidebar" class="btn btn-circle btn-ghost lg:hidden">
                <span class="icon-[heroicons-solid--menu-alt-3] text-2xl"></span>
            </label>
            <div class="dropdown dropdown-bottom dropdown-end h-full">
                <div tabindex="0" role="button" class="nav-links !h-full !flex items-center">
                    <span
                        class="icon-[ic--twotone-palette] text-xl"></span>
                    <span>
                        Theme
                    </span>
                </div>
                <div tabindex="0"
                    class="dropdown-content h-80 overflow-auto outline outline-1 outline-base-content/10 z-[1] menu p-3 shadow bg-base-100 rounded md:w-96 w-60">
                    <ul id="theme-ul" class="gap-3 flex flex-col md:grid md:grid-flow-row md:grid-cols-2">
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
