@extends('layout.main')
	@section('main-section')
    <div class="trms-sec2">
        <div class="container">
          <p class="clearall"></p>
          <p class="heading">Ingredients For Keto (60 Capsules)</p>
          <img src="{{ asset('assets/keto_assets/images/keto-ing.png') }}" alt="">
          <p class="heading">Ingredients For Cleanse (60 Capsules)</p>
          <img src="{{ asset('assets/keto_assets/images/cleanse-img.png') }}" alt="">
        </div>
      </div>
		@push('title')
      Gold Lab Solutions
		@endpush
	@endsection
