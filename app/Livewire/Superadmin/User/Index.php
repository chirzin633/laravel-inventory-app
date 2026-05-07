<?php

namespace App\Livewire\Superadmin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use SweetAlert2\Laravel\Traits\WithSweetAlert;

class Index extends Component
{
    use WithPagination, WithSweetAlert;
    public $paginationTheme = 'bootstrap';
    public $paginate = 5;
    public $search = '';
    public $userId, $name, $email, $role, $password, $password_confirmation;
    public $current_password, $new_password, $new_password_confirmation;

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
            'email' => ['required', 'email', 'unique:users,email'],
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
            'timer' => 1500,
        ]);
    }

    public function edit($id)
    {
        $this->resetValidation();

        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
    }

    public function update()
    {
        $this->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->userId)],
            'role' => ['required'],
            'current_password' => ['nullable'],
            'new_password' => ['nullable', 'min:8', 'confirmed'],
        ]);

        $user = User::findOrFail($this->userId);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ]);

        if ($this->current_password && $this->new_password) {
            if (!Hash::check($this->current_password, $user->password)) {
                $this->addError('current_password', 'Password is dont match');
                return;
            }
            $user->update([
                'password' => Hash::make($this->new_password),
            ]);
        }

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
        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
    }

    public function destroy()
    {
        $user = User::findOrFail($this->userId);
        $user->delete();
        $this->dispatch('closeDeleteModal');

        $this->swalFire([
            'title' => 'Deleted',
            'text' => 'User has been deleted',
            'icon' => 'success',
            'timer' => 1500,
        ]);

        $this->resetPage();
    }
}