@extends('dashboard.layout')
@section('title', 'Edit Governorate')
@section('body')


    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Governorate</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('governorates.update', $governorate->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('dashboard.governorates._form', ['button' => 'Update'])
                </form>
            </div>
        </div>
    </div>
@endsection
