@extends('admin.layouts.admin')

@section('title')
    Manage Business Settings | Admin
@endsection

@section('content')
    @php
        $slug = request()->route('slug');
    @endphp
    <livewire:user-manage-business-settings :slug="$slug" />
@endsection
