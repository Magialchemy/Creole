@extends('layouts.creole')

@section('title')
	Créole クレオール 人と機械の共創サービス
@endsection

@section('galaxy')
	<div class="universe">
		<img src="css/creole_title.png"/>
		<div class="form-group">
			<form method="post" action="/galaxy">{{ csrf_field() }}<input class="form-control" type="text" style="color:black;" placeholder="語句を入力..." name="topic">
			<button type="submit" class="btn btn-primary">つなげる</button>
			</form>
		</div>
	</div>
@endsection