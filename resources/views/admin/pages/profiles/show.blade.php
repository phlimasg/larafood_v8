@extends('adminlte::page')

@section('title', $profile->nome)


@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Perfis</h1>
    </div>
    <div class="col-sm-6">
        @include('admin.pages.profiles.partials.breadcrumb')
    </div>    
</div>
@stop

@section('content')    
    <div>
        <div class="card" >
            <div class="card-header">
                {{$profile->name}}
            </div>
            <div class="card-body" >
                <ul>
                    <li>
                        <b>Nome: </b>{{$profile->name}}
                    </li>                    
                    <li>
                        <b>Descrição: </b>{{$profile->description}}
                    </li>
                </ul>
    
            </div>
            <div class="card-footer">
                <div class="row">                    
                    <div class="col-sm-2 ">
                        <a href="{{ route('profiles.edit', ['profile'=> $profile->id]) }}" class="btn btn-primary"><i class="fa fa-pen"></i> Editar</a>
                    </div>
                    <div class="col-sm-2 ">
                        <form action="{{ route('profiles.destroy', ['profile'=> $profile->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button  class="btn btn-danger "><i class="fa fa-trash"></i> Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@stop

@section('css')
    
@stop

@section('js')
    
@stop