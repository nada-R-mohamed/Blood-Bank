@extends('dashboard.layout')
@section('title', 'Edit City')
@section('body')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit City</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('cities.update', $city->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('dashboard.cities._form', ['button' => 'Update'])
                </form>
            </div>
        </div>
    </div>
@endsection
