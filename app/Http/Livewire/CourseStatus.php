<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Lesson;

class CourseStatus extends Component
{
    //Declarar variables para mostrar en la vista
    public $course;
    public $current;

    public function mount(Course $course){
        $this->course = $course;

        //Recorremos el arreglo para que busque las lecciones del curso y se detenga en la que no está completada
        foreach($course-> lessons as $lesson){ 
            if(!$lesson->completed){
                $this->current = $lesson;

                /* //indice - Recuperar colección para verificar a todas las lecciones que le corresponden a un curso
                $this->index = $course->lessons->search($lesson);

                $this->previous = $course->lessons[$this->index - 1];
                $this->next = $course->lessons[$this->index + 1]; */
                break;
            }
        }
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    //Remplazar los valores de current
    public function changeLesson(Lesson $lesson){
        $this->current = $lesson;        
       
    }

    public function getIndexProperty(){
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }
    public function getPreviousProperty(){
        if($this->index == 0){
            return null;
        }else{
            return $this->course->lessons[$this->index - 1];
        }
    }
    public function getNextProperty(){
        if($this->index == $this->course->lessons->count() - 1){
            return null;
        }else{
            return $this->course->lessons[$this->index + 1];
        }
    }

}
