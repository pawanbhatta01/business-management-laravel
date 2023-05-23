@extends('admin.layouts.admin')

@section('title')
    Manage Business Schedules | Admin
@endsection

@section('content')
    @php
        $slug = request()->route('slug');
    @endphp
    <livewire:user-manage-business-schedule :slug="$slug" />
@endsection
