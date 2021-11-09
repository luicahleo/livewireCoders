<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{
    public function render()
    {

        $posts = Post::orderBy('id','desc')->paginate(10);

        return view('livewire.show-posts', compact('posts'));
    }
}
