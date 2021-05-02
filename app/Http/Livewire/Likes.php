<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use App\Models\Like;
use Livewire\Component;
use App\Events\LikeAdded;
use App\Events\LikeRemoved;

class Likes extends Component
{
    public $likes;
    public $hasUserLiked = false;
    public $postId;
    public $count;

    protected $listeners = ['echo:like,LikeAdded' => "addLike", 'echo:like,LikeRemoved' => "removeLike"];

    public function toggleLikeMode()
    {
        $this->hasUserLiked = !$this->hasUserLiked;
    }

    public function mount($post)
    {
        $this->postId = $post->id;
        $this->likes = Like::where('post_id', $post->id)->get();
        $this->count = count($this->likes);
        $didUserLike = DB::table('likes')
            ->where('post_id', $post->id)
            ->where('user_id', auth()->user()->id)->get();
        if (isset($didUserLike[0])) {
            $this->hasUserLiked = true;
        }
    }

    public function addLike()
    {

        $this->toggleLikeMode();
        $this->count += 1;

        // $like = auth()->user()->like()->create([
        //     'post_id' => $this->postId,
        //     'user_id' => auth()->user()->id,
        // ]);

        // broadcast(new LikeAdded($like));
        Like::create([
            'post_id' => $this->postId,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function removeLike()
    {

        $this->toggleLikeMode();
        $this->count -= 1;


        $likes = DB::table('likes')
            ->where('post_id', $this->postId)
            ->where('user_id', auth()->user()->id)
            ->delete();


        broadcast($likes);
    }

    public function render()
    {
        return view('livewire.likes');
    }
}
