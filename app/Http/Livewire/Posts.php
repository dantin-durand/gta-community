<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    protected $listeners = ['echo:posts,PostAdded' => "postAdded", 'echo:posts,PostRemoved' => "postRemove"];
    public $postList = [];

    public function postAdded($post)
    {
        array_push($this->postList, Post::find($post['id']));

        session()->flash('status', "Post créé");
    }

    public function postRemove($post)
    {

        session()->flash('status', "Post supprimé");

        broadcast(DB::table('posts')
            ->where('id', $post['id'])
            ->delete());

        $posts = Post::latest()->paginate(10);
        $this->postsList = $posts;
    }

    public function render()
    {
        /*
        dd(Hash::make("mdpdemerde"));
        $test = '$2y$10$6FroBt7FTPakueZ0T8DiFuoWkB0d9D9MPwEZXmKrOEd4g80PvoiE6';
            dd(Hash::check('truc', $test));
        */

        $posts = Post::latest()->paginate(10);
        $this->postsList = $posts;
        return view('livewire.posts', ['posts' => $posts]);
    }
}
