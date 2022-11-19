<div class="card author-item">
	<div class="author-img">
		<div class="img">
			<img src="{{ asset($author->avatar) }}" alt="{{ $author->fullname }}" class="card-img-top">
		</div>
	</div>
	<div class="details">
		<div class="detail-top">
			<h5 class="card-title title">{{ $author->fullname }}</h5>
			<p class="card-text info">“ {{ $author->slogan }} “</p>
		</div>
		<div class="info-achieve">
			{!! htmlspecialchars_decode( $author->about_me ) !!}
			<a href="{{ route('author.detail', $author->id) }}">Xem thêm</a>
		</div>
	</div>
</div>