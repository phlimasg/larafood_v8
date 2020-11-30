@extends('adminlte::page')

@section('title', 'Planos')


@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Planos</h1>
    </div>
    <div class="col-sm-6 ">
      <a href="{{ route('plans.create') }}" class="btn btn-primary float-sm-right"><i class="fa fa-plus"></i> Adicionar</a>
    </div>
  </div>
@stop

@section('content')
    <p>Listagem dos planos</p>    
    <div>
        <div class="card" >
            <div class="card-header">
                <form action="{{ route('plans.search') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="input-group offset-md-9 col-md-3 float-sm-right">
                            <input type="text" name="search" class="form-control" placeholder="Pesquisar" aria-describedby="basic-addon2" value="{{isset($search)?$search:''}}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                          </div>
                    </div>
                </form>
            </div>
            <div class="card-body" wire:poll.2s>
                <table class="table table-condensed">
                    <thead>
                        <tr>                        
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plans as $plan)
                            <tr>
                                <td>{{$plan->name}}</td>
                                <td>{{$plan->price}}</td>
                                <td><a href="{{ route('plans.show', ['plan'=>$plan->url]) }}" class="btn btn-warning">Ver</a></td>
                            </tr>
                        @endforeach
    
                    </tbody>
                </table>
    
            </div>
            <div class="card-footer">
                @if (isset($search))
                    {{ $plans->appends($search)->links() }}    
                @else
                    {{ $plans->links() }}
                @endif
                
            </div>
        </div>
    </div>
    
@stop

@section('css')
    
@stop

@section('js')
    
@stop