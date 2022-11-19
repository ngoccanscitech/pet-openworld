<ul id="nav" class="nav justify-content-center">
	@foreach($headerMenu as $value)
		@php
			$class_active ='';
		@endphp
		@if(empty($value['child']))
			<li class="nav-item "><a class="nav-link {{$class_active}}" href="{{ url($value['link']) }}">{{$value['label']}}</a></li>
		@else
			<li class="nav-item has_child"><a class="nav-link {{$class_active}}" href="{{ url($value['link']) }}">{{$value['label']}}</a>
				<ul class="subnav">
					@foreach($value['child'] as $value_child)
					@php
						$class_active_child="";
					@endphp
					@if(empty($value_child['child']))
						<li class=""><a class="nav-link {{$class_active_child}}" href="{{ url($value_child['link']) }}">{{$value_child['label']}}</a></li>
					@else
						<li class="chev-right {{$class_active_child}}"><a class="nav-link" href="{{ url($value_child['link']) }}">{{$value_child['label']}}</a></i>
							<ul class="subnav">
								@foreach($value_child['child'] as $value_child_2)
									<li><a href="{{ url($value_child_2['link']) }}">{{$value_child_2['label']}}</a></li>
								@endforeach
							</ul>
						</li>
					@endif
				@endforeach
				</ul>
			</li>
		@endif
	@endforeach
	<li></li>
</ul>