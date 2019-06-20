<?php

namespace App\iplm;

interface ProductIplm
{
	public function getProducts();
	public function getDetailProduct($id_product);
	
}
