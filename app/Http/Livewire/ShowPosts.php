<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

use Livewire\WithPagination;
class ShowPosts extends Component
{

    use WithPagination;

    public $search, $post, $immage, $identificador;

    public $sort = 'id';
    public $direction = 'desc';

    public $open_edit = false;

    public function mount()
    {
        $this->identificador = rand();
    }

    protected $rules = [
        'post.title' => 'required',
        'post.content' => 'required'
    ];

    protected $listeners = ['render'=>'render'];

    public function render()
    {

        $posts = Post::where('title','like', '%' . $this->search . '%')
                     ->orWhere('content','like', '%' . $this->search . '%')
                     ->orderBy($this->sort, $this->direction)
                     ->get();

        return view('livewire.show-posts', compact('posts'));
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

    public function edit(Post $post)
    {
        $this->post = $post;
        $this->open_edit = true;
    }
}
