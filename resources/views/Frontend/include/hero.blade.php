  <!--=========== Hero Section Begin ============-->
  <section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('Frontend.include.category')
            </div>
        </div>
        <!--======== Include Success Message =========-->
        @include('include.error')
        @include('include.success')
        <div class="row">
            <div class="col-lg-12">
                <div class="hero__item set-bg" data-setbg="{{asset('frontend')}}/img/hero/banner.jpg">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>Vagetable <br />100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="{{url('/shop')}}" class="primary-btn">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
<!--========= Hero Section End =========-->	