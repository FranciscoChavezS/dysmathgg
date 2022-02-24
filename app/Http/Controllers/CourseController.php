<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(){
        return view('courses.index');
    }

    public function show(Course $course){

        $similares = Course::where('category_id', $course->category_id)
                            ->where('id','!=', $course->id) //Mostrar cursos diferente al Id
                            ->where('status', 3) //Mostrar cursos publicados
                            ->latest('id') //Ordenar por id de forma descendente
                            ->take(5) //solo mostrar 5 registros
                            ->get();

        return view('courses.show', compact('course', 'similares'));
    }

    public function enrolled(Course $course)
    {
        //Recuperar la relación del usuario logueado y devoler id
        $course->students()->attach(auth()->user()->id); //Agregar registros a la BD al registrarte a curso

        return redirect()->route('courses.status', $course);
    }

    public function status(Course $course){
        return view('courses.status', compact('course'));
    }
}
