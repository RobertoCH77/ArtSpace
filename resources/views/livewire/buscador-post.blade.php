<div>
    <div class="row">
        <div class="col-md-8 mx-auto my-4">
            <div class="form-group">
                <div class="input-group">
                    <input wire:model.live="buscar" 
                        wire:keydown.enter="asignarPrimero()" 
                        type="text" 
                        class="form-control" 
                        id="buscar"
                        placeholder="Buscar etiqueta">

                    <div class="input-group-append">
                        <button wire:click="buscarPorTag" class="btn btn-dark">Buscar</button>
                    </div>
                </div>

                @error("buscar")                    
                    <small class="form-text text-danger">{{$message}}</small>                                    
                @else
                
                @if(count($tags)>0)
                    @if(!$picked)
                        <div class="shadow rounded px-3 pt-3 pb-0">
                            @foreach($tags as $tag)
                                <div style="cursor: pointer;">
                                    <a wire:click="asignarTag('{{ $tag->slug }}')">
                                        {{ $tag->slug }}
                                    </a>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    @endif
                @else
                @endif
                @enderror
            </div>
        </div>
    </div>    
</div>

