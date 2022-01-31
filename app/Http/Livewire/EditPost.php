<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class EditPost extends Component
{
    public $post;
    public $open = false;

    //desde este metodo recibimos el parametro que hemos enviado
    public function mount(Post $post)
    {

        $this->post = $post;
    }
    
    
    public function render()
    {
        return view('livewire.edit-post');
    }
}
