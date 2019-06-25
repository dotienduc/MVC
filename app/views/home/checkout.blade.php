@extends('master')
@section('content')
<section class="inner-bg over-layer-black" style="background-image: url('../img/bg/4.jpg')">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="mini-title inner-style-2">
					<h3>Shop </h3>
					<p><a href="index-one.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">Shop </a></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="shop-tab">
					<div class="shop-tab-inner">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active">
								<a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
									<span class="round-tab">
										<i class="fa fa-map-o"></i> Địa chỉ thanh toán
									</span>
								</a>
							</li>
						</ul>
					</div>

					<div class="tab-content">
						<div class="tab-pane active" role="tabpanel" id="step1">
							<div class="panel panel-info panel-border">
								<div class="panel-heading panel-bg"><i class="fa fa-map-o"></i> Địa chỉ giao hàng</div>
								<form action="" method="POST" id="form-checkout">
									<div class="panel-body">
										<div class="form-group">
											<div class="col-md-6 col-xs-12">
												<strong>Họ:</strong>
												<input type="text" name="first_name" class="form-control" placeholder="Họ của bạn" value="" />
											</div>
											<div class="span1"></div>
											<div class="col-md-6 col-xs-12">
												<strong>Tên:</strong>
												<input type="text" name="last_name" class="form-control" placeholder="Tên của bạn"  value="" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-6 col-xs-12">
												<strong>Số điện thoại:</strong>
												<input type="text" name="phone_number" placeholder="Số điện thoại của bạn"  class="form-control" value="" />
											</div>
											<div class="span1"></div>
											<div class="col-md-6 col-xs-12">
												<strong>Giới tính:</strong>
												<select name="gender" id="gender" class="form-control" required="required">
													<option value="">Chọn giới tính</option>
													<option value="nam">Nam</option>
													<option value="nữ">Nữ</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12"><strong>Địa chỉ:</strong></div>
											<div class="col-md-12">
												<input type="text" name="address" class="form-control" placeholder="Địa chỉ nơi bạn"  value="" />
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12"><strong>Thư điện tử:</strong></div>
											<div class="col-md-12"><input type="text" name="email_address"  placeholder="Hòm thư của bạn"  class="form-control" value="" /></div>
										</div>
										<div class="form-group">
											<div class="col-md-12"><strong>Ghi chú:</strong></div>
											<div class="col-md-12"><input type="text" name="note"  placeholder="Ghi chú của bạn"  class="form-control" value="" /></div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<input type="hidden" name="hidden_total" id="hidden_total" value="{{ $total + $shipping }}">
												<button type="submit" class="btn btn-theme btn-block">Save and continue</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-6 form-horizontal">
				<div class="panel panel-info panel-border margin-top-none">
					<div class="panel-heading panel-bg">
						<i class="fa fa-television"></i> Xem hóa đơn <div class="pull-right"></div>
					</div>
					<div class="panel-body">
						@if(isset($items))
						@foreach($items as $item)
						<div class="form-group">
							<div class="col-sm-3 col-xs-3">
								<img class="img-responsive" src="../img/shop/{{ $item['product_image'] }}" />
							</div>
							<div class="col-sm-6 col-xs-6">
								<div class="col-xs-12">{{ $item['product_name'] }}</div>
								<div class="col-xs-12"><small>Số lượng :<span>{{ $item['product_quantity'] }}</span></small></div>
							</div>
							<div class="col-sm-3 col-xs-3 text-right">
								<h5><span>$</span>{{ $item['product_quantity'] * $item['product_price'] }}</h5>
							</div>
						</div>
						<div class="form-group"><hr /></div>
						@endforeach
						@endif
						<div class="form-group">
							<div class="col-xs-12">
								<strong>Tổng tiền</strong>
								<div class="pull-right"><span>$</span><span>{{ $total }}</span></div>
							</div>
							<div class="col-xs-12">
								<small>Phí giao hàng</small>
								<div class="pull-right"><span>+ ${{ $shipping }}</span></div>
							</div>
						</div>
						<div class="form-group"><hr /></div>
						<div class="form-group">
							<div class="col-xs-12">
								<strong>Tổng tiền của hóa đơn</strong>
								<div class="pull-right"><span>$</span><span>{{ $total + $shipping }}</span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row margin-top-50">
					<div class="col-md-6">
						<div class="service-item style-2 text-center bg-f8">
							<div class="margin-bottom-20">
								<i class="pe-7s-clock"></i>
							</div>
							<div class="content">
								<h5><a href="#">Business Hours</a></h5>
								<p>Monday-Friday: 10am to 8pm <br>Saturday: 11am to 3pm</p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="service-item style-2 text-center bg-f8">
							<div class="margin-bottom-20">
								<i class="pe-7s-server"></i>
							</div>
							<div class="content">
								<h5><a href="#">24 Hours Support</a></h5>
								<p>Monday-Friday: 10am to 8pm <br>Saturday: 11am to 3pm</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Cảm ơn bạn đã tin tưởng mua sản phẩm của chúng tôi</p>
				<p>Chúc bạn một ngày tốt lành</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
	$(document).ready(function(){
		$('#form-checkout').on('submit', function(e){
			e.preventDefault();
			var form_data = $(this).serialize();
			$.ajax({
				url: "../ShopController/payBill",
				method: "POST",
				data: form_data,
				success:function(data)
				{
					setTimeout(() => {
					  $('#modalMessage').modal('show');
					}, 50);
				}
			});
		});
	});
</script>
@endsection