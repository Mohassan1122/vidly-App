<?php
    use App\Models\Product;;
?>
@extends('frountend.layout.layout')

@section('content')


<!-- Page Introduction Wrapper -->
<div class="page-style-a">
    <div class=" container">
        <div class="page-intro">
            <h2>Shop</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="index.html">Home</a>
                </li>
                <li class="is-marked">
                    <a href="listing.html">Shop</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Introduction Wrapper /- -->
<!-- Shop-Page -->
<div class="page-shop u-s-p-t-80" style="background-color: rgb(253, 253, 253);">
    <div class="container">
        <!-- Shop-Intro -->
        <div class="shop-intro">
            <ul class="bread-crumb">
                <li class="has-separator">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <?php echo $categoryDetails['breadcrumbs'] ?>
            </ul>
        </div>
        <!-- Shop-Intro /- -->
        <div class="row">

            <!-- Shop-Left-Side-Bar-Wrapper -->
            @include('frountend.products.filter')
            <!-- Shop-Left-Side-Bar-Wrapper /- -->

            <!-- Shop-Right-Wrapper -->
            <div class="col-lg-9 col-md-9 col-sm-12">
                <!-- Page-Bar -->
                <div class="page-bar clearfix">
                    <div class="shop-settings">
                        <a id="list-anchor">
                            <i class="fas fa-th-list"></i>
                        </a>
                        <a id="grid-anchor" class="active">
                            <i class="fas fa-th"></i>
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
                                <option selected="selected" value="">Show: {{ count($categoryProduct) }}</option>
                                <option value="">Show: All</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="toolbar-sorter-2">
                        <div class="select-box-wrapper">
                            <label class="sr-only" for="show-records">Show Records Per Page</label>
                            <select class="select-box" id="show-records">
                                <option selected="selected" value="">Show: 8</option>
                                <option value="">Show: 16</option>
                                <option value="">Show: 28</option>
                            </select>
                        </div>
                    </div> --}}
                    <!-- //end Toolbar Sorter 2  -->
                </div>
                <!-- Page-Bar /- -->


                <div class="row product-container list-style">
                    @foreach ($categoryProduct as $product)
                    <div class="product-item col-lg-4 col-md-6 col-sm-6">
                        <div class="item">
                            <div class="image-container">

                                <a class="item-img-wrapper-link" href="#">
                                    <?php
                                     $productsImagePath = 'frontend/images/productImages/small/'. $product['product_image']?>
                                    @if (!empty($product['product_image']) && file_exists($productsImagePath))
                                    <img class="img-fluid" src="{{  asset($productsImagePath) }}" alt="Product">
                                    @else
                                    <img class="img-fluid"
                                        src="{{  asset('frontend/images/productImages/small/not.jpg') }}" alt="">
                                    @endif
                                </a>
                                <div class="item-action-behaviors">
                                    <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                                    <a class="item-mail" href="javascript:void(0)">Mail</a>
                                    <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                    <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                </div>
                            </div>
                            <div class="item-content">
                                <div class="what-product-is">
                                    <ul class="bread-crumb">
                                        <li class="has-separator">
                                            <a href="shop-v1-root-category.html">{{ $product['product_code'] }}</a>
                                        </li>
                                        <li class="has-separator">
                                            <a href="listing.html">{{ $product['product_color'] }}</a>
                                        </li>
                                        <li class="has-separator">
                                            <a href="listing.html">{{ $product['brand']['name'] }}</a>
                                        </li>
                                    </ul>
                                    <h6 class="item-title">
                                        <a href="single-product.html">{{ $product['product_name'] }}</a>
                                    </h6>
                                    <div class="item-description">
                                        <p>{{ $product['description'] }}</p>
                                    </div>
                                    {{-- <div class="item-stars">
                                        <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                            <span style='width:67px'></span>
                                        </div>
                                        <span>(23)</span>
                                    </div> --}}
                                </div>
                                <div class="price-template">

                                    <?php   $getDiscountPrice = Product::getDiscountPrice($product['id']); ?>
                                    @if ($getDiscountPrice>0)

                                    <div class="item-new-price">
                                        ${{ $getDiscountPrice }}
                                    </div>
                                    <div class="item-old-price">
                                        ${{ $product['product_price'] }}
                                    </div>
                                    @else
                                    <div class="item-old-price">
                                        ${{ $product['product_price'] }}
                                    </div>
                                    @endif



                                </div>
                            </div>
                            <?php $isProductNew = Product::isProductNew($product['id']);  ?>
                            @if ($isProductNew=="Yes")
                            <div class="tag new">
                                <span>NEW</span>
                            </div>
                            @endif

                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-4 mb-4">{{ $categoryProduct->links() }}</div>
                <!-- Row-of-Product-Container /- -->
                <div>{{ $categoryDetails['categoryDetails']['description'] }}</div>



            </div>



            <!-- Shop-Right-Wrapper /- -->

            
        </div>
    </div>
</div>

@endsection