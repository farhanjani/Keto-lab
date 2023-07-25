@extends('layout.main')
	@section('main-section')
    <div class="contact">
        <div class="container bdinpad">
          <p class="heading">Contact Us </p>
          <ul class="cont-list1">
            <li>
              <img src="{{ asset('assets/keto_assets/images/location.jpg') }}" alt="">
              <p class="cont-list1-p1">Location</p>
              <p class="cont-list1-p2">Glengarry Technology Inc</p>
              <p class="cont-list1-p2">676 E 100 N, American Fork, UT 84003-2112</p>
            </li>
            <li>
              <img src="{{ asset('assets/keto_assets/images/call.jpg') }}" alt="">
              <p class="cont-list1-p1">Phone</p>
              <p class="cont-list1-p2 bdfont">(877)202-5676 </p>
            </li>
            <li>
              <img src="{{ asset('assets/keto_assets/images/mail.jpg') }}" alt="">
              <p class="cont-list1-p1">Mail</p>
              <p class="cont-list1-p2 bdfont">care@goldlabsolutions.com</p>
            </li>
            <li>
              <img src="{{ asset('assets/keto_assets/images/location.jpg') }}" alt="">
              <p class="cont-list1-p1">Return Address</p>
              <p class="contl-txt">PO Box 152601 Tampa, Fl 33684, USA</p>
            </li>
            <li>
              <img src="{{ asset('assets/keto_assets/images/time.png') }}" alt="">
              <p class="cont-list1-p1">Operation Hours</p>
              <p class="contl-txt">Monday-Saturday: 9 am to 5 pm EST</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
		@push('title')
      Gold Lab Solutions
		@endpush
	@endsection
