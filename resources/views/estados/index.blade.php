@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h2 class="mt-5">Lista de estados</h2>
        <div class="col-md-8">
            <datatable-component></datatable-component>
        </div>

        <h2 class="mt-5">Lista de estados con casos</h2>
        <div class="col-md-8">
            <casos-componente></casos-componente>
        </div>
    </div>
</div>
@endsection