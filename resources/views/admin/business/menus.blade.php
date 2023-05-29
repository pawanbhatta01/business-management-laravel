@extends('admin.layouts.admin')

@section('title')
    Manage Business Menu | Admin
@endsection

@section('content')
    @php
        $slug = request()->route('slug');
    @endphp
    <livewire:user-manage-business-menu :slug="$slug" />
@endsection
