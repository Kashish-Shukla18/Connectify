<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class community extends Component
{
    #[On('closeModal')]
    function reverUrl()
    {
        $this->js("history.replaceState({},'', '/explore')");
    }

    public function render()
    {
        // Get the authenticated user's branch
        $userBatch = Auth::user()->batch;

        // Fetch posts from users with the same branch
        $posts = Post::whereHas('user', function ($query) use ($userBatch) {
            $query->where('batch', $userBatch);
        })->limit(20)->get();

        return view('livewire.explore', ['posts' => $posts]);
    }
}