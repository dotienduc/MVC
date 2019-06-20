<?php $__env->startSection('content'); ?>
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
										<i class="fa fa-map-o"></i> Billing Address
									</span>
								</a>
							</li>
							<li role="presentation">
								<a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
									<span class="round-tab">
										<i class="fa fa-cc-amex"></i> Payment Methods
									</span>
								</a>
							</li>
							<li role="presentation">
								<a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
									<span class="round-tab">
										<i class="fa fa-gg"></i>  Apply Coupon

									</span>
								</a>
							</li>

							<li role="presentation">
								<a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
									<span class="round-tab">
										<i class="fa fa-check"></i>
									</span>
								</a>
							</li>
						</ul>
					</div>

					<div class="tab-content">
						<div class="tab-pane active" role="tabpanel" id="step1">
							<div class="panel panel-info panel-border">
								<div class="panel-heading panel-bg"><i class="fa fa-map-o"></i> Shipping Address</div>
								<div class="panel-body">
									<div class="form-group">
										<div class="col-md-6 col-xs-12">
											<strong>First Name:</strong>
											<input type="text" name="first_name" class="form-control" placeholder="Your Frst Name" value="" />
										</div>
										<div class="span1"></div>
										<div class="col-md-6 col-xs-12">
											<strong>Last Name:</strong>
											<input type="text" name="last_name" class="form-control" placeholder="Your Last Name"  value="" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12"><strong>Address:</strong></div>
										<div class="col-md-12">
											<input type="text" name="address" class="form-control" placeholder="Your Address"  value="" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12"><strong>Country:</strong></div>
										<div class="col-md-12">
											<input type="text" class="form-control" name="country" value="" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12"><strong>City:</strong></div>
										<div class="col-md-12">
											<input type="text" name="city" class="form-control" placeholder="Your City"  value="" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12"><strong>State:</strong></div>
										<div class="col-md-12">
											<input type="text" name="state" class="form-control" placeholder="Your State"  value="" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
										<div class="col-md-12">
											<input type="text" name="zip_code" class="form-control" placeholder="Your Zip Code" value="" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12"><strong>Phone Number:</strong></div>
										<div class="col-md-12"><input type="text" name="phone_number" placeholder="Your Phone Number"  class="form-control" value="" /></div>
									</div>
									<div class="form-group">
										<div class="col-md-12"><strong>Email Address:</strong></div>
										<div class="col-md-12"><input type="text" name="email_address"  placeholder="Your Email"  class="form-control" value="" /></div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<button type="button" class="btn btn-theme btn-block">Save and continue</button>
										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="tab-pane" role="tabpanel" id="step2">
							<!--CREDIT CART PAYMENT-->
							<div class="panel panel-info panel-border">
								<div class="panel-heading panel-bg"><span><i class="fa fa-lock"></i></span> Secure Payment</div>
								<div class="panel-body">
									<div class="form-group">
										<div class="col-md-12"><strong>Card Type:</strong></div>
										<div class="col-md-12">
											<select id="CreditCardType" name="CreditCardType" class="form-control">
												<option value="5">Visa</option>
												<option value="6">MasterCard</option>
												<option value="7">American Express</option>
												<option value="8">Discover</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12"><strong>Credit Card Number:</strong></div>
										<div class="col-md-12"><input type="text" class="form-control" name="car_number" value="" placeholder="Type Your Credit Card Number" /></div>
									</div>
									<div class="form-group">
										<div class="col-md-12"><strong>Card CVV:</strong></div>
										<div class="col-md-12"><input type="text" placeholder="Type Your Card CVV Number" class="form-control" name="car_code" value="" /></div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<strong>Expiration Date</strong>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<select class="form-control" name="">
												<option value="">Month</option>
												<option value="01">01</option>
												<option value="02">02</option>
												<option value="03">03</option>
												<option value="04">04</option>
												<option value="05">05</option>
												<option value="06">06</option>
												<option value="07">07</option>
												<option value="08">08</option>
												<option value="09">09</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
											</select>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<select class="form-control" name="">
												<option value="">Year</option>
												<option value="2015">2015</option>
												<option value="2016">2016</option>
												<option value="2018">2018</option>
												<option value="2018">2018</option>
												<option value="2019">2019</option>
												<option value="2020">2020</option>
												<option value="2021">2021</option>
												<option value="2022">2022</option>
												<option value="2023">2023</option>
												<option value="2024">2024</option>
												<option value="2025">2025</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12 margin-bottom-10">
											<p>Pay secure using your credit card.</p>
										</div>
										<div class="col-md-12 margin-bottom-30">
											<ul class="cards">
												<li class="visa hand">Visa</li>
												<li class="mastercard hand">MasterCard</li>
												<li class="amex hand">Amex</li>
											</ul>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<button type="button" class="btn btn-theme btn-block">Save and continue</button>
										</div>
									</div>
								</div>
							</div>
							<!--CREDIT CART PAYMENT END-->
						</div>
						<div class="tab-pane" role="tabpanel" id="step3">

							<!--CREDIT CART PAYMENT-->
							<div class="panel panel-info panel-border">
								<div class="panel-heading panel-bg"><span><i class="fa fa-gg"></i></span>   Apply Coupon</div>
								<div class="panel-body">
									<div class="form-group">
										<div class="col-md-12"><strong>Apply Coupon:</strong></div>
										<div class="col-md-12"><input type="text" class="form-control" name="car_number" value="" placeholder="Type Your Coupon Number" /></div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<button type="button" class="btn btn-black btn-block margin-bottom-10 text-uppercase">Skip and continue</button>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<button type="button" class="btn btn-theme btn-block">Save and continue</button>
										</div>
									</div>
								</div>
							</div>
							<!--CREDIT CART PAYMENT END-->
						</div>
						<div class="tab-pane" role="tabpanel" id="complete">
							<!--CREDIT CART PAYMENT-->
							<div class="panel panel-info panel-border">
								<div class="panel-heading panel-bg"><span><i class="fa fa-check"></i></span>   Complete</div>
								<div class="panel-body">
									<h3>Complete</h3>
									<p>You have successfully completed all Shopping.</p>
								</div>
							</div>
							<!--CREDIT CART PAYMENT END-->
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-6 form-horizontal">
				<div class="panel panel-info panel-border margin-top-none">
					<div class="panel-heading panel-bg">
						<i class="fa fa-television"></i> Review Order <div class="pull-right"></div>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<div class="col-sm-3 col-xs-3">
								<img class="img-responsive" src="../img/shop/c3.jpg" />
							</div>
							<div class="col-sm-6 col-xs-6">
								<div class="col-xs-12">Title Here</div>
								<div class="col-xs-12"><small>Quantity:<span>1</span></small></div>
							</div>
							<div class="col-sm-3 col-xs-3 text-right">
								<h5><span>$</span>25.00</h5>
							</div>
						</div>
						<div class="form-group"><hr /></div>
						<div class="form-group">
							<div class="col-sm-3 col-xs-3">
								<img class="img-responsive" src="../img/shop/c2.jpg" />
							</div>
							<div class="col-sm-6 col-xs-6">
								<div class="col-xs-12">Title Here</div>
								<div class="col-xs-12"><small>Quantity:<span>1</span></small></div>
							</div>
							<div class="col-sm-3 col-xs-3 text-right">
								<h5><span>$</span>25.00</h5>
							</div>
						</div>
						<div class="form-group"><hr /></div>
						<div class="form-group">
							<div class="col-sm-3 col-xs-3">
								<img class="img-responsive" src="../img/shop/c1.jpg" />
							</div>
							<div class="col-sm-6 col-xs-6">
								<div class="col-xs-12">Title Here</div>
								<div class="col-xs-12"><small>Quantity:<span>2</span></small></div>
							</div>
							<div class="col-sm-3 col-xs-3 text-right">
								<h5><span>$</span>50.00</h5>
							</div>
						</div>
						<div class="form-group"><hr /></div>
						<div class="form-group">
							<div class="col-xs-12">
								<strong>Subtotal</strong>
								<div class="pull-right"><span>$</span><span>100.00</span></div>
							</div>
							<div class="col-xs-12">
								<small>Shipping</small>
								<div class="pull-right"><span>-</span></div>
							</div>
						</div>
						<div class="form-group"><hr /></div>
						<div class="form-group">
							<div class="col-xs-12">
								<strong>Order Total</strong>
								<div class="pull-right"><span>$</span><span>100.00</span></div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mvc\app\views\home/checkout.blade.php ENDPATH**/ ?>