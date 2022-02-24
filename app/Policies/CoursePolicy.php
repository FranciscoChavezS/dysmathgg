<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //Función para validar si el usuario ya está en un curso o no 
    public function enrolled(User $user, Course $course)
    {
        //Recuperar registro de los usuarios matriculados a un curso
        return $course->students->contains($user->id); 
    }

    //Validar Status de curso 
    public function published(?User $user, Course $course){
        if($course->status == 3){
            return true;
            
        }else{
            return false;
        }
    }
}
