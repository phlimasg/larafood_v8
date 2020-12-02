@extends('adminlte::page')

@section('title', 'Planos')


@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1>Detalhes</h1>
    </div>
    <div class="col-sm-6 ">        
      <a href="{{ route('details.create',['url'=> $plan->url]) }}" class="btn btn-primary float-sm-right"><i class="fa fa-plus"></i> Adicionar</a>
    </div>
  </div>
@stop

@section('content')
<div class="row">
    <div class="col-sm-12">              
        @include('admin.pages.plans.partials.breadcrumb')
    </div>
</div> 
    <div>
        <div class="card" >
            <div class="card-header">
               Detalhes
            </div>
            <div class="card-body" wire:poll.2s>
                <table class="table table-condensed">
                    <thead>
                        <tr>                        
                            <th>Nome</th>                            
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($details as $detail)
                            <tr>
                                <td>{{$detail->name}}</td>                                
                                <td><a href="{{ route('details.show', ['url'=>$plan->url, 'detail' => $detail->id]) }}" class="btn btn-warning">Ver</a></td>
                            </tr>
                        @endforeach
    
                    </tbody>
                </table>
    
            </div>
            <div class="card-footer">                
                {{ $details->links() }}
            </div>
        </div>
    </div>
    
@stop

@section('css')
    
@stop

@section('js')
    
@stop