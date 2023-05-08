@extends('layouts.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    @include('layouts.navbar')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Promoción</h5>
                    </div>
                    <form action="" method="post" id="promocion_form" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
        
                            <div class="row">
        
                                @if (Auth()->user()->rol == 2)
                                    <div class="form-group col-md-6">
                                        <label for="titulo"></label>
                                        <input type="text" name="locale_id" value="{{ $local->id }}" hidden>
                                        <input value="{{ $local->titulo }}" type="text" class="form-control"
                                            placeholder="Locale Id" readonly>
        
                                    </div>
                                @else
                                    <div class="form-group col-md-6">
                                        <label for="locale_id"></label>
                                        {{-- <input wire:model="locale_id" type="text" class="form-control" id="locale_id"
                                            placeholder="Locale Id"> --}}
                                        <select id="" name="locale_id" class="form-select">
                                            <option value="">seleccione</option>
                                            @foreach ($locales as $item)
                                                <option value="{{ $item->id }}">{{ $item->titulo }}</option>
                                            @endforeach
                                        </select>
                                    </div>
        
                                @endif
                                {{-- <label for="locale_id"></label>
                                <select name="" id="" wire:model="locale_id" class="form-control">
                                    <option value="">seleccione</option>
                                    @foreach ($locales as $item)
                                    <option value="{{$item->id}}">{{$item->titulo}}</option>
                                    @endforeach
                                </select>
                                @error('locale_id')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror --}}
        
                                <div class="form-group col-md-6">
                                    <label for="titulo"></label>
                                    <input name="titulo" type="text" class="form-control" id="titulo"
                                        placeholder="Titulo">
                                    @error('titulo')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="file"></label>
                                    <input name="file" type="file" class="form-control" id="file"
                                        placeholder="File">
                                    @error('file')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
        
                            @if (Auth()->user()->rol == 1)                        
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="fechaini">Fecha inicio (principal)</label>
                                    <input name="fechaini" type="date" class="form-control" id="fechaini"
                                        placeholder="Fechaini">
                                    @error('fechaini')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fechafin">Fecha fin (principal)</label>
                                    <input name="fechafin" type="date" class="form-control" id="fechafin"
                                        placeholder="Fechafin">
                                    @error('fechafin')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            @endif
        
        
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="lclfechaini">Fecha inicio (negocio)</label>
                                    <input name="lclfechaini" type="date" class="form-control" id="lclfechaini"
                                        placeholder="Lclfechaini">
                                    @error('lclfechaini')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lclfechafin">Fecha fin (negocio)</label>
                                    <input name="lclfechafin" type="date" class="form-control" id="lclfechafin"
                                        placeholder="Lclfechafin">
                                    @error('lclfechafin')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="estado"></label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio3" name="estado"
                                        value="1" required>
                                    <label for="customRadio3" class="custom-control-label">Activo</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio4" name="estado"
                                        value="0" required>
                                    <label for="customRadio4" class="custom-control-label">Inactivo</label>
                                </div>
                                @error('estado')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
        
                        </div>
                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button> --}}
                            {{-- <button type="button" wire:click.prevent="store()"
                            class="btn btn-primary close-modal">Guardar</button> --}}
                            <input type="submit" value="Crear" class="btn btn-warning float-right">
                        </div>
                    </form>
                </div>
                
            </div>     
        </div>   
    </div>
</main>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        console.log('hola')
        $('#promocion_form').on('submit', function(event){
            event.preventDefault();
            console.log('que fue')
            // $('body').loadingModal({
            //     text: 'Espere, estamos procesando...',
            //     animation: 'threeBounce',
            //     opacity:'0.7',
            // });
            // $('body').loadingModal({text: 'Showing loader animations...', 'animation': 'wanderingCubes'});
            // $('#load-on').css('display','block');
            $.ajax({
                url: "{{route('promocion.store')}}",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache:false,
                processData: false,
                success: function(data){
                    console.log(data);
                    if (data.message) {
                        alert(data.message);    
                        location.reload(true);
                        window.location.href = "{{url('promociones')}}";
                        // $('body').loadingModal('hide');
                    }else{
                        alert(data.error);
                        location.reload(true);
                    }  
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("error servidor: "+ XMLHttpRequest.statusText);
                    // location.reload(true);
                }
            })
        })

    })
    
</script>

@endsection