@extends('adminlte::page')

@section('title', 'Detalhes')


@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Detalhes - Adicionar</h1>
    </div>
    <div class="col-sm-6">              
        @include('admin.pages.plans.partials.breadcrumb')
    </div>
  </div>
@stop

@section('content')
    <div>
        <form action="{{ route('details.store', ['url'=>$plan->url]) }}" method="POST">
            @csrf
            @include('admin.pages.plans.details.partials.form')
        </form>
    </div>
    
@stop

@section('css')
    
@stop

@section('js')
    
@stop