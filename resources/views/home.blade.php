@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#15202b] dark:bg-gray-900">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <x-navbar />
        <x-feed />
    </div>
</div>
@endsection