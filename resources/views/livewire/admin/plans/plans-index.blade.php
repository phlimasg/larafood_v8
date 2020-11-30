<div>
    <div class="card" >
        <div class="card-header">
            Listagem de planos
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
                            <td><a href="" class="btn btn-danger">Ações</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="card-footer">
                {{ $plans->links() }}
            </div>
        </div>
    </div>
</div>
