@extends('adminlte::page')

@section('title', 'Editar perfil')


@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Perfis</h1>
    </div>
    <div class="col-sm-6 ">              
        @include('admin.pages.profiles.partials.breadcrumb')
    </div>
  </div>
@stop

@section('content')    
    <div>
        @if (!empty($profile))
        <form action="{{ route('profiles.update',['profile'=>$profile->id]) }}" method="POST" class="form">
            @method('put')
            <div class="card" >
                <div class="card-header">
                    Editar profileo: {{$profile->name}}            
        @else
        <form action="{{ route('profiles.store') }}" method="POST" class="form">
            <div class="card" >
                <div class="card-header">
                    Adicionar novo profileo
        @endif
            @csrf
           
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="">Nome:</label>
                        <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" value="{{old('name')??$profile->name??''}}">
                            @error('name')
                                <span class="text-danger">*{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-sm-7">
                            <label for="">Descrição:</label>
                            <input type="text" name="description" id="" class="form-control @error('description') is-invalid @enderror" value="{{old('description')??$profile->description??''}}">
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