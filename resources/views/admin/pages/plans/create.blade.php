@extends('adminlte::page')

@section('title', 'Planos')


@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Planos</h1>
    </div>
    <div class="col-sm-6 ">              
        @include('admin.pages.plans.partials.breadcrumb')
    </div>
  </div>
@stop

@section('content')    
    <div>
        @if (!empty($plan))
        <form action="{{ route('plans.update',['plan'=>$plan->url]) }}" method="POST" class="form">
            @method('put')
            <div class="card" >
                <div class="card-header">
                    Editar plano: {{$plan->name}}            
        @else
        <form action="{{ route('plans.store') }}" method="POST" class="form">
            <div class="card" >
                <div class="card-header">
                    Adicionar novo plano
        @endif
            @csrf
           
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="">Nome:</label>
                        <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" value="{{old('name')??$plan->name??''}}">
                            @error('name')
                                <span class="text-danger">*{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-2">
                            <label for="">Preço:</label>
                            <input type="text" name="price" id="" class="form-control @error('price') is-invalid @enderror" value="{{old('price')??$plan->price??''}}">
                            @error('price')
                                <span class="text-danger">*{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-7">
                            <label for="">Descrição:</label>
                            <input type="text" name="description" id="" class="form-control @error('description') is-invalid @enderror" value="{{old('description')??$plan->description??''}}">
                            @error('description')
                                <span class="text-danger">*{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
                </div>
            </div>
        </form>
    </div>
    
@stop

@section('css')
    
@stop

@section('js')
    
@stop