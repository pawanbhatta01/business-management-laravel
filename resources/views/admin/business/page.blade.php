@extends('admin.layouts.admin')

@section('title')
    Manage Business Pages | Admin
@endsection

@section('content')
    @php
        $slug = request()->route('slug');
    @endphp
    <livewire:user-manage-business-page :slug="$slug" />
@endsection
