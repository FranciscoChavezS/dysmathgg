<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;

class CourseIndex extends Component
{
    public function render()
    {
        //Mostramos los cursos con status 3 (PUBLICADO) y ordenamos los cursos por ID
        $courses = Course::where('status', 3)->latest('id')->paginate(8);

        return view('livewire.course-index', compact('courses'));
    }
}
