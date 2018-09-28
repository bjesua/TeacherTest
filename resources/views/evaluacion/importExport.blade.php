@extends('layouts.app')

@section('content')


	<div class="container">

		<div class="row">
			<div class="card col-md-6 ">
				<div class="card-header background-card-color">
					Cargar Carreras
				</div>
				<div class="card-body">
					<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importCarrera') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="file" name="import_file" />
						<button class="btn btn-primary">Cargar Archivo</button>
					</form>
					<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Descargar Excel xls</button></a>
					<a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Descargar Excel xlsx</button></a>
					<a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Descargar CSV</button></a>
				</div>
			</div>

			<div class="card col-md-6">
				<div class="card-header background-card-color">
					Cargar Cursos
				</div>
				<div class="card-body">
					<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importCursos') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="file" name="import_file" />
						<button class="btn btn-primary">Cargar Archivo</button>
					</form>
					<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Descargar Excel xls</button></a>
					<a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Descargar Excel xlsx</button></a>
					<a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Descargar CSV</button></a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="card col-md-6 ">
				<div class="card-header background-card-color">
					Cargar Catedraticos
				</div>
				<div class="card-body">
					<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importCatedratico') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="file" name="import_file" />
						<button class="btn btn-primary">Cargar Archivo</button>
					</form>
					<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Descargar Excel xls</button></a>
					<a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Descargar Excel xlsx</button></a>
					<a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Descargar CSV</button></a>
				</div>
			</div>

			<div class="card col-md-6">
				<div class="card-header background-card-color">
					Cargar Alumnos
				</div>
				<div class="card-body">
					<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importAlumno') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<input type="file" name="import_file" />
						<button class="btn btn-primary">Cargar Archivo</button>
					</form>
					<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Descargar Excel xls</button></a>
					<a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Descargar Excel xlsx</button></a>
					<a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Descargar CSV</button></a>
				</div>
			</div>
		</div>



	</div>


@endsection