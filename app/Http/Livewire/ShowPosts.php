<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

use Livewire\WithPagination;
class ShowPosts extends Component
{

    use WithPagination;

    public $search;

    public function render()
    {

        $posts = Post::where('title','like', '%' . $this->search . '%')
                     ->orWhere('content','like', '%' . $this->search . '%')
                     ->get();

        return view('livewire.show-posts', compact('posts'));
    }
}
