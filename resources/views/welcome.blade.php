<x-app-layout>
    
    <section class="bg-cover" style="background-image: url({{asset('img/home/Fondo1.png')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">

            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">DYSMATH</h1>
                <p class="text-white text-lg mt-2 mp-4">
                    Es aplicación web interactiva destinada a niños de 6 a 9 años con discalculia,  para poder complementar el aprendizaje del individuo en el ámbito del razonamiento matemático.
                </p>
               @livewire('search')
            </div>
        </div>
    </section>

    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl mb-2">CONTENIDO</h1>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-100  w-full object-cover" src="{{asset('img/home/Logo1.png') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">
                       Actividades
                    </h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam.</p>

            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-100  w-full object-cover" src="{{asset('img/home/Logo2.png') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">
                        Meta
                    </h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam.</p>

            </article>
            
            <article>
                <figure>
                    <img class="rounded-xl h-100  w-full object-cover" src="{{asset('img/home/Logo3.png') }} " alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">
                        Niveles
                    </h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam.</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-100 w-full object-cover" src="{{asset('img/home/Logo4.png') }}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">
                        Interactividad
                    </h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ullam.</p>

            </article>
        </div>
    </section>

    <section class="mt-24 bg-gray-800 py-12">
        <h1 class="text-center text-white text-3xl">Contacto de Psicólogo</h1>
        <p class="text-center text-white" > 
            Romero Cervantes Paola Guadalupe <br>
            No. Cédula profesiona.: 709 641 9 / Ced prof. Estatal PEJ322857 <br>
            Email: pgr_3@hotmail.com <br>
            Consultorio: Calle Hospital 851, <br> 44200 Guadalajara, Jal. México <br>
            Número de Teléfono: +52 33 38 25 91 41
        </p>

        <center><div class="flex-justify-center mt-4">
            <a href="{{route('courses.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                INCIAR SESIÓN
            </a>              
        </div></center>
       
    </section>

    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600">ÚLTIMOS CURSOS</h1>
        <p class="text-center text-gray-500 text-sm mb-6"> Listado de cursos </p>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                <x-course-card :course="$course"/>
            @endforeach
        </div>
    </section>

    
</x-app-layout>
    
