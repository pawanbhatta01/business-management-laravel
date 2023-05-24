@extends('admin.layouts.admin')

@section('title')
    Manage Business Ratings | Admin
@endsection

@section('content')
    @php
        $slug = request()->route('slug');
    @endphp
    <livewire:user-manage-business-rating :slug="$slug" />
@endsection
