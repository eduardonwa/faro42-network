<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Faro;

class FaroPostsTable extends Component
{   
    use WithPagination;

    public $search = '';
    public $perPage = 25;
    public $sortField = 'id';
    public $sortAsc = true;
    public $selected = [];

    public Faro $post;

    public function deletePost()
    {
        Faro::destroy($this->selected);
    }

    public function imageUrl()
    {
        $this->post->image_url;
    }

    public function render()
    {
        return view('livewire.faro-posts-table', [

            'posts' => Faro::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage)
        ])
            ->layout('components.master');
    }
}