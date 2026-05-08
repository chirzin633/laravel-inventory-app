<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $totalUsers, $totalSuperAdmins, $totalAdmins, $totalCategories, $totalProducts;

    public function mount()
    {
        $this->totalUsers = User::count();
        $this->totalSuperAdmins = User::where('role', 'Super Admin')->count();
        $this->totalAdmins = User::where('role', 'Admin')->count();
        $this->totalCategories = Category::count();
        $this->totalProducts = Product::count();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
