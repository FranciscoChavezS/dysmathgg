<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{

    use AuthorizesRequests;
    
    //Declarar variables para mostrar en la vista
    public $course;
    public $current;

    public function mount(Course $course){
        $this->course = $course;

        //Recorremos todas las lecciones que tenga el curso y que se almacenen en $lesson
        foreach($course-> lessons as $lesson){ 
            //Si existe una lección que no este completada
            if(!$lesson->completed){
                $this->current = $lesson;


                /* //indice - Recuperar colección para verificar a todas las lecciones que le corresponden a un curso
                $this->index = $course->lessons->search($lesson);

                $this->previous = $course->lessons[$this->index - 1];
                $this->next = $course->lessons[$this->index + 1]; */
                break;
            }
        }
         //Si todas las lecciones están marcadas como terminadas se asigna la última lección 
         if(!$this->current){
            $this->current = $course->lessons->last();

        }

        $this->authorize('enrolled', $course);
    }

    public function render()
    {
        return view('livewire.course-status');
    }
    /* MÉTODOS */
    //Remplazar los valores de current
    public function changeLesson(Lesson $lesson){
        $this->current = $lesson;        
       
    }

    public function completed(){
        //Si la unidad esta marcada 
        if($this->current->completed){
            //Eliminar registro
            $this->current->users()->detach(auth()->user()->id);
        }else{
            //Agregar Registro
            $this->current->users()->attach(auth()->user()->id);

        }

        //Recuperar datos para actualizar la información
        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }

    /* PROPIEDADES COMPUTADAS*/
    
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
    //Registrar progreso del estudiante
    public function getAdvanceProperty(){
      $i = 0;

      foreach($this->course->lessons as $lesson){
          //Si el usuario marca la actividad completada entra a la condición
          if($lesson->completed){
            $i++;
          }
        }

        $advance = ($i * 100)/($this->course->lessons->count());

        //Mostrar cantidad de decimales
        return round($advance, 1);
    }

}
