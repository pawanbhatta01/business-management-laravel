@extends('admin.layouts.admin')

@section('title')
    Manage Business Services | Admin
@endsection

@section('content')
    @php
        $slug = request()->route('slug');
    @endphp
    <livewire:user-manage-business-service :slug="$slug" />
@endsection
