@extends('layouts.creole')

@section('title')
	Creole Galaxy Mode
@endsection

@section('galaxy')
	<div class="window" style="background-color: #232323;">
		<div class="galaxy">
			@for($i=0;$i < $solarSystem; $i++)
			<div class={{$number[$i]}}>
				<div class="orbit" style="top:{{$positionY}}px;left:{{$positionX}}px;">
					<div class="external">
						@for($j = $int; $j < $ext + $int; $j++)
						<div class={{$number[$j - $int]}}>
							<div class="planet">
								<div class="text">
									{{$planets[$i][$j]->word}}
								</div>
							</div>
						</div>
						@endfor
					</div>
					<div class="internal" style="top:250px;left:250px;">
						<div class="star" style="top:125px;left:125px;" data-toggle="modal" data-target="{{'#exampleModal' . $i}}">
							<div class="text">
								@empty($topic)
								@else
								<strong>{{$topic[$i]->word}}</strong>
								@endempty
							</div>
						</div>
						@for($j = 0; $j < $int; $j++)
						<div class={{$number[$j]}}>
							<div class="planet">
								<div class="text">
									<form method="post" name="form_{{$i}}_{{$j}}" action="{{route('galaxy')}}">{{csrf_field()}}
									    <input type="hidden" name="topic" value="{{$planets[$i][$j]->word}}">
									    <a href="javascript:form_{{$i}}_{{$j}}.submit()">{{$planets[$i][$j]->word}}</a>
									</form>
								</div>
							</div>
						</div>
						@endfor
					</div>
				</div>
			</div>
			<script type="text/javascript">
				makeInternalSolarSystem({{$i}},{{$int}},{{$positionX}},{{$positionY}});
				makeExternalSolarSystem({{$i}},{{$ext}},{{$positionX}},{{$positionY}});
			</script>
			@endfor
		</div>
	</div>
	@for($i = 0;$i < $solarSystem;$i++)
		@include('layouts.modal')
	@endfor
@endsection