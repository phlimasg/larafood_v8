@extends('adminlte::page')

@section('title', 'Planos')


@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Detalhes</h1>
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
            <div class="card" >
                <div class="card-header">
                   Adicionar detalhes ao plano
                </div>
                <div class="card-body" wire:poll.2s>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Detalhes:</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="card-footer">                
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button> 
                </div>
            </div>
        </form>
    </div>
    
@stop

@section('css')
    
@stop

@section('js')
    
@stop