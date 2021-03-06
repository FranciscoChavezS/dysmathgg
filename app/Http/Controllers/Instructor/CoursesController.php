<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Level;
use App\Models\Price;

use Illuminate\Support\Facades\Storage;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //Rescatar datos 
         $categories = Category::pluck('name','id');
         $levels = Level::pluck('name','id');
         $prices = Price::pluck('name','id');



        return view('instructor.courses.create', compact('categories','levels','prices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses',
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'image'
        ]);

        $course = Course::create($request->all());

        //Agregar imagen y se relacione al curso que se creó 
        if($request->file('file')){
            $url = Storage::put('public/cursos/', $request->file('file'));

            $course->image()->create([
                'url' => $url
            ]);
        }

        return redirect()->route('instructor.courses.edit', $course);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('instructor.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //Rescatar datos 
        $categories = Category::pluck('name','id');
        $levels = Level::pluck('name','id');
        $prices = Price::pluck('name','id');
    

        return view('instructor.courses.edit', compact('course', 'categories','levels','prices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //Regla de validación para formulario
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,' . $course->id,
            'subtitle' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'price_id' => 'required',
            'file' => 'image'
        ]);

        $course->update($request->all());

        //Actualizar imagen 
        if($request->file('file')){
            $url = Storage::put('public/cursos/', $request->file('file'));

            //Si existe una imagen en el curso se elimina y se actualiza con la nueva información
            if($course->image){
                Storage::delete($course->image->url);

                $course->image->update([
                    'url' => $url
                ]);
            }else{ //Si la image no existe se crea un nuevo registro en la tabla
                $course->image()->create([
                    'url' => $url
                ]);
            }
        }


        return redirect()->route('instructor.courses.edit', $course)->with('info', 'El curso se actualizó correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
