@extends('admin.layouts.admin')

@section('title')
    Manage Business Contacts | Admin
@endsection

@section('content')
    @php
        $slug = request()->route('slug');
    @endphp
    <livewire:user-manage-business-contact :slug="$slug" />
@endsection
