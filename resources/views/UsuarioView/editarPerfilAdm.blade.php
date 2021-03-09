@extends('layouts.app')
@section('titulo','Editar Conta')
@section('content')

	<form class="shadow p-3 bg-white text-center" style="border-radius: 10px" action= "{{route('update_usuario')}}" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<input type="hidden" name="id" value="{{$usuario->id}}">

		<input type="hidden" name="password" value="{{$usuario->password}}">

		<div class="row" style="background: #1B2E4F; margin-top: -15px; margin-bottom:  30px; border-radius: 10px 10px 0 0; color: white">
            <h1 style="margin: 15px"> Editar conta </h1>
            {{-- <p><a href="">Inicio</a> > <a href="">Olá, fulano</a> > <a href=""></a>Meu Perfil</p> --}}
        </div>

		<div class="form-group justify-content-center row">
			<div class="form-group col-md-8">
		  		<label for="nome">Nome</label>
		  		<input type="text" name="nome" id="nome" placeholder="Nome" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" value="{{$usuario->nome}}" required autofocus>
				@if ($errors->has('nome'))
					<span class = "invalid-feedback" role="alert">
			  			{{$errors->first('nome')}}
					</span>
		  		@endif
			</div>

			<div class="form-group col-md-4">
				<label for="cpf">CPF</label>
				<input type="text" id="cpf" name="cpf" placeholder="xxx.xxx.xxx-xx" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }} cpf" value="{{$usuario->cpf}}" required autofocus>
				@if ($errors->has('cpf'))
					<span class = "invalid-feedback" role="alert">
						{{$errors->first('cpf')}}
					</span>
				@endif
			</div>

			<div class="form-group col-md-6">
				<label for="email">E-mail</label>
				<input type="text" id="email" name="email" placeholder="exemplo@exemplo" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{$usuario->email}}" required autofocus>
				@if ($errors->has('email'))
					<span class = "invalid-feedback" role="alert">
						{{$errors->first('email')}}
					</span>
				@endif
			</div>

			<div class="form-group col-md-2">
				<label for="tipousuario_id">Tipo de usuário</label>
				<select name="tipousuario_id" class="form-control{{ $errors->has('tipousuario_id') ? ' is-invalid' : '' }}" required autofocus>
					@foreach ($tipos_usuario as $tipo_usuario)
						@if ($tipo_usuario->id != 1)
							<option value="{{$tipo_usuario->id}}" {{old('tipousuario') == $tipo_usuario->id ? 'selected' : '' }}>
								{{$tipo_usuario->tipo}}
							</option>
						@endif
					@endforeach
				</select>
				@if ($errors->has('tipousuario_id'))
					<span class = "invalid-feedback" role="alert">
						{{$errors->first('tipousuario_id')}}
					</span>
				@endif
			</div>

			<div class="form-group col-md-4">
				<label for="curso_id">Curso</label>
				<select name="curso_id" class="form-control{{ $errors->has('curso_id') ? ' is-invalid' : '' }}" required autofocus>
					@foreach ($cursos as $curso)
						<option value="{{$curso->id}}" {{$usuario->curso_id == $curso->id ? 'selected' : '' }}>
							{{$curso->curso_nome}}
						</option>
					@endforeach
				</select>
				@if ($errors->has('curso_id'))
					<span class = "invalid-feedback" role="alert">
						{{$errors->first('curso_id')}}
					</span>
				@endif
			</div>

		</div>

		<div class="col-md-12 text-center">
			<button type="submit" name="editar" class="btn btn-primary">Salvar alterações</button><br><br>
		</div>

	</form>
@stop
