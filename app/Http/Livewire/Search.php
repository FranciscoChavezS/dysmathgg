<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;

class Search extends Component
{
    public $search;

    public function render()
    {

        return view('livewire.search');
    }

    //Función para barra de búsqueda
    public function getResultsProperty(){
        return Course::where('title', 'LIKE', '%' . $this->search. '%')//Buscar por título concatenando 
                    ->where('status', 3) //Buscar por cursos Publicados 
                    ->take(8) //Solo se muestran 8 registrsos
                    ->get();
    }
}
