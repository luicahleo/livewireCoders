<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{

    public $open = false;

    public $title, $content;

    // propiedad para validacion
    protected $rules = [
        'title' => 'required',
        'content' => 'required'
        
    ];

    //metodo para validacion en tiempor real
    //metodo que se activa cada vez que modificamos las propiedades
    // public function updated($propertyName)
    // {
    //     # code...
    //     $this->validateOnly($propertyName);
    // }

    public function save(){

        //llamamos al metodo validate para validar los campos
        $this->validate();


        Post::create([
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->reset(['open', 'title', 'content']);
        $this->emitTo('show-posts', 'render');
        $this->emit('alert', 'El post se creo satifactoriamente');


    }


    public function render()
    {
        return view('livewire.create-post');
    }
}
