<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                {!!$current->iframe!!}
            </div>

            <h1 class="text-3xl text-gray-600 font-bold mt-4">
                {{$current->name}}
            </h1>

            @if($current->description)
                <div class="text-gray-600">
                    {{$current->description->name}}
                </div>
            @endif

            <div class="flex items-center mt-4 cursor-pointer" wire:click="completed">
                
                @if($current->completed)
                    <i class="fas fa-toggle-on text-2xl text-green-600"></i>
                @else
                    <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                @endif

                <p class="tet-sm ml-2">Marcar como terminada</p>
            </div>

            <div class="card mt-2">
                <div class="card-body flex text-gray-500 font-bold">
                    @if($this->previous)
                        <a wire:click="changeLesson({{$this->previous}})" class="cursor-pointer">Tema anterior</a>
                    @endif

                    @if ($this->next)
                        <a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer">Siguiente Tema</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl leading-8 text-center mb-4">
                    {{$course->title}}
                </h1>
                <div class="flex items-center">
                    <figure>
                        <img src="{{$course->teacher->profile_photo_url}}" class="h-12 w-12 object-cover rounded-full shadow-lg mr-4" alt="">
                    </figure>

                    <div>
                        <p>Prof. {{$course->teacher->name}}</p>
                        <a class="text-blue-500 text-sm" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                    </div>
                </div>

                <p class="text-gray-600 text-sm mt-2">{{$this->advance . '%'}} Completado</p>
                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                      <div style="width:{{$this->advance . '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500"></div>
                    </div>
                </div>

                <ul>
                    @foreach ($course->sections as $section)
                        <li class="text-gray-600 mb-4">
                            <a class="font-bold text-base inline-block mb-2">{{$section->name}}</a>
                            <ul>
                                
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex">
                                        <div>
                                            {{-- Si la secci??n est?? completada se marca de color amarillo, sino de color gris --}}
                                            @if ($lesson->completed)
                                            {{-- Si el id de current es igual a la lecci??n se pinta el border del circulo  --}}
                                                @if($current->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-yellow-300 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-yellow-300 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @else

                                                @if($current->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-gray-500 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-gray-500 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @endif
                                        </div>
                                            <a class="cursor-pointer" wire:click="changeLesson({{$lesson}})">{{$lesson->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
