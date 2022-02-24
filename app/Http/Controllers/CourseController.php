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
}
