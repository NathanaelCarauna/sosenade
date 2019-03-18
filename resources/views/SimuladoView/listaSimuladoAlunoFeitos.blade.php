@extends('layouts.default')
@section('content')

    <div class="shadow p-4 mb-5 bg-white rounded container-fluid" style="overflow-x: auto;">

		<h1 class="text-center"> Simulados </h1>
		<h2 class="text-center">{{$nome_curso}}</h2><br>

		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" href="{{route('list_simulado_aluno')}}">Disponíveis</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="#">Feitos</a>
			</li>
		</ul>

		<table class="table table-hover">
			<tbody>
				@if (!empty($simulados))
					@foreach ($simulados as $simulado)
						<tr>
							<td style="vertical-align:middle">
								<a style="display:block;" class="btn-link" href="{{route('startSimulado', ['id'=>$simulado->id])}}">{{$simulado->descricao_simulado}}</a>
							</td>
						</tr>
					@endforeach
				@else
					<br>
					<p class="text-center alert alert-light">Você não tem simulado feitos</p>
				@endif
			</tbody>
		</table>

		<br>

	</div>
	
@stop