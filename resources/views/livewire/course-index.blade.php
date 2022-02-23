<div>
    <div class="bg-gray-200 py-4 mb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="focus:outline-none bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" wire:click="resetFilters">
                <i class="fa-solid fa-gamepad"></i>
                    Todos los cursos
            </button>
                 <!-- Dropdown categoria -->
                <div class="relative mr-4" x-data="{ open: false }">
                    <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true">
                        
                        <i class="fa-solid fa-tag text-sm mr-2"></i>
                            Categoría
                        <i class="fa-solid fa-angle-down text-sm ml-2"></i>
                    </button>
                    <!-- Dropdown Body -->
                    <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
                        @foreach ($categories as $category)
                            <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white" wire:click="$set('category_id', {{$category->id}})" x-on:click="open = false">{{$category->name}}</a>
                        @endforeach
                    </div>
                    <!-- // Dropdown Body -->
                </div>
                 <!-- Dropdown Niveles -->
                 <div class="relative" x-data="{ open: false }">
                    <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true">
                        
                        <i class="fa-solid fa-chess-knight"></i>
                            Niveles
                        <i class="fa-solid fa-angle-down text-sm ml-2"></i>
                    </button>
                    <!-- Dropdown Body -->
                    <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
                        @foreach ($levels as $level)
                            <a  class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white"  wire:click="$set('level_id', {{$level->id}})" x-on:click="open = false">{{$level->name}}</a>                            
                        @endforeach

                    </div>
                    <!-- // Dropdown Body -->
                </div>
                <!-- // Dropdown -->
        </div>
    </div>

    {{-- Mostramos los cursos --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course)
            <x-course-card :course="$course"/>
        @endforeach
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{$courses->links()}}
    </div>

</div>