@extends ('layouts.app')

@section ('title', 'Data Product')
@section ('menuAdminProduct', 'active')

@section ('content')
    @livewire ('admin.product.index')
@endsection
