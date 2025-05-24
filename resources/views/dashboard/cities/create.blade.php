@extends('dashboard.layout')
@section('title', 'Create City')
@section('body')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add City</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('cities.store') }}" method="POST">
                    @csrf
                    @include('dashboard.cities._form', ['button' => 'Create'])
                </form>
            </div>
        </div>
    </div>
@endsection
