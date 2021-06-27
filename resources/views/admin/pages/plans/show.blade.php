@extends('adminlte::page')

@section('title', $plan->nome)


@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Planos</h1>
    </div>
    <div class="col-sm-6">
        @include('admin.pages.plans.partials.breadcrumb')
    </div>    
</div>
@stop

@section('content')    
    <div>
        <div class="card" >
            <div class="card-header">
                {{$plan->name}}
            </div>
            <div class="card-body" wire:poll.2s>
                <ul>
                    <li>
                        <b>Nome: </b>{{$plan->name}}
                    </li>
                    <li>
                        <b>Url: </b>{{$plan->url}}
                    </li>
                    <li>
                        <b>Preço: </b>{{number_format($plan->price,2,',','.')}}
                    </li>
                    <li>
                        <b>Descrição: </b>{{$plan->description}}
                    </li>
                </ul>                
                @if (!empty(Session::get('message')))
                    <div class="alert alert-danger">
                        {{Session::get('message')}}
                    </div>
                @endif
    
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-2 ">
                        <a href="{{ route('details.index', ['url'=> $plan->url]) }}" class="btn btn-warning"><i class="fa fa-eye"></i> Detalhes</a>
                    </div>
                    <div class="col-sm-2 ">
                        <a href="{{ route('plans.edit', ['plan'=> $plan->url]) }}" class="btn btn-primary"><i class="fa fa-pen"></i> Editar</a>
                    </div>
                    <div class="col-sm-2 ">
                        <form action="{{ route('plans.destroy', ['plan'=> $plan->url]) }}" method="post">
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