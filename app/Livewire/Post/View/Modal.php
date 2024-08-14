<?php
namespace App\Livewire\Post\View;

use App\Models\Post;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Auth;

class Modal extends ModalComponent
{
    public $post;

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public function deletePost()
    {
        // Validate if the post exists
        if (!$this->post) {
            return;
        }

        // Check if the authenticated user is the owner of the post
        if (Auth::check() && Auth::user()->id === $this->post->user_id) {
            // Delete the post
            $this->post->delete();

            // Reset post property to avoid further interaction
            $this->post = null;         
            // Redirect to home page after deletion
            return redirect('/');
        }

        // Close the modal after deletion
        $this->closeModal();
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public function mount(Post $post)
    {
        $this->post = $post;

        // Set URL for history.pushState
        $url = url('post/' . $this->post->id);
        $this->js("history.pushState({}, '', '{$url}')");
    }

    public function render()
    {
        return <<<'BLADE'
        <main class="bg-white h-[calc(100vh_-_3.5rem)] p-2 md:h-[calc(100vh_-_5rem)] flex flex-col border gap-y-4 px-5">
            <livewire:post.view.item :post="$post" />

            @if (Auth::check() && Auth::user()->id === $post->user_id)
                <button wire:click="deletePost" class="bg-red-500 text-white px-4 py-2 rounded-md mt-4">Delete Post</button>
            @endif
        </main>
    BLADE;
    }
}
