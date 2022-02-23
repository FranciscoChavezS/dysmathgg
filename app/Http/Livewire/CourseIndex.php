<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Category;
use App\Models\Level;
use Livewire\WithPagination;


class CourseIndex extends Component
{
    use WithPagination; //Paginación dinámica

    public $category_id;
    public $level_id;

    public function render()
    {
        $categories = Category::all();
        $levels = Level::all();


        //Mostramos los cursos con status 3 (PUBLICADO) y ordenamos los cursos por ID
        $courses = Course::where('status', 3)
                        ->category($this->category_id) //Filtrar cursos por categorías y niveles con método Scope en el modelo
                        ->level($this->level_id)
                        ->latest('id')
                        ->paginate(8);


        return view('livewire.course-index', compact('courses', 'categories','levels'));
    }
    //Reiniciar filtrado de cursos 
    public function resetFilters(){
        $this->reset(['category_id','level_id']);
    }
}
