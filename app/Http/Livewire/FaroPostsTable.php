<?php

namespace App\Http\Livewire;

use App\Models\Faro;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class FaroPostsTable extends Component
{   
    use WithPagination;

    public $search = '';
    public $perPage = 25;
    public $sortField = 'id';
    public $sortAsc = true;
    public $selected = [];
    public $path = 'faro_posts_img/';

    public Faro $post;

    public function deletePost()
    {
        Faro::destroy($this->selected);
    }

    public function render()
    {
        return view('livewire.faro-posts-table', [
            'posts' => Faro::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->simplePaginate($this->perPage),
            'categories' => Category::get(),
        ])
            ->layout('components.master');
    }
}