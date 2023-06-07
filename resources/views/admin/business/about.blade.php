@extends('admin.layouts.admin')

@section('title')
    Manage Business About | Admin
@endsection

@section('content')
    @php
        $slug = request()->route('slug');
    @endphp
    <livewire:user-manage-business-about :slug="$slug" />
@endsection
