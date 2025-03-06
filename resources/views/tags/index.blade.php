@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Gestion des Tags</h1>

        <div class="d-flex justify-content-center">
            <div class="card shadow-lg p-4 w-75">
                @livewire('manage-tags')
            </div>
        </div>
    </div>
@endsection
