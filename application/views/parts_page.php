<h1>Parts</h1>

<div class="row">
	{parts}
		<div class="col-xs-4">
			<a href="/parts/{id}">
				<img class="img-responsive" src="/pix/parts/{part_code}.jpeg" title="{part_code}">
			</a>
			<h5>Piece type: {piece_type}</h5>
			<h5>Line: {line}</h5>
		</div>
	{/parts}
</div>