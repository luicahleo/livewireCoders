<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

use Livewire\WithPagination;

class ShowPosts extends Component
{

    use WithPagination;
    use WithFileUploads;

    public $search = '';
    public $post, $image, $identificador;

    public $sort = 'id';
    public $direction = 'desc';

    //cantidad para mostrar
    public $cant = '10';

    public $open_edit = false;

    //para cargar la pagina
    public $readyToLoad = false;

    //propiedad para enviar por la url
    protected $queryString = [
        'cant' => ['except' => '10'], 
        'sort' => ['except' => 'id'], 
        'direction' => ['except' => 'desc'], 
        'search' => ['except' => '']
    ];

    public function mount()
    {
        $this->identificador = rand();

        $this->post = new Post();
    }

    //metodo para el buscador, para que se actualice cuando estoy buscando algo en el input
    //este metodo tiene que llamarse updatingSearch, porque hace referencia a la propiedad $search
    public function updatingSearch()
    {
        $this->resetPage();
    }

    protected $rules = [
        'post.title' => 'required',
        'post.content' => 'required',

    ];

    protected $listeners = ['render'=>'render'];

    public function render()
    {
        if ($this->readyToLoad) {
            $posts = Post::where('title','like', '%' . $this->search . '%')
                ->orWhere('content','like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);

        }else{
            $posts = [];
        }

        

        return view('livewire.show-posts', compact('posts'));
    }

    public function loadPosts()
    {
        $this->readyToLoad = true;

    }


    public function order($sort){

        //dd($sort);

        //dd($this->sort);

        if($this->sort == $sort){
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            }
            else{
                $this->direction = 'desc';
            }
        }else{
            $this->sort = $sort;
            $this->direction = 'asc';
        }

    }

    //metodo llamado desde show-post.blade , desde el boton de editar
    public function edit(Post $post)
    {
        $this->post = $post;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->image) {
            Storage::delete([$this->post->image]);
            $this->post->image = $this->image->store('posts');
        }

        $this->post->save();

        $this->reset(['open_edit', 'image']);

        $this->identificador = rand();

        $this->emit('alert', 'El post se actualizo satifactoriamente');


    }

}
