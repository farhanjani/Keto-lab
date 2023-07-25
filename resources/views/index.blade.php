@extends('layout.main')
	@section('main-section')
    <!--============== HEADER ==============-->
    <div class="top_section">
      <div class="container">
        <div class="s1-mid">
          <p class="s1-txt1">Advanced Dietary Supplement <span>Optimizing The Ketogenic Regimen</span>
          </p>
          <p class="s1-txt2">Experience optimal health and fitness with the nourishing potion of all-advanced and optimally nourishing Keto Diet Supplement. </p>
          <div class="clearall"></div>
          <a href="javascript:bookmarkscroll.scrollTo(&#39;product&#39;);" class="hm-button s2btn">Place Order</a>
        </div>
      </div>
    </div>
    <!--============== SECTION 1 ==============-->
    <div class="section2" id="about">
      <div class="container">
        <div class="s2-inner">
          <p class="heading2">Keto For Wellness With</p>
          <h1 class="heading">Gold Lab Solutions</h1>
          <img src="{{ asset('assets/keto_assets/images/hd-line-lft.png') }}" alt="" class="hd-line-lft show-desk">
          <img src="{{ asset('assets/keto_assets/images/hd-line-ctr.png') }}" alt="" class="hd-line-ctr show-tab">
          <img src="{{ asset('assets/keto_assets/images/s2-mob-prd.png') }}" class="s2-mob-prd show-tab show-mob">
          <p class="strp-txt">Those who follow keto with dedication are likely to shed the extra inches quite fast and easy. But, often it so happens that the typical diet rich in fat content is hard on the body without added nutritional support. <br>
            <br>
            <strong>Gold Lab Solutions</strong> is a trusted wellness brand introducing easy-to-use, optimally fortified, safe and effective keto diet supplement capsule enriched with natural superfoods, which may help promote weight management plans for optimal health and wellbeing.
          </p>
          <div class="clearall"></div>
          <a href="javascript:bookmarkscroll.scrollTo(&#39;product&#39;);" class="hm-button s2btn">Place Order</a>
        </div>
        <div class="s1-btl show-desk">
          <img src="{{ asset('assets/keto_assets/images/prod-1.png') }}" class="s1-btl1">
          <img src="{{ asset('assets/keto_assets/images/prod-1.png') }}" class="s1-btl2">
        </div>
      </div>
    </div>
    <div class="hm-strip">
      <div class="container">
        <p class="heading2">Start Your Journey Towards Better Health</p>
        <h1 class="heading">Daily Health &amp; Wellness</h1>
        <img src="{{ asset('assets/keto_assets/images/stp-prds.png') }}" alt="" class="stp-prds">
      </div>
    </div>
    <div class="section3">
      <div class="container">
        <p class="heading2">A Guide For</p>
        <h1 class="heading">Healthy Living</h1>
        <img src="{{ asset('assets/keto_assets/images/hd-line-ctr.png') }}" alt="" class="hd-line-ctr">
        <p class="strp-txt">Adhering to a healthy lifestyle that comprises the following regimen may help offer best results.</p>
        <ul class="s3-lst">
          <li>
            <img src="{{ asset('assets/keto_assets/images/s3-img1.png') }}" alt="" class="s3-img">
            <div class="s3-btm-bx">
              <img src="{{ asset('assets/keto_assets/images/s3-lst1.png') }}" alt="">
              <span>Eating Habits</span>Daily supplementation &amp; a diet rcih in fat content that includes both macro &amp; micro nutrients.
            </div>
          </li>
          <li>
            <img src="{{ asset('assets/keto_assets/images/s3-img2.png') }}" alt="" class="s3-img">
            <div class="s3-btm-bx">
              <img src="{{ asset('assets/keto_assets/images/s3-lst2.png') }}" alt="">
              <span>Fitness Regimen</span>A dynamic workout routine that includes yoga, aerobics &amp; strength training.
            </div>
          </li>
          <li>
            <img src="{{ asset('assets/keto_assets/images/s3-img3.png') }}" alt="" class="s3-img">
            <div class="s3-btm-bx">
              <img src="{{ asset('assets/keto_assets/images/s3-lst3.png') }}" alt="">
              <span>Hydration &amp; Rest</span>Sufficient water consumption at regular intervals &amp; a restful sleep for an optimum duration.
            </div>
          </li>
        </ul>
      </div>
    </div>
    <!--/*=====SECTION - 5=====*/-->
    <div class="pro-sec1" id="product">
      <div class="container">
        <p class="heading2">shop our</p>
        <h1 class="heading">Popular Products</h1>
        <img src="{{ asset('assets/keto_assets/images/hd-line-ctr.png') }}" alt="" class="hd-line-ctr">
        <ul class="s2list">
          @if(!empty($offers))
            @foreach ($offers as $offer)
              @php
                if(Session::has('cart_offers')){
                  $cart_offers = json_decode(Session::get('cart_offers'), true);
                  if(array_key_exists($offer->id, $cart_offers)){
                    $btn_text = 'Remove from Cart';
                  }
                }
              @endphp
              <li>
                <div class="s2prod">
                  <img src="{{ asset('assets/uploads/'.$offer->image) }}" alt="{{ $offer->title }}" class="s2-prd-1">
                </div>
                <p class="s2lhding">{{ $offer->title }}</p>
                <p class="s2price">Price: <span>${{ $offer->price }}</span>
                </p>
                @if(isset($btn_text))
                  <a href="javascript:void(0)" class="s2btn add-to-cart-sing process-cart" rel="{{ $offer->id }}" url="{{ route('process-cart') }}">{{ $btn_text }}</a>
                @else
                  <a href="javascript:void(0)" class="s2btn add-to-cart-sing process-cart" rel="{{ $offer->id }}" url="{{ route('process-cart') }}">Shop Now</a>
                @endif
              </li>
            @endforeach
          @endif
        </ul>
      </div>
    </div>
    <!-----------SECTION5---------->
		@push('title')
      Gold Lab Solutions
		@endpush
	@endsection
