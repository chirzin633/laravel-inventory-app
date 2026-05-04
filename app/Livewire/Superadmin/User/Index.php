<?php

namespace App\Livewire\Superadmin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class Index extends Component
{
    use WithPagination, WithSweetAlert;
    public $paginationTheme = 'bootstrap';
    public $paginate = 5;
    public $search = '';
    public $name, $email, $role, $password, $password_confirmation;

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
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('role', 'like', '%' . $this->search . '%')
            ->orderBy('role', 'asc')
            ->paginate($this->paginate);
        return view('livewire.superadmin.user.index', compact('users'))->with('title', 'Data User');
    }

    public function create()
    {
        $this->resetValidation();
        $this->reset();
    }

    public function store()
    {
        $this->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'role' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => Hash::make($this->password),
        ]);

        $this->reset();

        $this->dispatch('closeCreateModal');

        $this->swalFire([
            'title' => 'Success',
            'text' => 'Data successfully created!',
            'icon' => 'success',
            'confirmButtonText' => 'Ok',
            'timer' => 1500,
        ]);
    }
}
