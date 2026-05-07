<?php

namespace App\Livewire\Superadmin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

use SweetAlert2\Laravel\Traits\WithSweetAlert;

class Index extends Component
{
    use WithPagination, WithSweetAlert;
    public $paginationTheme = 'bootstrap';
    public $paginate = 5;
    public $search = '';
    public $category_name, $categoryId;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPaginate()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::where('category_name', 'like', '%' . $this->search . '%')
            ->orderBy('category_name', 'asc')
            ->paginate($this->paginate);
        return view('livewire.superadmin.category.index', compact('categories'))->with('title', 'Data Category');
    }

    public function create()
    {
        $this->resetValidation();
        $this->reset();
    }

    public function store()
    {
        $this->validate([
            'category_name' => ['required', 'max:255', 'unique:categories,category_name'],
        ]);

        Category::create([
            'category_name' => $this->category_name,
        ]);

        $this->reset(['categoryId', 'category_name']);

        $this->dispatch('closeCreateModal');

        $this->swalFire([
            'title' => 'Success',
            'text' => 'Data successfully created!',
            'icon' => 'success',
            'timer' => 1500,
        ]);
    }

    public function edit($id)
    {
        $this->resetValidation();

        $category = Category::findOrFail($id);
        $this->categoryId = $category->id;
        $this->category_name = $category->category_name;
    }

    public function update()
    {
        $this->validate([
            'category_name' => ['required', 'max:255', 'unique:categories,category_name'],
        ]);

        $category = Category::findOrFail($this->categoryId);

        $category->update([
            'category_name' => $this->category_name,
        ]);

        $this->reset(['categoryId', 'category_name']);

        $this->dispatch('closeEditModal');

        $this->swalFire([
            'title' => 'Success',
            'text' => 'Data has been updated!',
            'icon' => 'success',
            'timer' => 1500,
        ]);
    }

    public function confirm($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $id;
        $this->category_name = $category->category_name;
    }

    public function destroy()
    {
        $category = Category::findOrFail($this->categoryId);
        $category->delete();

        $this->dispatch('closeDeleteModal');

        $this->swalFire([
            'title' => 'Deleted',
            'text' => 'Data has been deleted',
            'icon' => 'success',
            'timer' => 1500,
        ]);

        $this->resetPage();
        $this->reset(['categoryId', 'category_name']);
    }
}
