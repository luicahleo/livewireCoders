<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

use Livewire\WithPagination;
class ShowPosts extends Component
{

use WithPagination;

    public function render()
    {

        $posts = Post::orderBy('id','desc')->paginate(10);

        return view('livewire.show-posts', compact('posts'));
    }
}
