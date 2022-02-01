<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
//para subir imagenes con livewire
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditPost extends Component
{
    use WithFileUploads;

    public $post, $image, $identificador;
    public $open_edit = false;

    //esta propiedad rules es para sincronizar post.title, post.content
    //es necesario esta regla de validacion para que funcionesç post.title y post.content
    protected $rules = [
        'post.title' => 'required',
        'post.content' => 'required',
    ];


    //desde este metodo recibimos el parametro que hemos enviado
    public function mount(Post $post)
    {

        $this->post = $post;

        $this->identificador = rand();


    }
    
    
    public function save()
    {
        $this->validate();

        if ($this->image) {
            Storage::delete([$this->post->image]);

            $this->post->image = $this->image->store('posts');
        }

        $this->post->save();

        $this->reset(['open_edit', 'image']);

        $this->identificador = rand();

        $this->emitTo('show-posts', 'render');

        $this->emit('alert', 'El post se actualizo satifactoriamente');

    }
    public function render()
    {
        return view('livewire.edit-post');
    }
}
