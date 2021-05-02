<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Like;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class Post extends Component
{

    public $post;
    public $name;
    public $createdAt;

    public function mount($post)
    {
        $this->post = $post;
        $this->createdAt = Carbon::parse($post->created_at)->diffForHumans();
    }

    public function render()
    {
        return view('livewire.post');
    }
}
