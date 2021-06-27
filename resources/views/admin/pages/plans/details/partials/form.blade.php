<div class="card" >
    <div class="card-header">
       Detalhes do plano
    </div>
    <div class="card-body" wire:poll.2s>
        <div class="row">
            <div class="col-md-3">
                <label for="">Detalhes:</label>
                <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" value="{{old('name')??$detail->name??''}}">
                @error('name') <span class="text-danger">{{$message}}</span> @enderror
            </div>
        </div>
    </div>
    <div class="card-footer">                
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button> 
    </div>
</div>