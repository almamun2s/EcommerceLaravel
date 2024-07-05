<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">

            @php
                $products = App\Models\Product::latest()->limit(6)->get();
            @endphp
            @forelse ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="{{ route('cart.add', $product) }}" class="option1">Add to Cart</a>
                                <a href="#" class="option2">Buy Now</a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="{{ $product->getImg() }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>{{ $product->name }}</h5>
                            <h6>${{ $product->price }}</h6>
                        </div>
                    </div>
                </div>
            @empty
            <h6 class="col-md-12 text-center">No products to show.</h6>
            @endforelse


        </div>
        <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div>
    </div>
</section>
