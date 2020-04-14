<!-- banner -->
<div class="banner">
    <div class="container">
        <h3>StarCCTV, <span>Special Offers</span></h3>
    </div>
</div>
<!-- //banner -->

<!-- new-products -->
<div class="new-products">
		<div class="container">
			<h3>New Products</h3>
			<div class="agileinfo_new_products_grids">
            @forelse ($products as $row)
				<div class="col-md-3 agileinfo_new_products_grid">               
					<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
						<div class="hs-wrapper hs-wrapper1">
                            <img src="{{ asset('storage/products/' . $row->image) }}" alt=" " class="img-responsive" />
                            <img src="{{ asset('storage/products/' . $row->image) }}" alt=" " class="img-responsive" />
							<img src="{{ asset('storage/products/' . $row->image) }}" alt=" " class="img-responsive" />
							<div class="w3_hs_bottom w3_hs_bottom_sub">
								<ul>
									<li>
										<a href="#" data-toggle="modal" data-target="#myModal{{$row->id}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
									</li>
								</ul>
							</div>
						</div>
						<h5><a href="{{ url('/product/' . $row->slug) }}">{{$row->name}}</a></h5>
						<div class="simpleCart_shelfItem">
							<p><i class="item_price">Rp {{ number_format($row->sell_price) }}</i></p>
						</div>
					</div>
				</div>
                @endforeach
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //new-products -->
	<!-- Modal Pop Up -->
	@forelse ($products as $row)
	<div class="modal video-modal fade" id="myModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<div class="col-md-5 modal_body_left">
							<img src="{{ asset('storage/products/' . $row->image) }}" alt=" " class="img-responsive" />
						</div>
						<div class="col-md-7 modal_body_right">
							<h4>{{$row->name}}</h4>
							<p>{!! $row->description !!}</p>							
								<div class="clearfix"> </div>
							</div>
							<div class="modal_body_right_cart simpleCart_shelfItem">
								<p><i class="item_price">Rp {{ number_format($row->sell_price) }}</i></p>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<!-- END Modal Pop Up -->
	@endforeach