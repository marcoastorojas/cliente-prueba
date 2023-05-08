@section('title', __('Promociones'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4>
								{{-- <i class="fab fa-laravel text-info"></i> --}}
							Promociones </h4>
						</div>
						{{-- <div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div> --}}
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						{{-- <div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search Promociones">
						</div> --}}
						{{-- <div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-plus"></i>  Agregar Promoción
						</div> --}}

						<div>
							<a href="{{url('promociones/crear')}}" class="btn btn-sm btn-info"> <i class="fa fa-plus"></i>  Agregar Promoción</a>
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.promociones.create')
						@include('livewire.promociones.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Empresa</th>
								<th>Titulo</th>
								<th>File</th>
								@if (Auth()->user()->rol == 1)	
								<th>Fechaini</th>
								<th>Fechafin</th>
								@endif
								<th>Lclfechaini</th>
								<th>Lclfechafin</th>
								<th>Estado</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($promociones as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->local->titulo }}</td>
								<td>{{ $row->titulo }}</td>
								<td>
									{{-- {{ $row->file }} --}}
									@if ($row->file)
										<img src="{{ asset('img/' . $row->file) }}" width="65px">
									@else
									@endif
								</td>
								@if (Auth()->user()->rol == 1)									
								<td>{{ $row->fechaini }}</td>
								<td>{{ $row->fechafin }}</td>
								@endif
								<td>{{ $row->lclfechaini }}</td>
								<td>{{ $row->lclfechafin }}</td>
								<td>
									@if ($row->estado == 1)
										<span class="badge bg-gradient-success">Activo</span>
									@else
										<span class="badge bg-gradient-danger">Inactivo</span>
									@endif
								</td>
								<td width="90">
								<div class="btn-group">
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Opciones
									</button>
									<div class="dropdown-menu dropdown-menu-right">
									{{-- <a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Editar </a> --}}
									<a href="{{url('promociones/edit/'.$row->id)}}" class="dropdown-item"> <i class="fa fa-edit"></i> Editar</a>
									<a class="dropdown-item" onclick="confirm('Confirm Delete Promocione id {{$row->id}}? \nDeleted Promociones cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Eliminar </a>   
									</div>
								</div>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $promociones->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>