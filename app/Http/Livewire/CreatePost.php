<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

//para subir imagenes con livewire
use Livewire\WithFileUploads;

class CreatePost extends Component
{

    use WithFileUploads;

    public $open = false;

    public $title, $content, $image, $identificador;

    public function mount()
    {
        $this->identificador = rand();
    }

    // propiedad para validacion
    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'image' => 'required|image|max:2048'
        
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
        
        //con esto creo una copia de la imagen en la carpeta posts
        $image = $this->image->store('posts');

        //con esto creo un registro en la tabla posts
        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $this->image
    
        ]);

        $this->reset(['open', 'title', 'content', 'image']);

        //pedimos que reemplaze el id del indetificador por otro
        $this->identificador = rand();

        $this->emitTo('show-posts', 'render');
        $this->emit('alert', 'El post se creo satifactoriamente');


    }


    public function render()
    {
        return view('livewire.create-post');
    }
}
