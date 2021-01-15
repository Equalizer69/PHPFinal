@extends("layouts.main")

@section("page_title", "Home")


@section("content")

	<div class="home">


		<h2>Last 4 song</h2>

		<div class="home_content">
			@foreach($songs as $song)
			<div class="item">
				<a href="/song/{{ $song->id }}">
					<img src="{{ $song->img }}">
					<div class="desc">
						<span data-id="{{ $song->id }}">
							<i class="far fa-star"></i>
						</span>
						<p>{{$song->title}}</p>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>


@endsection
