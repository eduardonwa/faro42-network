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

    // Categories
    public Category $category;

    public $name;
    public $description;
    public $categorySuccess;
    public $categoryUpdated;
    public $categoryDeleted;

    protected $rules = [
        'name' => 'required',
        'description' => 'min:5'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->name = $category->name;
        $this->description = $category->description;
    }

    public function submitCategory() {

        $category = $this->validate();

        Category::create($category);

        $this->categorySuccess = 'Tu categoría fue creada.';
        $this->resetForm();
    }

    private function resetform()
    {
        $this->name = '';
        $this->description = '';
    }

    public function update(Category $category)
    {
        $this->validate();

        $this->category->update([
            'name' => $this->name
        ]);

        $this->$categoryUpdated = 'Tu categoría fue actualizada.';
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();

        $this->categoryDeleted = 'Tu categoría fue eliminada.';
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