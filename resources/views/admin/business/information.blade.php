@extends('admin.layouts.admin')

@section('title')
    Manage Business Information | Admin
@endsection

@section('content')
    @php
        $slug = request()->route('slug');
    @endphp
    <livewire:user-manage-business-information :slug="$slug" />
@endsection
