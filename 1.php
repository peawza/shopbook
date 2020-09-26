<?php
include('include/importcss.php'); // เรียกใช่ไฟล์ include css
?>
<section class="container">
    <h3 class="border-short-bottom text-center"> มีสินค้าให้เลือกดูมากมาย</h3>
    <div class="row">
        <section class="col-6 col-sm-4 col-xl-3 p-2">
            <form action="index.php?action=add&amp;id_product=3" method="post">
                <div class="card h-100 ">
                    <a href="product_detail.php?id_product=3" class="warpper-card-img">
                        <img class="card-img-top "
                            src="https://shoppingmarketplus.com/upload_product/15797122714676.jpg"
                            alt="Card image Product">
                    </a>


                    <div class="card-body ">
                        <h3 class="text-product"> SWP SMOOTH SUN SCREEN </h3>
                        <strong class="text-price"> ราคา 350 บาท </strong>
                        <div>
                            <input type="number" class="input-no-spinner text-right setInput" id="quantity"
                                name="quantity" value="1" min="1">
                        </div>

                        <input type="hidden" name="hidden_image" value="15797122714676.jpg">
                        <input type="hidden" name="hidden_name" value="SWP SMOOTH SUN SCREEN ">
                        <input type="hidden" name="hidden_price" value="350.00">
                        <input type="hidden" name="hidden_price" value="450.00">

                        <button href="product_detail.php?id_product=3" class="btnDetail d-block mx-auto mt-2"> <i
                                class="fa fa-eye"></i> ดูรายละเอียด </button>
                        <button type="submit" name="add_to_cart" value="Add to Cart" class="btnBuy d-block mx-auto"><i
                                class="fa fa-shopping-cart"></i> สั่งซื้อสินค้า </button>
                    </div>



                </div>
            </form>
        </section>
        <section class="col-6 col-sm-4 col-xl-3 p-2">
            <form action="index.php?action=add&amp;id_product=4" method="post">
                <div class="card h-100 ">
                    <a href="product_detail.php?id_product=4" class="warpper-card-img">
                        <img class="card-img-top "
                            src="https://shoppingmarketplus.com/upload_product/15797123115878.jpg"
                            alt="Card image Product">
                    </a>


                    <div class="card-body ">
                        <h3 class="text-product"> SWP สมุนไพรชาววัง ราชินี </h3>
                        <strong class="text-price"> ราคา 190 บาท </strong>
                        <div>
                            <input type="number" class="input-no-spinner text-right setInput" id="quantity"
                                name="quantity" value="1" min="1">
                        </div>

                        <input type="hidden" name="hidden_image" value="15797123115878.jpg">
                        <input type="hidden" name="hidden_name" value="SWP สมุนไพรชาววัง ราชินี">
                        <input type="hidden" name="hidden_price" value="190.00">
                        <input type="hidden" name="hidden_price" value="250.00">

                        <button href="product_detail.php?id_product=4" class="btnDetail d-block mx-auto mt-2"> <i
                                class="fa fa-eye"></i> ดูรายละเอียด </button>
                        <button type="submit" name="add_to_cart" value="Add to Cart" class="btnBuy d-block mx-auto"><i
                                class="fa fa-shopping-cart"></i> สั่งซื้อสินค้า </button>
                    </div>



                </div>
            </form>
        </section>
        <section class="col-6 col-sm-4 col-xl-3 p-2">
            <form action="index.php?action=add&amp;id_product=5" method="post">
                <div class="card h-100 ">
                    <a href="product_detail.php?id_product=5" class="warpper-card-img">
                        <img class="card-img-top "
                            src="https://shoppingmarketplus.com/upload_product/15797120064792.jpg"
                            alt="Card image Product">
                    </a>


                    <div class="card-body ">
                        <h3 class="text-product"> SWP GLUTA FIBER </h3>
                        <strong class="text-price"> ราคา 390 บาท </strong>
                        <div>
                            <input type="number" class="input-no-spinner text-right setInput" id="quantity"
                                name="quantity" value="1" min="1">
                        </div>

                        <input type="hidden" name="hidden_image" value="15797120064792.jpg">
                        <input type="hidden" name="hidden_name" value="SWP GLUTA FIBER ">
                        <input type="hidden" name="hidden_price" value="390.00">
                        <input type="hidden" name="hidden_price" value="490.00">

                        <button href="product_detail.php?id_product=5" class="btnDetail d-block mx-auto mt-2"> <i
                                class="fa fa-eye"></i> ดูรายละเอียด </button>
                        <button type="submit" name="add_to_cart" value="Add to Cart" class="btnBuy d-block mx-auto"><i
                                class="fa fa-shopping-cart"></i> สั่งซื้อสินค้า </button>
                    </div>



                </div>
            </form>
        </section>
        <section class="col-6 col-sm-4 col-xl-3 p-2">
            <form action="index.php?action=add&amp;id_product=5" method="post">
                <div class="card h-100 ">
                    <a href="product_detail.php?id_product=5" class="warpper-card-img">
                        <img class="card-img-top "
                            src="https://shoppingmarketplus.com/upload_product/15797120064792.jpg"
                            alt="Card image Product">
                    </a>


                    <div class="card-body ">
                        <h3 class="text-product"> SWP GLUTA FIBER </h3>
                        <strong class="text-price"> ราคา 390 บาท </strong>
                        <div>
                            <input type="number" class="input-no-spinner text-right setInput" id="quantity"
                                name="quantity" value="1" min="1">
                        </div>

                        <input type="hidden" name="hidden_image" value="15797120064792.jpg">
                        <input type="hidden" name="hidden_name" value="SWP GLUTA FIBER ">
                        <input type="hidden" name="hidden_price" value="390.00">
                        <input type="hidden" name="hidden_price" value="490.00">

                        <button href="product_detail.php?id_product=5" class="btnDetail d-block mx-auto mt-2"> <i
                                class="fa fa-eye"></i> ดูรายละเอียด </button>
                        <button type="submit" name="add_to_cart" value="Add to Cart" class="btnBuy d-block mx-auto"><i
                                class="fa fa-shopping-cart"></i> สั่งซื้อสินค้า </button>
                    </div>



                </div>
            </form>
        </section>
        <section class="col-6 col-sm-4 col-xl-3 p-2">
            <form action="index.php?action=add&amp;id_product=5" method="post">
                <div class="card h-100 ">
                    <a href="product_detail.php?id_product=5" class="warpper-card-img">
                        <img class="card-img-top "
                            src="https://shoppingmarketplus.com/upload_product/15797120064792.jpg"
                            alt="Card image Product">
                    </a>


                    <div class="card-body ">
                        <h3 class="text-product"> SWP GLUTA FIBER </h3>
                        <strong class="text-price"> ราคา 390 บาท </strong>
                        <div>
                            <input type="number" class="input-no-spinner text-right setInput" id="quantity"
                                name="quantity" value="1" min="1">
                        </div>

                        <input type="hidden" name="hidden_image" value="15797120064792.jpg">
                        <input type="hidden" name="hidden_name" value="SWP GLUTA FIBER ">
                        <input type="hidden" name="hidden_price" value="390.00">
                        <input type="hidden" name="hidden_price" value="490.00">

                        <button href="product_detail.php?id_product=5" class="btnDetail d-block mx-auto mt-2"> <i
                                class="fa fa-eye"></i> ดูรายละเอียด </button>
                        <button type="submit" name="add_to_cart" value="Add to Cart" class="btnBuy d-block mx-auto"><i
                                class="fa fa-shopping-cart"></i> สั่งซื้อสินค้า </button>
                    </div>



                </div>
            </form>
        </section>
    </div>
</section>



<?php
include('include/importjavascript.php'); // เรียกใช่ไฟล์ include javascript
?>