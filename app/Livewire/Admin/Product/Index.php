<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class Index extends Component
{
    use WithPagination, WithSweetAlert;
    public $paginationTheme = 'bootstrap';
    public $paginate = 5;
    public $search = '';

    public $productId, $product_name, $stock, $category_id, $category_name;

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
        $products = Product::with('categories')
            ->where('product_name', 'like', '%' . $this->search . '%')
            ->orWhereHas('categories', function ($q) {
                $q->where('category_name', 'like', '%' . $this->search . '%');
            })
            ->orderBy('product_name', 'asc')
            ->paginate($this->paginate);

        $categories = Category::orderBy('category_name')->get();

        return view('livewire.admin.product.index', compact('products', 'categories'))->with('title', 'Data Product');
    }

    public function create()
    {
        $this->resetValidation();
        $this->reset(['productId', 'product_name', 'stock', 'category_id']);
    }

    public function store()
    {
        $this->validate([
            'product_name' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'integer', 'min:0'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);

        Product::create([
            'product_name' => $this->product_name,
            'stock' => $this->stock,
            'category_id' => $this->category_id,
        ]);

        $this->reset(['product_name', 'stock', 'category_id']);
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
        $product = Product::findOrFail($id);

        $this->productId = $product->id;
        $this->product_name = $product->product_name;
        $this->stock = $product->stock;
        $this->category_id = $product->category_id;
    }

    public function update()
    {
        $this->validate([
            'product_name' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'integer', 'min:0'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);

        $product = Product::findOrFail($this->productId);

        $product->update([
            'product_name' => $this->product_name,
            'stock' => $this->stock,
            'category_id' => $this->category_id,
        ]);

        $this->dispatch('closeEditModal');

        $this->swalFire([
            'title' => 'Success',
            'text' => 'Data has been updated!',
            'icon' => 'success',
            'timer' => 1500,
        ]);

        $this->reset(['productId', 'product_name', 'stock', 'category_id']);
    }

    public function confirm($id)
    {
        $product = Product::with('categories')->findOrFail($id);
        $this->productId = $id;
        $this->product_name = $product->product_name;
        $this->stock = $product->stock;
        $this->category_id = $product->category_id;
        $this->category_name = $product->categories->category_name ?? 'Uncategorized';
    }

    public function destroy()
    {
        $product = Product::findOrFail($this->productId);
        $product->delete();

        $this->dispatch('closeDeleteModal');

        $this->swalFire([
            'title' => 'Deleted!',
            'text' => 'Data has been deleted successfully.',
            'icon' => 'success',
            'confirmButtonText' => 'Ok',
            'timer' => 1500,
        ]);

        $this->reset(['productId', 'product_name', 'stock', 'category_id']);
    }
}
