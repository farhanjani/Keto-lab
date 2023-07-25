@extends('layout.main')
	@section('main-section')
 <!--============== CART FORM ==============-->
 <div class="cart-frm">
    <div class="container bdinpad">
      <div class="crt-from-sec dsplay" id="chek-frm">
        <div class="cart-sec1 dsplay">
          <div class="nt-slt" id="cartBox">
            <div class="cart-lft">
              <div class="cart-box1">
                <span class="one"> Products </span>
                <span class="two">Sub Total</span>
                <span class="three">Qty</span>
                <span class="four">Total</span>
              </div>
              @if(!empty($offers_data))
                @foreach ($offers_data as $single_offer)
                  <div class="cart-box2 offers-listing">
                    <div class="one">
                      <p class="cart-prdname">
                        <img src="{{ asset('assets/uploads/'.$single_offer->image) }}" alt="{{ $single_offer->title }}" class="s2-prd-1">
                        <img style="cursor:pointer" src="{{ asset('assets/keto_assets/images/cart-remove1.png') }}" rel="{{ $single_offer->id }}" class="cart-remv remove-offer" url="{{ route('remove-offer') }}">
                        <span class="span2"> {{ $single_offer->title }}
                        </span>
                      </p>
                    </div>
                    <div class="two">
                      <span class="unit-price"> ${{ $single_offer->price }}</span>
                    </div>
                    <div class="three wan-spinner2" style="border-color: rgb(225, 225, 225);">
                      <a href="javascript:void(0)" class="minus minus-offer" rel="{{ $single_offer->id }}"" url="{{ route('minus-offer') }}">-</a>
                      <input type="text" class="qtybox" name="qtybox" value="{{ $single_offer->quantity }}" style="width: 50px;" min="1" readonly>
                      <a href="javascript:void(0)" class="plus plus-offer" rel="{{ $single_offer->id }}"" url="{{ route('plus-offer') }}">+</a>
                    </div>
                    <div class="four">
                      <span class="sub-total">${{ $single_offer->price*$single_offer->quantity }} </span>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
            <div class="card-box3">
              <div class="cart-box1">Order Summary</div>
              <div class="card-box3rgt">
                <ul class="cart-prclist">
                  @php
                    if(Session::has('total')){
                      $total = Session::get('total');
                    }
                  @endphp
                  <li>Sub Total: <span class="span1" id="total-price">${{ isset($total)? $total : '0.00' }}</span></li>
                  <li>Shipping &amp; Handling: <span class="span1" id="shipping-total">$0.00</span></li>
                  <li>
                    <span class="span2">Total:</span>
                    <span class="span1 span2" id="grand-total">${{ isset($total)? $total : '0.00' }}</span>
                  </li>
                </ul>
              </div>
              <div class="card-box4-lft">
                <a href="{{ route('home') }}" class="continue-shpbtn bnrbtn">Continue Shopping </a>
                <a href="javascript:void(0)" rel="{{ route('empty-cart') }}" class="continue-shpbtn bnrbtn empty_cart_btn">Empty Cart </a>
              </div>
            </div>
            {{-- <div class="upsl-blk">
              <div class="upsell-box">
                <div class="offerBox  add-cart-blk">
                  <input type="checkbox" name="prod-opt" id="pack5" class="add-cart-pid add-to-cart cart-upsell" value="175">
                  <label for="pack9" class="upsel-pack">
                    <div class="ofrbx-mdl">
                      <img src="{{ asset('assets/keto_assets/images/prod-2.png') }}" class="offrBx-img1">
                      <p class="up-txt">Add Gold Lab Solutions Cleanse X 1</p>
                      <p class="offrbx-txt2">The Cleanse is a great addition to the Keto supplementation regimen. Add it to your order for just <b>$29.99</b>
                      </p>
                    </div>
                  </label>
                  <a href="javascript:void(0)" class="remove-from-cart cart-upsell re" style="display:none;">Remove</a>
                </div>
              </div>
              <div class="upsell-box">
                <div class="offerBox add-cart-blk">
                  <input type="checkbox" name="prod-opt" id="pack6" class="add-cart-pid add-to-cart cart-upsell" value="176">
                  <label for="pack10" class="upsel-pack">
                    <div class="ofrbx-mdl">
                      <img src="{{ asset('assets/keto_assets/images/prod-2.png') }}" class="offrBx-img1">
                      <img src="{{ asset('assets/keto_assets/images/prod-2.png') }}" class="offrBx-img1">
                      <p class="up-txt">Add Gold Lab Solutions Cleanse X 2</p>
                      <p class="offrbx-txt2">The Cleanse (2 Bottles) is a great addition to the Keto supplementation regimen. Add it to your order for just <b>$59.88</b>
                      </p>
                    </div>
                  </label>
                  <a href="javascript:void(0)" class="remove-from-cart cart-upsell re" style="display:none;">Remove</a>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
        <form id="submitForm" method="POST" rel="{{ route('checkout') }}">
          @csrf
          <div class="frm-box">
            <input type="hidden" name="method" value="order">
            <input type="hidden" name="country" value="US">
            <input type="hidden" id="billShipSame" name="billShipSame" value="1">
            <input type="hidden" name="_token" value="zotKpN4ZO097VkRJK14v2uLds64b00528ded20">
            <input type="hidden" name="product" value="4">
            <div class="crt-frm1" id="frmsec">
              <div class="safebox">
                <div class="safe-iconbox">
                  <!--<img src="{{ asset('assets/keto_assets/images/crt-side-arw.jpg') }}" alt="">-->
                </div>
                <p>Shipping Information </p>
              </div>
              <div class="frm1 dsplay">
                <div class="frmElmnts">
                  <div class="frmfld">
                    <img src="{{ asset('assets/keto_assets/images/name.jpg') }}" alt="" class="icon">
                    <input type="text" name="firstName" placeholder="First Name" id="firstName" value="" required="" maxlength="64">
                  </div>
                </div>
                <div class="frmElmnts">
                  <div class="frmfld">
                    <img src="{{ asset('assets/keto_assets/images/name.jpg') }}" alt="" class="icon">
                    <input type="text" name="lastName" id="lastName" placeholder="Last Name" value="" required="" maxlength="64">
                  </div>
                </div>
                <div class="frmElmnts">
                  <div class="frmfld">
                    <img src="{{ asset('assets/keto_assets/images/mail.jpg') }}" alt="" class="icon">
                    <input type="email" name="emailAddress" id="email" placeholder="E-mail" value="" required="" maxlength="96" class="h5-email" pattern="((([a-zA-Z]|\d|[!#\$%&amp;&#39;\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-zA-Z]|\d|[!#\$%&amp;&#39;\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-zA-Z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-zA-Z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?">
                  </div>
                </div>
                <div class="frmElmnts">
                  <div class="frmfld">
                    <img src="{{ asset('assets/keto_assets/images/phone.jpg') }}" alt="" class="icon">
                    <input type="text" name="phoneNumber" id="phone" placeholder="Phone Number" value="" required="" maxlength="12" class="h5-phone" data-mask="phone" pattern="([\+][0-9]{1,3}([ \.\-])?)?([\(][0-9]{1,6}[\)])?([0-9A-Za-z \.\-]{1,32})(([A-Za-z \:]{1,11})?[0-9]{1,4}?)">
                  </div>
                </div>
                <div class="frmElmnts">
                  <div class="frmfld">
                    <img src="{{ asset('assets/keto_assets/images/address.jpg') }}" alt="" class="icon">
                    <input type="text" name="address1" id="shippingAddress1" placeholder="Address" value="" required="" maxlength="64">
                  </div>
                </div>
                <div class="frmElmnts">
                  <div class="frmfld">
                    <img src="{{ asset('assets/keto_assets/images/city.jpg') }}" alt="" class="icon">
                    <input type="text" name="city" id="shippingCity" placeholder="City" value="" required="" maxlength="32">
                  </div>
                </div>
                <div class="frmElmnts">
                  <div class="frmfld">
                    <img src="{{ asset('assets/keto_assets/images/state.jpg') }}" alt="" class="icon">
                    <select id="country" name="country">
                      <option value="">Select Country</option>
                      <option value="US" selected="">United States</option>
                    </select>
                  </div>
                </div>
                <div class="frmElmnts">
                  <div class="frmfld">
                    <img src="{{ asset('assets/keto_assets/images/state.jpg') }}" alt="" class="icon">
                    <select name="state" id="shippingState" class="field-all">
                      <option value="">Select State</option>
                      <option value="AL">Alabama</option>
                      <option value="AK">Alaska</option>
                      <option value="AZ">Arizona</option>
                      <option value="AR">Arkansas</option>
                      <option value="CA">California</option>
                      <option value="CO">Colorado</option>
                      <option value="CT">Connecticut</option>
                      <option value="DE">Delaware</option>
                      <option value="DC">District of Columbia</option>
                      <option value="FL">Florida</option>
                      <option value="GA">Georgia</option>
                      <option value="HI">Hawaii</option>
                      <option value="ID">Idaho</option>
                      <option value="IL">Illinois</option>
                      <option value="IN">Indiana</option>
                      <option value="IA">Iowa</option>
                      <option value="KS">Kansas</option>
                      <option value="KY">Kentucky</option>
                      <option value="LA">Louisiana</option>
                      <option value="ME">Maine</option>
                      <option value="MD">Maryland</option>
                      <option value="MA">Massachusetts</option>
                      <option value="MI">Michigan</option>
                      <option value="MN">Minnesota</option>
                      <option value="MS">Mississippi</option>
                      <option value="MO">Missouri</option>
                      <option value="MT">Montana</option>
                      <option value="NE">Nebraska</option>
                      <option value="NV">Nevada</option>
                      <option value="NH">New Hampshire</option>
                      <option value="NJ">New Jersey</option>
                      <option value="NM">New Mexico</option>
                      <option value="NY">New York</option>
                      <option value="NC">North Carolina</option>
                      <option value="ND">North Dakota</option>
                      <option value="OH">Ohio</option>
                      <option value="OK">Oklahoma</option>
                      <option value="OR">Oregon</option>
                      <option value="PA">Pennsylvania</option>
                      <option value="PR">Puerto Rico</option>
                      <option value="RI">Rhode Island</option>
                      <option value="SC">South Carolina</option>
                      <option value="SD">South Dakota</option>
                      <option value="TN">Tennessee</option>
                      <option value="TX">Texas</option>
                      <option value="UT">Utah</option>
                      <option value="VT">Vermont</option>
                      <option value="VA">Virginia</option>
                      <option value="WA">Washington</option>
                      <option value="WV">West Virginia</option>
                      <option value="WI">Wisconsin</option>
                      <option value="WY">Wyoming</option>
                    </select>
                  </div>
                </div>
                <div class="frmElmnts">
                  <div class="frmfld">
                    <img src="{{ asset('assets/keto_assets/images/zip.jpg') }}" alt="" class="icon">
                    <input type="text" name="postalCode" id="shippingZip" placeholder="Zip Code" value="" required="" maxlength="5" class="h5-zip">
                  </div>
                </div>
                  <div class="frmElmnts">
                    <div class="frmfld">
                      <input type="checkbox" name="age_terms" checked style="height: 18px; margin-right: 2px; left: -2px;" value="age_terms">
                      <p class="trm" style="display: inline">
                         I am at least 18 years of age and agree to these Terms &amp; Conditions and Privacy Policy. I also agree to receive automated sms promotional messages from Divinity Labs. This agreement isn't a condition of any purchase. 4 Msgs/Month. Msg &amp; Data rates may apply. Reply STOP to end or HELP for help.
                      </p>
                    </div>
                  </div>

              </div>
            </div>
            <div class="crt-frm2">
              <div class="safebox">
                <div class="safe-iconbox2">
                  <!--<img src="{{ asset('assets/keto_assets/images/crt-side-arw.jpg') }}" alt="">-->
                </div>
                <p>Payment Information </p>
              </div>
              <div class="frm2">
                <span>
                  <!-- <p class="sameas"><input type="checkbox" checked class="chkbx" id="chkbx">
                          Is your billing address same as shipping address?</p><div class="clearall"></div><div id="billing-info" style="display:none;" class="topmar2"><div class="frmElmnts"><div class="frmfld frmfld-short1"><img src="{{ asset('assets/keto_assets/images/name.jpg') }}" alt="" class="icon"><input type="text" name="billingFirstName" id="billingFirstName" placeholder="First Name" value="" required maxlength="64" /></div><div class="frmfld frmfld-short2"><img src="{{ asset('assets/keto_assets/images/name.jpg') }}" alt="" class="icon"><input type="text" name="billingLastName" id="billingLastName" placeholder="Last Name" value="" required maxlength="64" /></div></div><div class="frmElmnts"><div class="frmfld"><img src="{{ asset('assets/keto_assets/images/address.jpg') }}" alt="" class="icon"><input type="text" name="billingAddress1" id="billingAddress1" placeholder="Address" value="" required maxlength="64" /></div></div><div class="frmElmnts"><div class="frmfld"><img src="{{ asset('assets/keto_assets/images/city.jpg') }}" alt="" class="icon"><input type="text" name="billingCity" id="billingCity" placeholder="City" value="" required maxlength="32" /></div></div><div class="frmElmnts"><div class="frmfld"><img src="{{ asset('assets/keto_assets/images/state.jpg') }}" alt="" class="icon"><input type="hidden" name="billingCountry" id="billingCountry" value="US" /><select id="country2" name="country2"><option value="">Select Country</option><option value="US">United States</option></select></div></div><div class="frmElmnts"><div class="frmfld"><img src="{{ asset('assets/keto_assets/images/state.jpg') }}" alt="" class="icon"><select name="billingState" id="billingState" class="field-all"><option value="">Select State</option><option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="PR">Puerto Rico</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option></select></div></div><div class="frmElmnts"><div class="frmfld"><img src="{{ asset('assets/keto_assets/images/zip.jpg') }}" alt="" class="icon"><input type="text" name="billingZip" id="billingZip" placeholder="Zip" value="" required maxlength="8" class="h5-zip" /></div></div><div class="clearall"></div> -->
                </span>
              </div>
              <p class="weaccept">
                <span class="span1">We Accept:</span>
                <!--<input type="radio" checked class="rd" name="cards">-->
                <img src="{{ asset('assets/keto_assets/images/cards.png') }}" alt="" class="cards">
                <!--<input type="radio"  class="rd" name="cards"><img src="{{ asset('assets/keto_assets/images/paypal.png') }}" alt="" class="paypal">-->
              </p>
              <div class="frmElmnts">
                <div class="frmfld">
                  <img src="{{ asset('assets/keto_assets/images/card.jpg') }}" alt="" class="icon">
                  <select name="fields_card" id="fields_card" class="" required="">
                    <option selected="" value="">Select A Card</option>
                    <option value="visa" selected="">Visa</option>
                    <option value="master">Master Card</option>
                    <option value="discover">Discover</option>
                  </select>
                </div>
              </div>
              <div class="frmElmnts">
                <div class="frmfld1">
                  <img src="{{ asset('assets/keto_assets/images/card.jpg') }}" alt="" class="icon">
                  <input type="text" name="cardNumber" id="creditCardNumber" value="" placeholder="Credit Card Number" autocomplete="off" required="" maxlength="16" onkeydown="return onlyNumbers(event,&#39;cc&#39;)" class="h5-ccno">
                </div>
              </div>
              <div class="frmElmnts">
                <div class="frmfld1 frmfld1-short1">
                  <img src="{{ asset('assets/keto_assets/images/month.jpg') }}" alt="" class="icon">
                  <select name="cardMonth" id="fields_expmonth" class="" onchange="" required="">
                    <option value="">Exp. Month</option>
                    <option value="01">(01) January</option>
                    <option value="02">(02) February</option>
                    <option value="03">(03) March</option>
                    <option value="04">(04) April</option>
                    <option value="05">(05) May</option>
                    <option value="06">(06) June</option>
                    <option value="07">(07) July</option>
                    <option value="08">(08) August</option>
                    <option value="09">(09) September</option>
                    <option value="10">(10) October</option>
                    <option value="11">(11) November</option>
                    <option value="12">(12) December</option>
                  </select>
                </div>
                <div class="frmfld1 frmfld1-short2">
                  <img src="{{ asset('assets/keto_assets/images/month.jpg') }}" alt="" class="icon">
                  <select name="cardYear" id="fields_expyear" class="" onchange="" required="">
                    <option value="" selected="">Year</option>
                    <option value="23">2023</option>
                    <option value="24">2024</option>
                    <option value="25">2025</option>
                    <option value="26">2026</option>
                    <option value="27">2027</option>
                    <option value="28">2028</option>
                    <option value="29">2029</option>
                    <option value="30">2030</option>
                    <option value="31">2031</option>
                    <option value="32">2032</option>
                    <option value="33">2033</option>
                    <option value="34">2034</option>
                    <option value="35">2035</option>
                    <option value="36">2036</option>
                    <option value="37">2037</option>
                  </select>
                </div>
              </div>
              <div class="frmElmnts">
                <div class="frmfld1 frmfld1-short1">
                  <img src="{{ asset('assets/keto_assets/images/cvv.jpg') }}" alt="" class="icon">
                  <input autocomplete="off" maxlength="3" type="text" id="cc_cvv" name="cardSecurityCode" required="" onkeydown="return onlyNumbers(event,&#39;phone&#39;)" class="small h5-cvv" placeholder="CVV:" style="float:left;">
                </div>
                <a href="javascript:void(0)" class="what sccode">What is this?</a>
              </div>
              <p class="clearall"></p>
              <!--<p class="trm"><input type="checkbox" name="agree" id="agree" value="Y" class="chk radio" required="required" > By clicking COMPLETE CHECKOUT you authorize the order of Gold Lab Solutions product(s). You agree to pay all charges at the prices then in effect for your purchases, and you authorize us to charge your chosen payment provider for any such amounts upon placing your order. Your charge will appear as on your next billing statement. Call us at (877)202-5676 or email <a href="mailto:care@goldlabsolutions.com">care@goldlabsolutions.com</a> if you have any questions about your order.</p>-->
              <input type="checkbox" name="agree" id="agree" value="agree" class="chk radio" checked> I agree to the <a href="{{ route('terms') }}" target="_blank">Terms &amp; Conditions</a> And <a href="{{ route('privacy') }}" target="_blank">Privacy Policy</a>. <br>
              <p class="trm">
                <br>
                <span class="trm_1">
                  <span id="term-174">By placing an order with us you will be charged $64.99 + $0.00 for S&amp;H for One Time for Resistance Bands (10 Pack). If you are not completely satisfied with your purchase of Resistance Bands (10 Pack) at any time, please call (877)202-5676 or email care@goldlabsolutions.com, Monday-Saturday: 9 am to 5 pm EST. You will receive your package within 2-5 business days of payment via USPS First Class Mail. I agree that my credit card charge will appear as Gold Lab Solutions.</span>
                </span>
              </p>
              <div class="clearall"></div>
              <button id="submitButton" type="submit" class="submit-btn">Complete Checkout</button>
              <img src="{{ asset('assets/keto_assets/images/secure.png') }}" class="secure">
            </div>
          </div>
        </form>
      </div>
      <p class="clearall"></p>
    </div>
  </div>
  <!--============== CART FORM ==============-->
		@push('title')
      Gold Lab Solutions
		@endpush
	@endsection
