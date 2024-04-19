<div
    class="w-full transition-all z-[1000] border-b-[1px] border-base-content/20 shadow navbar justify-center lg:px-5 md:px-10 sticky top-0 bg-base-100/75 backdrop-blur-lg">
    <div class="w-full lg:pe-10 flex justify-between">
        <div class="text-xl font-semibold select-none rounded-sm px-5 max-lg:ps-0">Dashboard</div>
        <div class="items-center flex gap-2 grow justify-end">
            <label for="sidebar-nav" aria-label="open sidebar" class="btn btn-circle btn-ghost lg:hidden">
                <span class="icon-[heroicons-solid--menu-alt-3] text-2xl"></span>
            </label>
            <div class="dropdown dropdown-bottom dropdown-end">
                <div tabindex="0" role="button" class="nav-links !flex">Theme</div>
                <ul tabindex="0"
                    class="dropdown-content outline outline-1 outline-base-content/10 z-[1] menu p-2 shadow bg-base-100 rounded w-52">
                    <li>
                        <input type="radio" class="hidden peer" name="slected-theme" id="theme-1">
                        <label for="theme-1" class="theme-changer peer-checked:bg-primary">
                            Item 1
                        </label>
                    </li>
                    <li>
                        <input type="radio" class="hidden peer" name="slected-theme" id="theme-2">
                        <label for="theme-2" class="theme-changer peer-checked:bg-primary">
                            Item 2
                        </label>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
