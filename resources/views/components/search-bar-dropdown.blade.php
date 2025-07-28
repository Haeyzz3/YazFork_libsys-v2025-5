<!-- Search Bar -->
<div class="relative z-60 w-full px-4 mt-8" >
    <div class="flex justify-center" >
        <div class="flex-1 max-w-3xl w-full relative search-container" >
            <div class="flex" >
                <!-- Dropdown on the left -->
                <div class="relative flex-shrink-0" >
                    <button id="searchTypeBtn"
                            class="flex items-center justify-between px-4 py-3 border border-gray-300 rounded-l-md bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-usepmaroon min-w-[180px]" >
                        <span id="searchTypeLabel" class="whitespace-nowrap flex-shrink-0" >All</span >
                        <i class="fas fa-chevron-down text-usepmaroon ml-3" ></i >
                    </button >
                    <div id="searchTypeDropdown"
                         class="absolute left-0 top-full mt-1 w-56 bg-white border border-gray-300 rounded-md shadow-lg z-50 hidden" >
                        <div
                            class="dropdown-item px-4 py-2 cursor-pointer flex items-center border-b border-gray-100"
                            data-type="Books" >
                            <i class="fas fa-book mr-2 text-usepmaroon" ></i > Books
                        </div >
                        <div
                            class="dropdown-item px-4 py-2 cursor-pointer flex items-center border-b border-gray-100"
                            data-type="Electronic Collection" >
                            <i class="fas fa-laptop-code mr-2 text-usepmaroon" ></i > Electronic Collection
                        </div >
                        <div
                            class="dropdown-item px-4 py-2 cursor-pointer flex items-center border-b border-gray-100"
                            data-type="Periodical Magazine" >
                            <i class="fas fa-newspaper mr-2 text-usepmaroon" ></i > Periodical Magazine
                        </div >
                        <div class="dropdown-item px-4 py-2 cursor-pointer flex items-center"
                             data-type="Thesis and Dissertation" >
                            <i class="fas fa-graduation-cap mr-2 text-usepmaroon" ></i > Thesis and Dissertation
                        </div >
                    </div >
                </div >
                <!-- Search input -->
                <input type="text" placeholder="Search Books..."
                       class="bg-white w-full px-4 py-3 border-t border-b border-r border-gray-300 focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon focus:outline-none" >
                <button
                    class="px-6 py-3 bg-usepmaroon text-white rounded-r-md hover:bg-usepmaroon/90 transition flex items-center justify-center shadow hover:shadow-md" >
                    <i class="fas fa-search" ></i >
                    <span class="ml-2 hidden md:inline" >Search</span >
                </button >
            </div >
        </div >
    </div >
</div >
