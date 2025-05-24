@extends('dashboard.layout')
@section('title', 'Edit Governorate')
@section('body')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add Governorate</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('governorates.store') }}" method="POST">
                    @csrf
                    @include('dashboard.governorates._form', ['button' => 'Create'])
                </form>
            </div>
        </div>
    </div>
@endsection
