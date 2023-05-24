@extends('admin.layouts.admin')

@section('title')
    Manage Business Files | Admin
@endsection

@section('content')
    @php
        $slug = request()->route('slug');
    @endphp
    <livewire:user-manage-business-image :slug="$slug" />
@endsection
