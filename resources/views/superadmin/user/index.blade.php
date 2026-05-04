@extends ('layouts.app')

@section ('title', 'Data User')

@section ('menuSuperAdminUser', 'active')

@section ('content')
    @livewire ('superadmin.user.index')
@endsection
