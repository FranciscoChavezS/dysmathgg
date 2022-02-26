<div class="mb-4">
    {!! Form::label('title', 'Titulo del curso') !!}
    {!! Form::text('title',null, ['class' => 'form-input block- w-full mt-1'. ($errors->has('title') ? ' border-red-600' : '')]) !!}

    @error('title')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror

</div>

<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso') !!}
    {!! Form::text('slug',null, [ 'readonly' => 'readonly' ,'class' => 'form-input block- w-full mt-1'. ($errors->has('slug') ? ' border-red-600' : '')]) !!}

    @error('slug')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('subtitle', 'Subtítulo del curso') !!}
    {!! Form::text('subtitle',null, ['class' => 'form-input block- w-full mt-1'. ($errors->has('subtitle') ? ' border-red-600' : '')]) !!}

    @error('subtitle')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="mb-4">
    {!! Form::label('description', 'Descripción del curso') !!}
    {!! Form::textarea('description',null, ['class' => 'form-input block- w-full mt-1' . ($errors->has('description') ? ' border-red-600' : '')]) !!}

    @error('description')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

<div class="grid grid-cols-3 gap-4">
    <div>
        {!! Form::label('category_id', 'Categoría:') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-input block- w-full mt-1' ]) !!}
    </div>

    <div>
        {!! Form::label('level_id', 'Niveles:') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input block- w-full mt-1']) !!}
    </div>

    <div>
        {!! Form::label('price_id', 'Precio:') !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'form-input block- w-full mt-1']) !!}
    </div>
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del Curso</h1>

<div class="grid grid-cols-2 gap-4">
    <figure>
        {{-- Si la variable $course existe se muestra la imagen del curso --}}
        @isset($course->image)
            <img id="picture" class="w-full h-64 object-cover object-center rounded-xl" src="{{Storage::url($course->image->url)}}" alt="">
            @else 
                <img id="picture" class="w-full h-64 object-cover object-center rounded-xl" src="https://www.ghihornos.com/wp-content/uploads/2017/09/default.jpg" alt="">

        @endisset
    </figure>
    <div>
        <p class="mb-2">
            Texto de relleno
        </p>
        {!! Form::file('file', ['class' => 'form-input w-full' . ($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}

        @error('file')
            <strong class="text-xs text-red-600">{{$message}}</strong>
        @enderror
    </div>
</div>