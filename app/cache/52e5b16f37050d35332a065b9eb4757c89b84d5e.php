Header navbar start -->
<div class="header-topbar style-2">
    <div class="container padding-none">
        <div class="row">
            <div class="col-md-8 col-sm-6 welcome-top">
                <ul class="list-inline top-icon">
                    <li><i class="fa fa-envelope"></i> dotienduc1998@gmail.com</li>
                    <li><i class="fa fa-clock-o"></i> Mon - Sat 8.00 - 18.00</li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-6">
                <ul class="list-inline text-right icon-style-1">
                    <li class=" hvr-rectangle-out"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li class=" hvr-rectangle-out"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li class=" hvr-rectangle-out"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li class=" hvr-rectangle-out"><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                    <li class=" hvr-rectangle-out"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="main-navbar conner-style style-2 position-fixed">
    <div class="container padding-none">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <?php if(empty($id)): ?>
                        <a class="navbar-brand dis-none" href="index-2.html"><img src="../img/logo-black.png" alt="">
                        </a>
                        <a class="navbar-brand dis-block" href="index-2.html"><img src="../img/logo-black.png" alt="">
                        </a>
                        <?php else: ?>
                        <a class="navbar-brand dis-none" href="index-2.html"><img src="../../img/logo-black.png" alt="">
                        </a>
                        <a class="navbar-brand dis-block" href="index-2.html"><img src="../../img/logo-black.png" alt="">
                        </a>
                        <?php endif; ?>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" data-hover="dropdown" data-animations-delay="1.8s" data-animations="fadeInUp">
                        <ul class="nav navbar-nav bg-none navbar-right style-3">
                            <li class="dropdown active">
                                <?php if(empty($id)): ?>
                                <a href="../home/index">Trang trủ</span> </a>
                                <?php else: ?>
                                <a href="../../home/index">Trang trủ</span> </a>
                                <?php endif; ?>
                            </li>
                            <li class="dropdown">
                                <?php if(empty($id)): ?>
                                <a href="../BacsiController/listDoctor"> <span data-hover="Doctors">Bác sĩ</span></a>
                                <?php else: ?>
                                <a href="../../BacsiController/listDoctor"> <span data-hover="Doctors">Bác sĩ</span></a>
                                <?php endif; ?>
                                
                            </li>
                            <li class="dropdown">
                                <?php if(empty($id)): ?>
                                <a href="../ShopController/shop" class="dropdown-toggle"><span data-hover="Pages">Cửa hàng</span></a>
                                <?php else: ?>
                                <a href="../../ShopController/shop" class="dropdown-toggle"><span data-hover="Pages">Cửa hàng</span></a>
                                <?php endif; ?>
                                
                            </li>
                            <li class="dropdown">
                                <?php if(empty($id)): ?>
                                <a href="../blogController/blog"><span data-hover="Blog">Blog</span></a>
                                <?php else: ?>
                                <a href="../../blogController/blog"><span data-hover="Blog">Blog</span></a>
                                <?php endif; ?>
                            </li>
                            <li class="dropdown">
                                <?php if(empty($id)): ?>
                                <a href="../home/lienHe">Liên hệ</span></a>
                                <?php else: ?>
                                <a href="../../home/lienHe">Liên hệ</span></a>
                                <?php endif; ?>
                            </li>
                            <li>
                                <div class="dropdown-buttons">
                                    <div class="btn-group menu-search-box">
                                        <button type="button" class="btn dropdown-toggle" id="header-drop-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon icon-Search"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-right dropdown-animation" aria-labelledby="header-drop-3">
                                            <li>
                                                <form role="search" class="search-box">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Search">
                                                        <i class="icon icon-Search form-control-feedback"></i>
                                                    </div>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-group shopping-cart">
                                        <button type="button" class="btn dropdown-toggle" id="header-drop-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon icon-ShoppingCart"></i><span class="menu-cart badge">8</span></button>
                                        <ul class="dropdown-menu dropdown-menu-right cart dropdown-animation" aria-labelledby="header-drop-4">
                                            <li>
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="quantity">Số lượng</th>
                                                            <th class="product">Sản phẩm</th>
                                                            <th class="amount">Tổng tiền</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="table-order">
                                                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td class="quantity"><?php echo e($item['product_quantity']); ?> x</td>
                                                            <td class="product"><a href="shop-product.html"><?php echo e($item['product_name']); ?></a></td>
                                                            <td class="amount">$ <?php echo e($item['product_quantity'] * $item['product_price']); ?>/td>
                                                        </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td class="total-quantity" colspan="2"><strong>Tổng <?php echo e($totalItem); ?> Items</strong></td>
                                                            <td class="total-amount"><strong>$ <?php echo e($total); ?></strong></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="panel-body text-right">
                                                    <?php if(empty($id)): ?>
                                                    <a href="../ShopController/shoppingCart" class="menu-shop-btn">Xem giỏ hàng</a>
                                                    <a href="../ShopController/checkout" class="menu-shop-btn">Thanh toán</a>
                                                    <?php else: ?>
                                                    <a href="../../ShopController/shoppingCart" class="menu-shop-btn">Xem giỏ hàng</a>
                                                    <a href="../../ShopController/checkout" class="menu-shop-btn">Thanh toán</a>
                                                    <?php endif; ?>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
    <!-- Header navbar end<?php /**PATH C:\xampp\htdocs\mvc\app\views\home\partial/header.blade.php ENDPATH**/ ?>