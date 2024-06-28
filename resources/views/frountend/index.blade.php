<?php
    use App\Models\Section;
    use App\Models\Product;
    $sections = Section::sections();
    //echo "<pre>"; print_r($sections); die;
?>
@extends('frountend.layout.layout')

@section('content')

<div id="vfx-product-inner-item" style="background-color: rgb(253, 253, 253);">
    <div class="container-fluid">
        <div class="row m-4">
            <div class="col-md-3 col-sm-4 col-xs-12" style="padding: 0 0 0 20px;">
                <div style="max-width: 100%; padding: 40px 10px 30px; background-color: white;">

                    <div class="list-group v-wrapper" style="border: 1px thin black;">
                        <h5 class="text-center text-warning mb-3">Categories</h5>
                        <ul class="v-list animated fadeIn">
                            @foreach ($sections as $section)
                            @if (count($section['categories'])>0)
                            <li class="js-backdro brg">
                                <a href="javascript:;" class="reduce" style="font-size: 15px; font-weight: normal;">
                                    <i class="ion ion-ios-shirt"></i>
                                    {{ $section['name'] }}
                                    <i class="ion ion-ios-arrow-forward iconStyle"></i>
                                </a>
                                <button class="v-button ion ion-md-add"></button>
                                <div class="v-drop-right" style="width: 700px;">
                                    <div class="row">
                                        @foreach ($section['categories'] as $category)


                                        <div class="col-lg-4">
                                            <ul class="v-level-2">
                                                <li>
                                                    <a href="{{ url($category['url']) }}">{{ $category['category_name']
                                                        }}</a>
                                                    <ul>
                                                        @foreach ($category['sub_categories'] as $subcategory)
                                                        <li>
                                                            <a href="{{ url($subcategory['url']) }}">{{
                                                                $subcategory['category_name'] }}</a>
                                                        </li>
                                                        @endforeach

                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            @endif

                            @endforeach



                        </ul>
                    </div>

                </div>

            </div>

            <div class="col-md-9 col-sm-8 col-xs-12" style="padding-right: 50px;">
                <!-- Page-Bar -->
                <div class="page-bar clearfix">
                    <div class="shop-settings">
                        <a id="list-anchor" class="active">
                            <i class="fa fa-th"></i>
                        </a>
                        <a id="grid-anchor">
                            <i class="fa fa-th-list"></i>
                        </a>
                    </div>
                    <!-- Toolbar Sorter 1  -->
                    <div class="toolbar-sorter">
                        <div class="select-box-wrapper">
                            <label class="sr-only" for="sort-by">Sort By</label>
                            <select class="select-box" id="sort-by">
                                <option selected="selected" value="">Sort By: Best Selling</option>
                                <option value="">Sort By: Latest</option>
                                <option value="">Sort By: Lowest Price</option>
                                <option value="">Sort By: Highest Price</option>
                                <option value="">Sort By: Best Rating</option>
                            </select>
                        </div>
                    </div>
                    <!-- //end Toolbar Sorter 1  -->
                    <!-- Toolbar Sorter 2  -->
                    <div class="toolbar-sorter-2">
                        <div class="select-box-wrapper">
                            <label class="sr-only" for="show-records">Show Records Per Page</label>
                            <select class="select-box" id="show-records">
                                <option selected="selected" value="">Show: 8</option>
                                <option value="">Show: 16</option>
                                <option value="">Show: 28</option>
                            </select>
                        </div>
                    </div>
                    <!-- //end Toolbar Sorter 2  -->
                </div>
                <!-- Page-Bar /- -->

                <div class="row">
                    @foreach ($newProducts as $product)
                    <?php  $productsImagePath = 'frontend/images/productImages/small/'. $product['product_image']?>
                    <div class="col-md-3 col-sm-6 col-xs-12 pt-3">

                        <div class="card p-0">
                            <div class="img1"><a href="{{ url('product/'.$product['id']) }}">
                                    @if (!empty($product['product_image']) && file_exists($productsImagePath))
                                    <img src="{{  asset($productsImagePath) }}" alt="">
                                    @else
                                    <img src="{{  asset('frontend/images/productImages/small/not.jpg') }}" alt="">
                                    @endif
                                </a>

                            </div>
                            <div class="product_badge">

                            </div>
                            <div class="img2"><a href="./userProfile.html"><img
                                        src="{{  url('frontend/images/images/main/product/tes-1.png') }}" alt=""
                                        srcset=""></a>
                            </div>
                            <div class="main-text">
                                <p><a href="{{ url('product/'.$product['id']) }}">{{ $product['product_code'] }}</a></p>

                                <h6><a href="{{ url('product/'.$product['id']) }}">{{ $product['product_name'] }}</a>
                                </h6>

                                <p class=""><i class="fa-solid fa-location-dot"></i>
                                    Niger, Nigeria</p>
                            </div>

                            <hr>
                            <div class="link">
                                <ul>
                                    <?php   $getDiscountPrice = Product::getDiscountPrice($product['id']); ?>
                                    @if ($getDiscountPrice>0)
                                    <li><strong>${{ $getDiscountPrice }}</strong> <small><del class="text-danger">${{ $product['product_price'] }}</del></small>
                                    </li>
                                    @else
                                    <li><strong class="text-danger">${{ $product['product_price'] }}</strong>
                                    @endif

                                    <a href="cart.html" title="Add to Cart" class="mx-auto"><i class="icofont-cart"
                                            style="font-size: 20px;"></i></a>
                                    <span class="float-left">
                                       
                                        <li title="Wishlist"><a href="wishlist.html"><i class="icofont-ui-love ml-2"
                                                    style="font-size: 20px;"></i></a></li>
                                    </span>

                                </ul>
                            </div>
                        </div>

                    </div>
                    @endforeach







                    <div class="vfx-person-block">
                        <ul class="vfx-pagination">
                            <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Special Featured Area -->
<section class="special_feature_area sorts-by-results pt-5" style="background-color: #f0eeeb;">
    <div class="container">
        <div class="row">
            <!-- Single Feature Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single_feature_area mb-5 d-flex align-items-center">
                    <div class="feature_icon">
                        <i class="icofont-ship"></i>
                        <span><i class="icofont-check-alt"></i></span>
                    </div>
                    <div class="feature_content">
                        <h6>Free Shipping</h6>
                        <p>For orders above $100</p>
                    </div>
                </div>
            </div>

            <!-- Single Feature Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single_feature_area mb-5 d-flex align-items-center">
                    <div class="feature_icon">
                        <i class="icofont-box"></i>
                        <span><i class="icofont-check-alt"></i></span>
                    </div>
                    <div class="feature_content">
                        <h6>Happy Returns</h6>
                        <p>7 Days free Returns</p>
                    </div>
                </div>
            </div>

            <!-- Single Feature Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single_feature_area mb-5 d-flex align-items-center">
                    <div class="feature_icon">
                        <i class="icofont-money"></i>
                        <span><i class="icofont-check-alt"></i></span>
                    </div>
                    <div class="feature_content">
                        <h6>100% Money Back</h6>
                        <p>If product is damaged</p>
                    </div>
                </div>
            </div>

            <!-- Single Feature Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single_feature_area mb-5 d-flex align-items-center">
                    <div class="feature_icon">
                        <i class="icofont-live-support"></i>
                        <span><i class="icofont-check-alt"></i></span>
                    </div>
                    <div class="feature_content">
                        <h6>Dedicated Support</h6>
                        <p>We provide support 24/7</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Special Featured Area -->

@endsection