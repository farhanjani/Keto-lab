<template>
  <div class="checkout-type4">
    <div class="app checkout">
      <div class="wrapper">
        <header>
          <div class="top-banner text-center">
            <div class="logo img-logo img-responsive"><img :src="`${PRODUCT_IMG_URL}/${product.logo}`" :alt="`${product.name}`" width="100px"></div>
          </div>
        </header>
        <div class="">
          <div>
            <div class="product-spec image-slider">
              <div class="product-table row border-box top-section">
                <div class="product-table-cell phone-12 tablet-6 columns product-image speclist"
                  style="text-align: center;">
                  <div class="product-images single-image">
                    <div class="product-images__main-image"><img :src="`${PRODUCT_IMG_URL}/${product.image}`"></div>
                  </div>
                </div>
                <div class="product-table-cell phone-12 tablet-6 columns speclist">
                  <div class="table">
                    <div class="table-cell">
                      <ul class="clearfix" v-if="product.product_features">
                        <li v-for="(feature, index) in product.product_features.split('|')" :key="index">
                          <p>{{ feature }}</p>
                        </li>
                        <!-- <li>
                          <p>Eliminates Connectivity Problems in Dead Zones</p>
                        </li>
                        <li>
                          <p>Easy &amp; Quick Installation</p>
                        </li>
                        <li>
                          <p>No More Internet Lag</p>
                        </li>
                        <li>
                          <p>Faster Downloads</p>
                        </li>
                        <li>
                          <p>Creates a Stronger, More Reliable Connection</p>
                        </li> -->
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="heading">
              <div class="row">
                <div class="phone-12 columns text-center">
                  <div><b>SPECIAL OFFER:</b> {{ product.name }} is available at the price of <del
                      class="inline-block"><span class="calc-price">${{ product.price }}</span></del> <b
                      class="green"><span class="calc-price">${{ (product.price * product.discount / 100).toFixed(2)
                      }}</span></b>* <i><b>({{ product.discount }}% Discount Per Unit)</b></i></div>
                  <div><b class="green">Free Delivery</b> on every order today!</div>
                  <div><i>*Subject to availability in stock</i></div>
                </div>
              </div>
            </div>

            <div class="order-form-column">
              <div class="order-form">
                <div class="row">
                  <div class="phone-12 columns">
                    <form @submit.prevent="onSubmit" id="order-form" class="form-wrap order-form payment_form">
                      <div class="row">
                        <div class="phone-12 tablet-10 tablet-centered desktop-7 desktop-uncentered columns left-form">
                          <div class="order-raido-container row border-box">
                            <div data-v-0184382f="" class="phone-12 columns title">
                              <div data-v-0184382f="" class="row">
                                <div data-v-0184382f="" class="promo-offer phone-12 columns">
                                  <svg data-v-0184382f="" width="56" height="56" viewBox="0 0 56 56" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path data-v-0184382f="" fill-rule="evenodd" clip-rule="evenodd"
                                      d="M23.6434 0.0916606C23.0689 0.281969 22.5905 0.589824 21.8935 1.21764C21.4507 1.6166 20.9661 1.92892 20.5989 2.05211C20.0152 2.24782 19.8637 2.24688 18.0547 2.03718C16.7485 1.88578 15.6121 2.5009 14.8553 3.769C13.9838 5.2294 13.4689 5.57557 11.7949 5.82677C9.73419 6.1358 9.07347 6.7816 8.4471 9.09881C8.18746 10.0593 7.27619 10.9799 6.19075 11.3784C5.66776 11.5703 5.28169 11.8167 4.90039 12.2017C4.20032 12.9085 3.96828 13.5818 3.96735 14.9089C3.967 15.4631 3.91414 16.1077 3.84988 16.3412C3.67198 16.988 3.16261 17.674 2.39955 18.2947C1.45137 19.0658 1.05739 19.8369 1.05739 20.9213C1.05739 21.4492 1.1376 21.9317 1.29024 22.3228C1.59376 23.1004 1.59982 24.3183 1.30328 24.9676C1.18511 25.2262 0.899861 25.7183 0.66922 26.0611C-0.223073 27.3876 -0.223073 28.6601 0.66922 29.9866C0.899861 30.3294 1.18511 30.8215 1.30328 31.0801C1.60284 31.736 1.59178 32.8966 1.27813 33.7249C1.08312 34.2401 1.04353 34.5532 1.08347 35.2667C1.14424 36.3536 1.48234 37.0179 2.30967 37.676C3.62215 38.72 3.87095 39.2308 3.96316 41.0715C4.02207 42.2456 4.08192 42.5783 4.32024 43.0556C4.68221 43.7809 5.33932 44.3516 6.17096 44.663C7.55538 45.1813 8.14264 45.8424 8.56678 47.3597C9.12237 49.3479 9.83735 49.9287 12.1611 50.2796C13.4632 50.4761 14.0688 50.9577 15.0761 52.5976C15.7349 53.6703 17.0857 54.2166 18.4514 53.9626C20.0329 53.6683 20.8267 53.869 21.8979 54.8339C22.9526 55.7841 23.4148 55.994 24.4591 55.9973C25.2393 55.9998 25.4371 55.9499 26.3159 55.5298C27.1657 55.1236 27.4047 55.0604 28.0734 55.066C28.7342 55.0715 28.9817 55.1401 29.7676 55.5362C30.5935 55.9524 30.7775 56 31.5611 56C32.6134 56 33.1435 55.7586 34.1435 54.8238C35.0309 53.9943 35.7148 53.7584 36.8475 53.8911C38.3903 54.0718 39.1276 54.0184 39.7797 53.6788C40.4346 53.3378 40.9837 52.7693 41.3411 52.0621C41.6551 51.4405 42.3201 50.7867 42.9028 50.5264C43.1649 50.4094 43.8104 50.259 44.3371 50.1924C44.8638 50.1256 45.499 49.9658 45.7487 49.8373C46.4394 49.4816 47.1361 48.6104 47.3456 47.8407C47.866 45.9276 48.2491 45.4354 49.7819 44.7095C51.5761 43.86 52.0749 43.0654 52.0993 41.0177C52.1183 39.415 52.3233 38.9642 53.5265 37.8767C54.6376 36.8729 55.001 36.2008 55.0089 35.1354C55.0126 34.6323 54.9262 34.1203 54.7559 33.6362C54.2995 32.3395 54.4543 31.2982 55.2702 30.176C55.822 29.4172 56.0005 28.8911 56.0005 28.0238C56.0005 27.1566 55.822 26.6304 55.2702 25.8717C54.4543 24.7495 54.2995 23.7082 54.7559 22.4115C54.927 21.925 55.0122 21.4178 55.0077 20.9123C54.998 19.8203 54.6788 19.2217 53.5658 18.2087C52.3315 17.0853 52.1291 16.6452 52.1039 15.03C52.0719 12.9775 51.5729 12.1854 49.7775 11.3371C48.2636 10.622 47.8619 10.1042 47.3438 8.20122C47.1135 7.35523 46.3478 6.46458 45.5648 6.13204C45.2588 6.00203 44.6501 5.86062 44.2121 5.81784C42.8201 5.68184 41.9606 5.10797 41.253 3.84199C40.5418 2.56967 39.3076 1.87637 38.035 2.03436C36.1159 2.27274 35.9275 2.26663 35.2289 1.94373C34.8622 1.77423 34.2516 1.3453 33.8721 0.990541C32.6475 -0.15413 31.4097 -0.297537 29.7465 0.512713C28.9788 0.886747 28.698 0.962918 28.0626 0.969736C27.4088 0.976671 27.1683 0.913783 26.3745 0.5287C25.4067 0.0592176 24.284 -0.120511 23.6434 0.0916606ZM30.1808 4.34039C34.9801 4.81704 39.417 6.63984 43.0022 9.6079C44.1245 10.537 46.1354 12.6467 46.9546 13.7542C48.5119 15.8601 49.6633 18.098 50.4859 20.6184C52.0741 25.4838 52.071 30.5684 50.477 35.4593C47.8617 43.4835 41.0904 49.5809 32.8876 51.2982C25.3008 52.8867 17.4898 50.599 11.84 45.1336C8.08093 41.4974 5.63411 36.7154 4.82949 31.4327C4.53854 29.5221 4.56124 26.2274 4.87862 24.3167C5.6893 19.4365 7.81048 15.132 11.1171 11.6571C12.5854 10.1142 13.6727 9.19884 15.3543 8.09014C19.7117 5.21741 25.1535 3.84105 30.1808 4.34039ZM25.7777 6.80982C15.7704 8.08414 8.20551 15.8133 7.11844 25.874C6.51162 31.4904 8.33381 37.401 12.0314 41.8099C16.5141 47.1547 23.3828 49.9467 30.2972 49.2344C39.0085 48.337 46.385 41.9453 48.5662 33.4047C50.1432 27.2297 48.986 20.9187 45.301 15.5961C44.3243 14.1853 41.8332 11.6703 40.4359 10.6842C37.7148 8.76368 34.8313 7.55118 31.6194 6.97661C30.3841 6.75551 26.969 6.65806 25.7777 6.80982ZM39.1834 15.8516C39.2361 15.9378 35.7058 26.7583 35.5853 26.88C35.4827 26.9837 34.4718 26.6476 34.4718 26.5098C34.4718 26.4374 35.2868 23.9096 36.2831 20.8923L38.0942 15.4064L38.6114 15.5843C38.8959 15.6821 39.1532 15.8025 39.1834 15.8516ZM29.7371 16.0957C31.2369 16.6621 31.9599 18.0279 32.105 20.5684C32.2387 22.9091 31.8072 24.6716 30.8682 25.6197C29.4759 27.0253 26.6106 26.9829 25.2516 25.5364C24.4305 24.6626 24.0415 22.9525 24.1399 20.6491C24.2561 17.9309 24.9628 16.6314 26.6575 16.0201C27.3357 15.7753 28.9973 15.8161 29.7371 16.0957ZM35.5196 16.0637C36.733 16.6756 36.7966 19.476 35.6137 20.2042C35.0615 20.5441 34.0547 20.5301 33.5285 20.1752C32.9317 19.7726 32.7258 19.2532 32.7258 18.1499C32.7258 17.0466 32.9317 16.5272 33.5285 16.1246C34.0194 15.7935 34.9288 15.7657 35.5196 16.0637ZM22.6883 17.0038L22.7222 17.9736H20.3998H18.0776L18.0035 18.5907C17.9629 18.9301 17.9009 19.4063 17.8659 19.6486C17.796 20.133 17.8159 20.1448 18.4058 19.9665C19.1458 19.7429 20.6462 19.8099 21.305 20.096C22.0106 20.4025 22.6506 21.0787 22.8208 21.6974C23.0289 22.4541 22.9743 23.8821 22.7099 24.5954C22.0649 26.336 20.4235 26.9635 17.7064 26.5081C16.0896 26.2371 15.7047 26.1105 15.7713 25.8716C15.8018 25.7622 15.8623 25.3901 15.9058 25.0443L15.985 24.4156L16.3508 24.4836C16.5521 24.521 17.3979 24.5823 18.2303 24.62C19.9499 24.6977 20.1969 24.6278 20.5366 23.9668C20.8132 23.4286 20.7301 22.5182 20.3689 22.13C20.0152 21.75 19.4508 21.6737 18.255 21.8446C17.456 21.9588 17.1031 21.9603 16.6533 21.8513C16.0985 21.717 16.0764 21.6959 16.0764 21.3018C16.0764 20.5541 16.3189 16.2717 16.3698 16.1203C16.4089 16.0041 17.1036 15.9784 19.5372 16.0028L22.6545 16.0341L22.6883 17.0038ZM34.3561 17.4427C34.121 18.0669 34.3018 19.2258 34.6177 19.1196C34.9448 19.0094 34.9437 17.2899 34.6164 17.1798C34.5377 17.1533 34.4206 17.2716 34.3561 17.4427ZM27.3778 17.9444C27.1538 18.0596 26.8837 18.3368 26.7631 18.5753C26.3077 19.4753 26.23 22.0514 26.616 23.4449C26.8343 24.2328 27.2088 24.5751 27.9289 24.645C28.7164 24.7214 29.1829 24.4577 29.5048 23.7544C29.7316 23.2589 29.7565 23.0065 29.7565 21.2061C29.7565 19.3598 29.7362 19.1662 29.4894 18.6604C29.069 17.7988 28.2203 17.5109 27.3778 17.9444ZM40.3607 22.4439C40.8211 22.8727 40.9917 23.3884 40.9917 24.3512C40.9917 25.8761 40.3527 26.6715 39.127 26.6718C37.9229 26.6723 37.266 25.8572 37.266 24.3626C37.266 23.4232 37.3878 22.9899 37.7687 22.5745C38.1436 22.1654 38.4039 22.0869 39.2687 22.1219C39.9109 22.1479 40.1041 22.2049 40.3607 22.4439ZM38.9215 23.5865C38.8754 23.6997 38.8437 24.0997 38.8508 24.4753C38.8727 25.6143 39.3081 25.7118 39.4337 24.6059C39.5324 23.7367 39.161 22.9974 38.9215 23.5865ZM20.8896 29.5454C22.667 29.7464 23.7751 30.9891 24.1151 33.1624C24.322 34.4853 24.2051 36.9769 23.8893 37.9745C23.5765 38.9628 22.856 39.8076 21.9884 40.2034C21.4382 40.4544 21.2092 40.4838 19.8021 40.4838C18.3148 40.4838 18.1944 40.4661 17.5639 40.1534C16.0784 39.417 15.3721 37.7628 15.3802 35.0388C15.3903 31.5648 16.5427 29.772 18.9367 29.5056C19.3806 29.4563 19.8748 29.4306 20.0349 29.4488C20.195 29.4669 20.5796 29.5103 20.8896 29.5454ZM32.8418 30.6099V31.609H30.5715H28.3012V33.1371V34.6652H30.164H32.0269V35.6644V36.6635H30.1669H28.3071L28.275 38.5149L28.243 40.3663L27.166 40.4001L26.0891 40.4339V35.0224V29.6107H29.4655H32.8418V30.6099ZM41.1081 30.6099V31.609H38.8378H36.5675V33.1371V34.6652H38.4303H40.2931V35.6644V36.6635H38.4303H36.5675V38.5443V40.425H35.4614H34.3554V35.0179V29.6107H37.7318H41.1081V30.6099ZM19.0619 31.4948C18.1235 31.7787 17.7914 32.5707 17.7286 34.6734C17.6669 36.7442 17.8145 37.5056 18.3902 38.0868C19.2907 38.996 21.0782 38.7703 21.5893 37.6829C22.0364 36.7317 22.1052 34.2149 21.7218 32.84C21.3972 31.676 20.2989 31.1205 19.0619 31.4948Z"
                                      fill="#D82E31"></path>
                                  </svg>
                                  <h5 data-v-0184382f="" class="emphasis"><span data-v-0184382f="">Special offer
                                      applied! -50%</span>
                                    <p data-v-0184382f="" class="black">Offer ends in: <b data-v-0184382f=""
                                        id="demo">{{ this.offerEndTime }}</b></p>
                                  </h5>
                                </div>
                              </div>
                            </div>
                            <div class="phone-12 columns product-selection-row scroll-to-block">
                              <h5 class="step-title">
                                Step 1 : Choose The Number of Items
                              </h5>
                              <div class="list-title clearfix">
                                <div class="list-title-item left"><strong>Article</strong></div>
                                <div class="list-title-price right"><strong>Total Price</strong></div>
                              </div>
                              <hr>
                              <div id="product-quantity-radio" class="product-quantity-radio parent-validField">
                                <div class="row">
                                  <div class="phone-12 columns" v-if="hasInitialized">
                                    <div :class="`package-row ${index == 0 ? 'bestseller' : ''}`" v-for="(offer, index) in product.offers" :key="offer.id">
                                      <div class="package-name">
                                        <input  v-model="activeOffer" :value="index" @click="doActiveOffer((offer.price * offer.discount / 100).toFixed(2), offer.crm_id, offer.campaign_id)" name="as" id="quantity-5" autocomplete="none" type="radio">
                                        <label for="quantity-5" class="radio-title">
                                          <span>
                                            {{ offer.title }}
                                            <div class="inline-block">
                                              (<span class="calc-price">${{ (product.price - (product.price * offer.discount / 100)).toFixed(2) }}</span>/each)
                                            </div>
                                          </span>
                                          <img v-if="index == 0" src="/images/bestseller.png" width="49" height="59">
                                        </label>
                                      </div>
                                      <span class="float-fix">
                                        <span class="unit-price">
                                          <span class="calc-price">${{ (offer.price * offer.discount / 100).toFixed(2) }}</span>
                                        </span>
                                      </span>
                                      <div v-if="index == 0" class="package-wrap">
                                        <span class="arrow">
                                          <svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="106"
                                            height="110" viewBox="0 0 106 110" enable-background="new 0 0 106 110" xml:space="preserve">
                                            <path fill="#fdc301" d="M5.11 29.39c3.87 10.2 9.34 19.72 16.1 28.27 1.8 2.28 3.69 4.49 5.67 6.62 1.02 1.3 2.07 2.58 3.15 3.84 13.79 16.04 35.63 32.15 57.92 28.05 -2.16 0.55-4.3 1.2-6.43 1.81 -6.48 1.82-12.93 3.73-19.37 5.69 -1.62 0.5-1.02 2.82 0.64 2.54 0.86-0.15 1.72-0.3 2.58-0.44 0.15 0.03 0.31 0.03 0.48 0 0.73-0.12 1.47-0.26 2.2-0.4 -0.81 0.28-1.62 0.56-2.43 0.87 -1.51 0.58-1.14 2.62 0.35 2.64 0.25 0.14 0.56 0.2 0.93 0.12 1.13-0.26 2.26-0.53 3.39-0.8 10.43-1.76 20.76-3.99 30.98-6.74 0.45-0.12 0.73-0.38 0.87-0.68 0.63-0.16 1.14-0.74 1.07-1.35 1.18 0.3 2.41-1.16 1.31-2.08 -6.73-5.59-13.53-11.14-20.96-15.66 -3.99-3.15-8.11-6.13-12.38-8.91 -1.23-0.8-2.35 1.12-1.17 1.95 0.43 0.3 0.86 0.6 1.29 0.9 -0.78-0.1-1.3 0.65-1.27 1.39 -0.72-0.42-1.44-0.84-2.17-1.26 -1.45-0.84-2.69 1.27-1.33 2.22 7.08 4.91 14.17 9.83 21.25 14.75 -0.47-0.06-0.95-0.12-1.42-0.19 -9.64-1.95-18.62-6.83-26.79-12.15 -9.06-5.9-17.31-13.04-24.49-21.12C22.61 45.25 13.56 28.59 8.55 10.63 8.12 8.58 7.74 6.52 7.4 4.46c-0.05-0.31-0.27-0.57-0.55-0.75 -0.13-0.6-0.27-1.2-0.39-1.81C6.17 0.5 3.86 0.73 3.93 2.18c0.04 0.92 0.1 1.84 0.16 2.76C-1.93 11.24 2.44 22.37 5.11 29.39zM71.95 104.63c0.88-0.15 1.77-0.3 2.65-0.45 -1.3 0.34-2.6 0.69-3.91 1.03 -0.08-0.1-0.19-0.2-0.3-0.27C70.91 104.85 71.43 104.74 71.95 104.63zM78.59 93.55c1.15 0.28 2.3 0.53 3.46 0.76 -1.2 0.04-2.39 0.02-3.59-0.06C78.56 94.03 78.61 93.79 78.59 93.55zM71.43 93.24c-7.11-1.64-13.96-5.02-20.25-9.31C57.58 87.72 64.37 90.86 71.43 93.24zM34.02 62c7.56 8.3 16.26 15.6 25.82 21.5 0.95 0.59 1.92 1.16 2.89 1.73 -9.77-4.68-18.69-11.17-26.23-19.02 -6.08-6.34-11.18-13.42-15.37-21.01C24.95 51.15 29.26 56.77 34.02 62zM32.87 66.75c-1.44-1.39-2.85-2.83-4.22-4.3 -3.68-4.73-6.96-9.77-9.79-15.05C22.93 54.32 27.59 60.83 32.87 66.75zM4.43 8.76C4.48 9.25 4.54 9.75 4.6 10.25c-0.55 0.21-0.95 0.73-0.75 1.45 0.63 2.25 1.31 4.49 2.04 6.71 1.38 6.97 3.44 13.79 6.13 20.34 -0.63-1.23-1.25-2.48-1.83-3.74 -2.11-4.56-3.88-9.28-5.26-14.11C3.91 17.3 2.78 12.38 4.43 8.76z"></path>
                                          </svg>
                                        </span>
                                      </div>
                                    </div>
<!--                                    <div class="package-row">-->
<!--                                      <div class="package-name">-->
<!--                                        <input v-model="price" :checked="true" :value="((product.price - (product.price * product.discount / 100)).toFixed(2))" name="as" id="quantity-3" autocomplete="none" type="radio"/>-->
<!--                                        <label for="quantity-3" class="radio-title">-->
<!--                                          <span>-->
<!--                                            {{ product.name }}-->
<!--                                            <div class="inline-block">-->
<!--                                              (<span class="calc-price">${{ (product.price - (product.price * product.discount / 100)).toFixed(2) }}</span>/each)-->
<!--                                            </div>-->
<!--                                          </span>-->
<!--                                        </label>-->
<!--                                      </div> -->
<!--                                      <span class="float-fix">-->
<!--                                        <span class="unit-price">-->
<!--                                          <span class="calc-price">${{ (product.price * product.discount / 100).toFixed(2) }}</span>-->
<!--                                        </span>-->
<!--                                      </span>-->
<!--                                    </div>-->
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="phone-12 columns scroll-to-block">
                              <h5 class="step-title">Step 2: Contact Information</h5>
                              <hr>
                              <div class="index-form-contactinfo">
                                <div class="row">
                                  <div class="phone-7 columns">
                                    <input v-model.trim="$v.gender.$model" type="radio" value="Mr" id="gender1"
                                      class="gender" autocomplete="none">
                                    <label for="gender1"><b>Mr</b></label>
                                  </div>
                                  <div class="phone-7 columns">
                                    <input v-model.trim="$v.gender.$model" type="radio" value="Mrs" id="gender2"
                                      class="gender" autocomplete="none">
                                    <label for="gender2"><b>Mrs</b></label>
                                  </div>
                                </div>
                                <div class="row margin-bottom-5">
                                  <div class="phone-6 columns">
                                    <div class="form-field">
                                      <input v-model.trim="$v.firstName.$model" placeholder="Last Name" value="" field="input" type="text" name="last_name"
                                        maxlength="50" autocomplete="none" class="form-control form-field__input" :class="{ 'is-invalid': $v.firstName.$error }">
                                      <label class="form-field__label"> First Name</label>
                                    </div>
                                  </div>
                                  <div class="phone-6 columns">
                                    <div class="form-field">
                                      <input v-model.trim="$v.lastName.$model" placeholder="First Name" value="" field="input" type="text"
                                        name="first_name" maxlength="50" autocomplete="none" class="form-control form-field__input" :class="{ 'is-invalid': $v.lastName.$error }">
                                      <label class="form-field__label">Last Name</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="phone-12 columns parent-validField">
                                    <div class="form-field">
                                      <input v-model.trim="$v.email.$model" placeholder="Email Address" value="" autocomplete="none" field="input"
                                        type="text" name="email" class="form-control form-field__input" :class="{ 'is-invalid': $v.email.$error }">
                                      <label class="form-field__label">Email Address</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="phone-12 columns">
                                    <label for="phone">Telephone</label>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="phone-12 columns parent-validField">
                                    <div class="form-field">
                                      <div class="form-input phone-is-empty" name="phone" autocomplete="none"
                                        input-props="[object Object]">
                                        <div class="iti iti--allow-dropdown">
                                          <!-- <div class="iti__flag-container">
                                            <div class="iti__selected-flag" role="combobox" aria-owns="country-listbox"
                                              aria-expanded="false" tabindex="0" title="Pakistan: +92"
                                              aria-activedescendant="iti-item-pk">
                                              <div class="iti__flag iti__pk"></div>
                                              <div class="iti__arrow"></div>
                                            </div>
                                            <ul class="iti__country-list iti__hide" id="country-listbox" role="listbox">
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-al"
                                                role="option" data-dial-code="355" data-country-code="al">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__al"></div>
                                                </div><span class="iti__country-name">Albania</span><span
                                                  class="iti__dial-code">+355</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-dz"
                                                role="option" data-dial-code="213" data-country-code="dz">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__dz"></div>
                                                </div><span class="iti__country-name">Algeria</span><span
                                                  class="iti__dial-code">+213</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ad"
                                                role="option" data-dial-code="376" data-country-code="ad">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ad"></div>
                                                </div><span class="iti__country-name">Andorra</span><span
                                                  class="iti__dial-code">+376</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ao"
                                                role="option" data-dial-code="244" data-country-code="ao">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ao"></div>
                                                </div><span class="iti__country-name">Angola</span><span
                                                  class="iti__dial-code">+244</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ai"
                                                role="option" data-dial-code="1" data-country-code="ai">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ai"></div>
                                                </div><span class="iti__country-name">Anguilla</span><span
                                                  class="iti__dial-code">+1</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ag"
                                                role="option" data-dial-code="1" data-country-code="ag">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ag"></div>
                                                </div><span class="iti__country-name">Antigua and Barbuda</span><span
                                                  class="iti__dial-code">+1</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ar"
                                                role="option" data-dial-code="54" data-country-code="ar">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ar"></div>
                                                </div><span class="iti__country-name">Argentina</span><span
                                                  class="iti__dial-code">+54</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-am"
                                                role="option" data-dial-code="374" data-country-code="am">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__am"></div>
                                                </div><span class="iti__country-name">Armenia</span><span
                                                  class="iti__dial-code">+374</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-aw"
                                                role="option" data-dial-code="297" data-country-code="aw">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__aw"></div>
                                                </div><span class="iti__country-name">Aruba</span><span
                                                  class="iti__dial-code">+297</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-au"
                                                role="option" data-dial-code="61" data-country-code="au">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__au"></div>
                                                </div><span class="iti__country-name">Australia</span><span
                                                  class="iti__dial-code">+61</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-at"
                                                role="option" data-dial-code="43" data-country-code="at">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__at"></div>
                                                </div><span class="iti__country-name">Austria</span><span
                                                  class="iti__dial-code">+43</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-az"
                                                role="option" data-dial-code="994" data-country-code="az">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__az"></div>
                                                </div><span class="iti__country-name">Azerbaijan</span><span
                                                  class="iti__dial-code">+994</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-bh"
                                                role="option" data-dial-code="973" data-country-code="bh">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__bh"></div>
                                                </div><span class="iti__country-name">Bahrain</span><span
                                                  class="iti__dial-code">+973</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-bd"
                                                role="option" data-dial-code="880" data-country-code="bd">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__bd"></div>
                                                </div><span class="iti__country-name">Bangladesh</span><span
                                                  class="iti__dial-code">+880</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-bb"
                                                role="option" data-dial-code="1" data-country-code="bb">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__bb"></div>
                                                </div><span class="iti__country-name">Barbados</span><span
                                                  class="iti__dial-code">+1</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-be"
                                                role="option" data-dial-code="32" data-country-code="be">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__be"></div>
                                                </div><span class="iti__country-name">Belgium</span><span
                                                  class="iti__dial-code">+32</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-bj"
                                                role="option" data-dial-code="229" data-country-code="bj">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__bj"></div>
                                                </div><span class="iti__country-name">Benin</span><span
                                                  class="iti__dial-code">+229</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-bm"
                                                role="option" data-dial-code="1" data-country-code="bm">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__bm"></div>
                                                </div><span class="iti__country-name">Bermuda</span><span
                                                  class="iti__dial-code">+1</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-bt"
                                                role="option" data-dial-code="975" data-country-code="bt">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__bt"></div>
                                                </div><span class="iti__country-name">Bhutan</span><span
                                                  class="iti__dial-code">+975</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-br"
                                                role="option" data-dial-code="55" data-country-code="br">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__br"></div>
                                                </div><span class="iti__country-name">Brazil</span><span
                                                  class="iti__dial-code">+55</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-vg"
                                                role="option" data-dial-code="1" data-country-code="vg">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__vg"></div>
                                                </div><span class="iti__country-name">British</span><span
                                                  class="iti__dial-code">+1</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-bg"
                                                role="option" data-dial-code="359" data-country-code="bg">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__bg"></div>
                                                </div><span class="iti__country-name">Bulgaria</span><span
                                                  class="iti__dial-code">+359</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-bf"
                                                role="option" data-dial-code="226" data-country-code="bf">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__bf"></div>
                                                </div><span class="iti__country-name">Burkina Faso</span><span
                                                  class="iti__dial-code">+226</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-cm"
                                                role="option" data-dial-code="237" data-country-code="cm">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__cm"></div>
                                                </div><span class="iti__country-name">Cameroon</span><span
                                                  class="iti__dial-code">+237</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ca"
                                                role="option" data-dial-code="1" data-country-code="ca">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ca"></div>
                                                </div><span class="iti__country-name">Canada</span><span
                                                  class="iti__dial-code">+1</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ky"
                                                role="option" data-dial-code="1" data-country-code="ky">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ky"></div>
                                                </div><span class="iti__country-name">Cayman Islands</span><span
                                                  class="iti__dial-code">+1</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-td"
                                                role="option" data-dial-code="235" data-country-code="td">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__td"></div>
                                                </div><span class="iti__country-name">Chad</span><span
                                                  class="iti__dial-code">+235</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-cl"
                                                role="option" data-dial-code="56" data-country-code="cl">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__cl"></div>
                                                </div><span class="iti__country-name">Chile</span><span
                                                  class="iti__dial-code">+56</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-cn"
                                                role="option" data-dial-code="86" data-country-code="cn">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__cn"></div>
                                                </div><span class="iti__country-name">China</span><span
                                                  class="iti__dial-code">+86</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-cx"
                                                role="option" data-dial-code="61" data-country-code="cx">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__cx"></div>
                                                </div><span class="iti__country-name">Christmas Island</span><span
                                                  class="iti__dial-code">+61</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-co"
                                                role="option" data-dial-code="57" data-country-code="co">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__co"></div>
                                                </div><span class="iti__country-name">Colombia</span><span
                                                  class="iti__dial-code">+57</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-km"
                                                role="option" data-dial-code="269" data-country-code="km">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__km"></div>
                                                </div><span class="iti__country-name">Comoros</span><span
                                                  class="iti__dial-code">+269</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-cr"
                                                role="option" data-dial-code="506" data-country-code="cr">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__cr"></div>
                                                </div><span class="iti__country-name">Costa Rica</span><span
                                                  class="iti__dial-code">+506</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-hr"
                                                role="option" data-dial-code="385" data-country-code="hr">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__hr"></div>
                                                </div><span class="iti__country-name">Croatia</span><span
                                                  class="iti__dial-code">+385</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-cy"
                                                role="option" data-dial-code="357" data-country-code="cy">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__cy"></div>
                                                </div><span class="iti__country-name">Cyprus</span><span
                                                  class="iti__dial-code">+357</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-cz"
                                                role="option" data-dial-code="420" data-country-code="cz">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__cz"></div>
                                                </div><span class="iti__country-name">Czech Republic</span><span
                                                  class="iti__dial-code">+420</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-dk"
                                                role="option" data-dial-code="45" data-country-code="dk">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__dk"></div>
                                                </div><span class="iti__country-name">Denmark</span><span
                                                  class="iti__dial-code">+45</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-dj"
                                                role="option" data-dial-code="253" data-country-code="dj">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__dj"></div>
                                                </div><span class="iti__country-name">Djibouti</span><span
                                                  class="iti__dial-code">+253</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-dm"
                                                role="option" data-dial-code="1" data-country-code="dm">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__dm"></div>
                                                </div><span class="iti__country-name">Dominica</span><span
                                                  class="iti__dial-code">+1</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-eg"
                                                role="option" data-dial-code="20" data-country-code="eg">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__eg"></div>
                                                </div><span class="iti__country-name">Egypt</span><span
                                                  class="iti__dial-code">+20</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-sv"
                                                role="option" data-dial-code="503" data-country-code="sv">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__sv"></div>
                                                </div><span class="iti__country-name">El Salvador</span><span
                                                  class="iti__dial-code">+503</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-gq"
                                                role="option" data-dial-code="240" data-country-code="gq">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__gq"></div>
                                                </div><span class="iti__country-name">Equatorial Guinea</span><span
                                                  class="iti__dial-code">+240</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ee"
                                                role="option" data-dial-code="372" data-country-code="ee">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ee"></div>
                                                </div><span class="iti__country-name">Estonia</span><span
                                                  class="iti__dial-code">+372</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-et"
                                                role="option" data-dial-code="251" data-country-code="et">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__et"></div>
                                                </div><span class="iti__country-name">Ethiopia</span><span
                                                  class="iti__dial-code">+251</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-fk"
                                                role="option" data-dial-code="500" data-country-code="fk">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__fk"></div>
                                                </div><span class="iti__country-name">Falkland Islands</span><span
                                                  class="iti__dial-code">+500</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-fo"
                                                role="option" data-dial-code="298" data-country-code="fo">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__fo"></div>
                                                </div><span class="iti__country-name">Faroe Islands</span><span
                                                  class="iti__dial-code">+298</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-fi"
                                                role="option" data-dial-code="358" data-country-code="fi">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__fi"></div>
                                                </div><span class="iti__country-name">Finland</span><span
                                                  class="iti__dial-code">+358</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-fr"
                                                role="option" data-dial-code="33" data-country-code="fr">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__fr"></div>
                                                </div><span class="iti__country-name">France</span><span
                                                  class="iti__dial-code">+33</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-gf"
                                                role="option" data-dial-code="594" data-country-code="gf">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__gf"></div>
                                                </div><span class="iti__country-name">French Guiana</span><span
                                                  class="iti__dial-code">+594</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ga"
                                                role="option" data-dial-code="241" data-country-code="ga">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ga"></div>
                                                </div><span class="iti__country-name">Gabon</span><span
                                                  class="iti__dial-code">+241</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-gm"
                                                role="option" data-dial-code="220" data-country-code="gm">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__gm"></div>
                                                </div><span class="iti__country-name">Gambia</span><span
                                                  class="iti__dial-code">+220</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ge"
                                                role="option" data-dial-code="995" data-country-code="ge">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ge"></div>
                                                </div><span class="iti__country-name">Georgia</span><span
                                                  class="iti__dial-code">+995</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-de"
                                                role="option" data-dial-code="49" data-country-code="de">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__de"></div>
                                                </div><span class="iti__country-name">Germany</span><span
                                                  class="iti__dial-code">+49</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-gh"
                                                role="option" data-dial-code="233" data-country-code="gh">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__gh"></div>
                                                </div><span class="iti__country-name">Ghana</span><span
                                                  class="iti__dial-code">+233</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-gi"
                                                role="option" data-dial-code="350" data-country-code="gi">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__gi"></div>
                                                </div><span class="iti__country-name">Gibraltar</span><span
                                                  class="iti__dial-code">+350</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-gr"
                                                role="option" data-dial-code="30" data-country-code="gr">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__gr"></div>
                                                </div><span class="iti__country-name">Greece</span><span
                                                  class="iti__dial-code">+30</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-gl"
                                                role="option" data-dial-code="299" data-country-code="gl">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__gl"></div>
                                                </div><span class="iti__country-name">Greenland</span><span
                                                  class="iti__dial-code">+299</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-gd"
                                                role="option" data-dial-code="1" data-country-code="gd">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__gd"></div>
                                                </div><span class="iti__country-name">Grenada</span><span
                                                  class="iti__dial-code">+1</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-gp"
                                                role="option" data-dial-code="590" data-country-code="gp">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__gp"></div>
                                                </div><span class="iti__country-name">Guadeloupe</span><span
                                                  class="iti__dial-code">+590</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-gu"
                                                role="option" data-dial-code="1" data-country-code="gu">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__gu"></div>
                                                </div><span class="iti__country-name">Guam</span><span
                                                  class="iti__dial-code">+1</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-gt"
                                                role="option" data-dial-code="502" data-country-code="gt">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__gt"></div>
                                                </div><span class="iti__country-name">Guatemala</span><span
                                                  class="iti__dial-code">+502</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-gg"
                                                role="option" data-dial-code="44" data-country-code="gg">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__gg"></div>
                                                </div><span class="iti__country-name">Guernsey</span><span
                                                  class="iti__dial-code">+44</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-gn"
                                                role="option" data-dial-code="224" data-country-code="gn">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__gn"></div>
                                                </div><span class="iti__country-name">Guinea</span><span
                                                  class="iti__dial-code">+224</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-gy"
                                                role="option" data-dial-code="592" data-country-code="gy">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__gy"></div>
                                                </div><span class="iti__country-name">Guyana</span><span
                                                  class="iti__dial-code">+592</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ht"
                                                role="option" data-dial-code="509" data-country-code="ht">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ht"></div>
                                                </div><span class="iti__country-name">Haiti</span><span
                                                  class="iti__dial-code">+509</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-hk"
                                                role="option" data-dial-code="852" data-country-code="hk">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__hk"></div>
                                                </div><span class="iti__country-name">Hong Kong</span><span
                                                  class="iti__dial-code">+852</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-hu"
                                                role="option" data-dial-code="36" data-country-code="hu">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__hu"></div>
                                                </div><span class="iti__country-name">Hungary</span><span
                                                  class="iti__dial-code">+36</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-is"
                                                role="option" data-dial-code="354" data-country-code="is">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__is"></div>
                                                </div><span class="iti__country-name">Iceland</span><span
                                                  class="iti__dial-code">+354</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-in"
                                                role="option" data-dial-code="91" data-country-code="in">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__in"></div>
                                                </div><span class="iti__country-name">India</span><span
                                                  class="iti__dial-code">+91</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-id"
                                                role="option" data-dial-code="62" data-country-code="id">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__id"></div>
                                                </div><span class="iti__country-name">Indonesia</span><span
                                                  class="iti__dial-code">+62</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ie"
                                                role="option" data-dial-code="353" data-country-code="ie">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ie"></div>
                                                </div><span class="iti__country-name">Ireland</span><span
                                                  class="iti__dial-code">+353</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-il"
                                                role="option" data-dial-code="972" data-country-code="il">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__il"></div>
                                                </div><span class="iti__country-name">Israel</span><span
                                                  class="iti__dial-code">+972</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-it"
                                                role="option" data-dial-code="39" data-country-code="it">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__it"></div>
                                                </div><span class="iti__country-name">Italy</span><span
                                                  class="iti__dial-code">+39</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-jm"
                                                role="option" data-dial-code="1" data-country-code="jm">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__jm"></div>
                                                </div><span class="iti__country-name">Jamaica</span><span
                                                  class="iti__dial-code">+1</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-jp"
                                                role="option" data-dial-code="81" data-country-code="jp">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__jp"></div>
                                                </div><span class="iti__country-name">Japan</span><span
                                                  class="iti__dial-code">+81</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-je"
                                                role="option" data-dial-code="44" data-country-code="je">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__je"></div>
                                                </div><span class="iti__country-name">Jersey</span><span
                                                  class="iti__dial-code">+44</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-jo"
                                                role="option" data-dial-code="962" data-country-code="jo">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__jo"></div>
                                                </div><span class="iti__country-name">Jordan</span><span
                                                  class="iti__dial-code">+962</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-kz"
                                                role="option" data-dial-code="7" data-country-code="kz">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__kz"></div>
                                                </div><span class="iti__country-name">Kazakhstan</span><span
                                                  class="iti__dial-code">+7</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-kg"
                                                role="option" data-dial-code="996" data-country-code="kg">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__kg"></div>
                                                </div><span class="iti__country-name">Kyrgyzstan</span><span
                                                  class="iti__dial-code">+996</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-la"
                                                role="option" data-dial-code="856" data-country-code="la">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__la"></div>
                                                </div><span class="iti__country-name">Laos</span><span
                                                  class="iti__dial-code">+856</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-lv"
                                                role="option" data-dial-code="371" data-country-code="lv">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__lv"></div>
                                                </div><span class="iti__country-name">Latvia</span><span
                                                  class="iti__dial-code">+371</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-lb"
                                                role="option" data-dial-code="961" data-country-code="lb">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__lb"></div>
                                                </div><span class="iti__country-name">Lebanon</span><span
                                                  class="iti__dial-code">+961</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ls"
                                                role="option" data-dial-code="266" data-country-code="ls">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ls"></div>
                                                </div><span class="iti__country-name">Lesotho</span><span
                                                  class="iti__dial-code">+266</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-li"
                                                role="option" data-dial-code="423" data-country-code="li">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__li"></div>
                                                </div><span class="iti__country-name">Liechtenstein</span><span
                                                  class="iti__dial-code">+423</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-lt"
                                                role="option" data-dial-code="370" data-country-code="lt">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__lt"></div>
                                                </div><span class="iti__country-name">Lithuania</span><span
                                                  class="iti__dial-code">+370</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-lu"
                                                role="option" data-dial-code="352" data-country-code="lu">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__lu"></div>
                                                </div><span class="iti__country-name">Luxembourg</span><span
                                                  class="iti__dial-code">+352</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-mo"
                                                role="option" data-dial-code="853" data-country-code="mo">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__mo"></div>
                                                </div><span class="iti__country-name">Macau</span><span
                                                  class="iti__dial-code">+853</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-mk"
                                                role="option" data-dial-code="389" data-country-code="mk">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__mk"></div>
                                                </div><span class="iti__country-name">Macedonia</span><span
                                                  class="iti__dial-code">+389</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-mg"
                                                role="option" data-dial-code="261" data-country-code="mg">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__mg"></div>
                                                </div><span class="iti__country-name">Madagascar</span><span
                                                  class="iti__dial-code">+261</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-mw"
                                                role="option" data-dial-code="265" data-country-code="mw">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__mw"></div>
                                                </div><span class="iti__country-name">Malawi</span><span
                                                  class="iti__dial-code">+265</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-my"
                                                role="option" data-dial-code="60" data-country-code="my">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__my"></div>
                                                </div><span class="iti__country-name">Malaysia</span><span
                                                  class="iti__dial-code">+60</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-mv"
                                                role="option" data-dial-code="960" data-country-code="mv">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__mv"></div>
                                                </div><span class="iti__country-name">Maldives</span><span
                                                  class="iti__dial-code">+960</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-mt"
                                                role="option" data-dial-code="356" data-country-code="mt">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__mt"></div>
                                                </div><span class="iti__country-name">Malta</span><span
                                                  class="iti__dial-code">+356</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-mh"
                                                role="option" data-dial-code="692" data-country-code="mh">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__mh"></div>
                                                </div><span class="iti__country-name">Marshall Islands</span><span
                                                  class="iti__dial-code">+692</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-mq"
                                                role="option" data-dial-code="596" data-country-code="mq">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__mq"></div>
                                                </div><span class="iti__country-name">Martinique</span><span
                                                  class="iti__dial-code">+596</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-yt"
                                                role="option" data-dial-code="262" data-country-code="yt">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__yt"></div>
                                                </div><span class="iti__country-name">Mayotte</span><span
                                                  class="iti__dial-code">+262</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-mx"
                                                role="option" data-dial-code="52" data-country-code="mx">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__mx"></div>
                                                </div><span class="iti__country-name">Mexico</span><span
                                                  class="iti__dial-code">+52</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-mc"
                                                role="option" data-dial-code="377" data-country-code="mc">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__mc"></div>
                                                </div><span class="iti__country-name">Monaco</span><span
                                                  class="iti__dial-code">+377</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ms"
                                                role="option" data-dial-code="1" data-country-code="ms">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ms"></div>
                                                </div><span class="iti__country-name">Montserrat</span><span
                                                  class="iti__dial-code">+1</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-mz"
                                                role="option" data-dial-code="258" data-country-code="mz">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__mz"></div>
                                                </div><span class="iti__country-name">Mozambique</span><span
                                                  class="iti__dial-code">+258</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-na"
                                                role="option" data-dial-code="264" data-country-code="na">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__na"></div>
                                                </div><span class="iti__country-name">Namibia</span><span
                                                  class="iti__dial-code">+264</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-np"
                                                role="option" data-dial-code="977" data-country-code="np">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__np"></div>
                                                </div><span class="iti__country-name">Nepal</span><span
                                                  class="iti__dial-code">+977</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-nl"
                                                role="option" data-dial-code="31" data-country-code="nl">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__nl"></div>
                                                </div><span class="iti__country-name">Netherlands</span><span
                                                  class="iti__dial-code">+31</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-nc"
                                                role="option" data-dial-code="687" data-country-code="nc">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__nc"></div>
                                                </div><span class="iti__country-name">New Caledonia</span><span
                                                  class="iti__dial-code">+687</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-nz"
                                                role="option" data-dial-code="64" data-country-code="nz">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__nz"></div>
                                                </div><span class="iti__country-name">New Zealand</span><span
                                                  class="iti__dial-code">+64</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ni"
                                                role="option" data-dial-code="505" data-country-code="ni">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ni"></div>
                                                </div><span class="iti__country-name">Nicaragua</span><span
                                                  class="iti__dial-code">+505</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ne"
                                                role="option" data-dial-code="227" data-country-code="ne">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ne"></div>
                                                </div><span class="iti__country-name">Niger</span><span
                                                  class="iti__dial-code">+227</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ng"
                                                role="option" data-dial-code="234" data-country-code="ng">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ng"></div>
                                                </div><span class="iti__country-name">Nigeria</span><span
                                                  class="iti__dial-code">+234</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-no"
                                                role="option" data-dial-code="47" data-country-code="no">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__no"></div>
                                                </div><span class="iti__country-name">Norway</span><span
                                                  class="iti__dial-code">+47</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-om"
                                                role="option" data-dial-code="968" data-country-code="om">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__om"></div>
                                                </div><span class="iti__country-name">Oman</span><span
                                                  class="iti__dial-code">+968</span>
                                              </li>
                                              <li class="iti__country iti__standard iti__active" tabindex="-1"
                                                id="iti-item-pk" role="option" data-dial-code="92"
                                                data-country-code="pk" aria-selected="true">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__pk"></div>
                                                </div><span class="iti__country-name">Pakistan</span><span
                                                  class="iti__dial-code">+92</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-pw"
                                                role="option" data-dial-code="680" data-country-code="pw">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__pw"></div>
                                                </div><span class="iti__country-name">Palau</span><span
                                                  class="iti__dial-code">+680</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ps"
                                                role="option" data-dial-code="970" data-country-code="ps">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ps"></div>
                                                </div><span class="iti__country-name">Palestine</span><span
                                                  class="iti__dial-code">+970</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-py"
                                                role="option" data-dial-code="595" data-country-code="py">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__py"></div>
                                                </div><span class="iti__country-name">Paraguay</span><span
                                                  class="iti__dial-code">+595</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-pe"
                                                role="option" data-dial-code="51" data-country-code="pe">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__pe"></div>
                                                </div><span class="iti__country-name">Peru</span><span
                                                  class="iti__dial-code">+51</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ph"
                                                role="option" data-dial-code="63" data-country-code="ph">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ph"></div>
                                                </div><span class="iti__country-name">Philippines</span><span
                                                  class="iti__dial-code">+63</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-pl"
                                                role="option" data-dial-code="48" data-country-code="pl">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__pl"></div>
                                                </div><span class="iti__country-name">Poland</span><span
                                                  class="iti__dial-code">+48</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-pt"
                                                role="option" data-dial-code="351" data-country-code="pt">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__pt"></div>
                                                </div><span class="iti__country-name">Portugal</span><span
                                                  class="iti__dial-code">+351</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-pr"
                                                role="option" data-dial-code="1" data-country-code="pr">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__pr"></div>
                                                </div><span class="iti__country-name">Puerto Rico</span><span
                                                  class="iti__dial-code">+1</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-qa"
                                                role="option" data-dial-code="974" data-country-code="qa">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__qa"></div>
                                                </div><span class="iti__country-name">Qatar</span><span
                                                  class="iti__dial-code">+974</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-re"
                                                role="option" data-dial-code="262" data-country-code="re">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__re"></div>
                                                </div><span class="iti__country-name">Reunion</span><span
                                                  class="iti__dial-code">+262</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ro"
                                                role="option" data-dial-code="40" data-country-code="ro">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ro"></div>
                                                </div><span class="iti__country-name">Romania</span><span
                                                  class="iti__dial-code">+40</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-rw"
                                                role="option" data-dial-code="250" data-country-code="rw">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__rw"></div>
                                                </div><span class="iti__country-name">Rwanda</span><span
                                                  class="iti__dial-code">+250</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-sm"
                                                role="option" data-dial-code="378" data-country-code="sm">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__sm"></div>
                                                </div><span class="iti__country-name">San Marino</span><span
                                                  class="iti__dial-code">+378</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-sa"
                                                role="option" data-dial-code="966" data-country-code="sa">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__sa"></div>
                                                </div><span class="iti__country-name">Saudi Arabia</span><span
                                                  class="iti__dial-code">+966</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-sn"
                                                role="option" data-dial-code="221" data-country-code="sn">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__sn"></div>
                                                </div><span class="iti__country-name">Senegal</span><span
                                                  class="iti__dial-code">+221</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-sg"
                                                role="option" data-dial-code="65" data-country-code="sg">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__sg"></div>
                                                </div><span class="iti__country-name">Singapore</span><span
                                                  class="iti__dial-code">+65</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-sx"
                                                role="option" data-dial-code="1" data-country-code="sx">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__sx"></div>
                                                </div><span class="iti__country-name">Sint Maarten</span><span
                                                  class="iti__dial-code">+1</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-sk"
                                                role="option" data-dial-code="421" data-country-code="sk">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__sk"></div>
                                                </div><span class="iti__country-name">Slovakia</span><span
                                                  class="iti__dial-code">+421</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-si"
                                                role="option" data-dial-code="386" data-country-code="si">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__si"></div>
                                                </div><span class="iti__country-name">Slovenia</span><span
                                                  class="iti__dial-code">+386</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-za"
                                                role="option" data-dial-code="27" data-country-code="za">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__za"></div>
                                                </div><span class="iti__country-name">South Africa</span><span
                                                  class="iti__dial-code">+27</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-kr"
                                                role="option" data-dial-code="82" data-country-code="kr">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__kr"></div>
                                                </div><span class="iti__country-name">South Korea</span><span
                                                  class="iti__dial-code">+82</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-es"
                                                role="option" data-dial-code="34" data-country-code="es">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__es"></div>
                                                </div><span class="iti__country-name">Spain</span><span
                                                  class="iti__dial-code">+34</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-pm"
                                                role="option" data-dial-code="508" data-country-code="pm">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__pm"></div>
                                                </div><span class="iti__country-name">St. Pierre and
                                                  Miquelon</span><span class="iti__dial-code">+508</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-vc"
                                                role="option" data-dial-code="1" data-country-code="vc">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__vc"></div>
                                                </div><span class="iti__country-name">St. Vincent and
                                                  Grenadines</span><span class="iti__dial-code">+1</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-sr"
                                                role="option" data-dial-code="597" data-country-code="sr">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__sr"></div>
                                                </div><span class="iti__country-name">Suriname</span><span
                                                  class="iti__dial-code">+597</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-se"
                                                role="option" data-dial-code="46" data-country-code="se">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__se"></div>
                                                </div><span class="iti__country-name">Sweden</span><span
                                                  class="iti__dial-code">+46</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ch"
                                                role="option" data-dial-code="41" data-country-code="ch">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ch"></div>
                                                </div><span class="iti__country-name">Switzerland</span><span
                                                  class="iti__dial-code">+41</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-tw"
                                                role="option" data-dial-code="886" data-country-code="tw">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__tw"></div>
                                                </div><span class="iti__country-name">Taiwan</span><span
                                                  class="iti__dial-code">+886</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-tj"
                                                role="option" data-dial-code="992" data-country-code="tj">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__tj"></div>
                                                </div><span class="iti__country-name">Tajikistan</span><span
                                                  class="iti__dial-code">+992</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-tz"
                                                role="option" data-dial-code="255" data-country-code="tz">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__tz"></div>
                                                </div><span class="iti__country-name">Tanzania</span><span
                                                  class="iti__dial-code">+255</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-th"
                                                role="option" data-dial-code="66" data-country-code="th">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__th"></div>
                                                </div><span class="iti__country-name">Thailand</span><span
                                                  class="iti__dial-code">+66</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-tg"
                                                role="option" data-dial-code="228" data-country-code="tg">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__tg"></div>
                                                </div><span class="iti__country-name">Togo</span><span
                                                  class="iti__dial-code">+228</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-tr"
                                                role="option" data-dial-code="90" data-country-code="tr">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__tr"></div>
                                                </div><span class="iti__country-name">Turkey</span><span
                                                  class="iti__dial-code">+90</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-tc"
                                                role="option" data-dial-code="1" data-country-code="tc">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__tc"></div>
                                                </div><span class="iti__country-name">Turks And Caicos
                                                  Islands</span><span class="iti__dial-code">+1</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ug"
                                                role="option" data-dial-code="256" data-country-code="ug">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ug"></div>
                                                </div><span class="iti__country-name">Uganda</span><span
                                                  class="iti__dial-code">+256</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ae"
                                                role="option" data-dial-code="971" data-country-code="ae">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ae"></div>
                                                </div><span class="iti__country-name">United Arab Emirates</span><span
                                                  class="iti__dial-code">+971</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-gb"
                                                role="option" data-dial-code="44" data-country-code="gb">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__gb"></div>
                                                </div><span class="iti__country-name">United Kingdom</span><span
                                                  class="iti__dial-code">+44</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-us"
                                                role="option" data-dial-code="1" data-country-code="us">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__us"></div>
                                                </div><span class="iti__country-name">United States</span><span
                                                  class="iti__dial-code">+1</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-uy"
                                                role="option" data-dial-code="598" data-country-code="uy">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__uy"></div>
                                                </div><span class="iti__country-name">Uruguay</span><span
                                                  class="iti__dial-code">+598</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-uz"
                                                role="option" data-dial-code="998" data-country-code="uz">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__uz"></div>
                                                </div><span class="iti__country-name">Uzbekistan</span><span
                                                  class="iti__dial-code">+998</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-va"
                                                role="option" data-dial-code="39" data-country-code="va">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__va"></div>
                                                </div><span class="iti__country-name">Vatican</span><span
                                                  class="iti__dial-code">+39</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-vn"
                                                role="option" data-dial-code="84" data-country-code="vn">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__vn"></div>
                                                </div><span class="iti__country-name">Vietnam</span><span
                                                  class="iti__dial-code">+84</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-ws"
                                                role="option" data-dial-code="685" data-country-code="ws">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__ws"></div>
                                                </div><span class="iti__country-name">Western Samoa</span><span
                                                  class="iti__dial-code">+685</span>
                                              </li>
                                              <li class="iti__country iti__standard" tabindex="-1" id="iti-item-zm"
                                                role="option" data-dial-code="260" data-country-code="zm">
                                                <div class="iti__flag-box">
                                                  <div class="iti__flag iti__zm"></div>
                                                </div><span class="iti__country-name">Zambia</span><span
                                                  class="iti__dial-code">+260</span>
                                              </li>
                                            </ul>
                                          </div> -->
                                          <input v-model.trim="$v.phone.$model" name="phone" type="tel" autocomplete="none"
                                            class="intl-tel-input form-control form-field__input" placeholder="(XXX) XXX-XXXX" @keyup="formatNumber()" maxlength="10"
                                            data-intl-tel-input-id="0" :class="{ 'is-invalid': $v.phone.$error }">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="phone-12 tablet-10 tablet-centered desktop-5 desktop-uncentered columns right-form">
                          <div class="row border-box">
                            <div class="phone-12 columns">
                              <div class="row title-row">
                                <div class="phone-8 columns title">
                                  <h1>{{  product.name  }}</h1>
                                  <p style="font-size: 0.9rem;"> FREE DELIVERY Today! </p>
                                </div>
                                <div class="phone-4 columns product-image"><img :src="`${PRODUCT_IMG_URL}/${product.image}`"></div>
                                <hr>
                              </div>
                              <div class="row">
                                <div class="phone-12 columns">
                                  <h5 class="step-title">
                                    Step 3: Delivery Address
                                  </h5>
                                </div>
                              </div>
                              <div class="index-form-shipping scroll-to-block">
                                <div class="row">
                                  <div class="phone-12 columns parent-validField">
                                    <div class="form-field country-selector-field">
                                      <div class="cs-container cs-container--value-set">
                                          <select v-model.trim="$v.country.$model" :class="{ 'is-invalid': $v.country.$error }" class="form-select" aria-label="Default select example">
                                          <option value=""> Choose Country </option>
                                          <option value="Albania"> Albania </option>
                                          <option value="Algeria"> Algeria </option>
                                          <option value="Andorra"> Andorra </option>
                                          <option value="Angola"> Angola </option>
                                          <option value="Anguilla"> Anguilla </option>
                                          <option value="Antigua and Barbuda"> Antigua and Barbuda </option>
                                          <option value="Argentina"> Argentina </option>
                                          <option value="Armenia"> Armenia </option>
                                          <option value="Aruba"> Aruba </option>
                                          <option value="Australia"> Australia </option>
                                          <option value="Austria"> Austria </option>
                                          <option value="Azerbaijan"> Azerbaijan </option>
                                          <option value="Bahrain"> Bahrain </option>
                                          <option value="Bangladesh"> Bangladesh </option>
                                          <option value="Barbados"> Barbados </option>
                                          <option value="Belgium"> Belgium </option>
                                          <option value="Benin"> Benin </option>
                                          <option value="Bermuda"> Bermuda </option>
                                          <option value="Bhutan"> Bhutan </option>
                                          <option value="Brazil"> Brazil </option>
                                          <option value="British"> British </option>
                                          <option value="Bulgaria"> Bulgaria </option>
                                          <option value="Burkina Faso"> Burkina Faso </option>
                                          <option value="Cameroon"> Cameroon </option>
                                          <option value="Canada"> Canada </option>
                                          <option value="Cayman Islands"> Cayman Islands </option>
                                          <option value="Chad"> Chad </option>
                                          <option value="Chile"> Chile </option>
                                          <option value="China"> China </option>
                                          <option value="Christmas Island"> Christmas Island </option>
                                          <option value="Colombia"> Colombia </option>
                                          <option value="Comoros"> Comoros </option>
                                          <option value="Costa Rica"> Costa Rica </option>
                                          <option value="Croatia"> Croatia </option>
                                          <option value="Cyprus"> Cyprus </option>
                                          <option value="Czech Republic"> Czech Republic </option>
                                          <option value="Denmark"> Denmark </option>
                                          <option value="Djibouti"> Djibouti </option>
                                          <option value="Dominica"> Dominica </option>
                                          <option value="Egypt"> Egypt </option>
                                          <option value="El Salvador"> El Salvador </option>
                                          <option value="Equatorial Guinea"> Equatorial Guinea </option>
                                          <option value="Estonia"> Estonia </option>
                                          <option value="Ethiopia"> Ethiopia </option>
                                          <option value="Falkland Islands"> Falkland Islands </option>
                                          <option value="Faroe Islands"> Faroe Islands </option>
                                          <option value="Finland"> Finland </option>
                                          <option value="France"> France </option>
                                          <option value="French Guiana"> French Guiana </option>
                                          <option value="Gabon"> Gabon </option>
                                          <option value="Gambia"> Gambia </option>
                                          <option value="Georgia"> Georgia </option>
                                          <option value="Germany"> Germany </option>
                                          <option value="Ghana"> Ghana </option>
                                          <option value="Gibraltar"> Gibraltar </option>
                                          <option value="Greece"> Greece </option>
                                          <option value="Greenland"> Greenland </option>
                                          <option value="Grenada"> Grenada </option>
                                          <option value="Guadeloupe"> Guadeloupe </option>
                                          <option value="Guam"> Guam </option>
                                          <option value="Guatemala"> Guatemala </option>
                                          <option value="Guernsey"> Guernsey </option>
                                          <option value="Guinea"> Guinea </option>
                                          <option value="Guyana"> Guyana </option>
                                          <option value="Haiti"> Haiti </option>
                                          <option value="Hong Kong"> Hong Kong </option>
                                          <option value="Hungary"> Hungary </option>
                                          <option value="Iceland"> Iceland </option>
                                          <option value="India"> India </option>
                                          <option value="Indonesia"> Indonesia </option>
                                          <option value="Ireland"> Ireland </option>
                                          <option value="Israel"> Israel </option>
                                          <option value="Italy"> Italy </option>
                                          <option value="Jamaica"> Jamaica </option>
                                          <option value="Japan"> Japan </option>
                                          <option value="Jersey"> Jersey </option>
                                          <option value="Jordan"> Jordan </option>
                                          <option value="Kazakhstan"> Kazakhstan </option>
                                          <option value="Kyrgyzstan"> Kyrgyzstan </option>
                                          <option value="Laos"> Laos </option>
                                          <option value="Latvia"> Latvia </option>
                                          <option value="Lebanon"> Lebanon </option>
                                          <option value="Lesotho"> Lesotho </option>
                                          <option value="Liechtenstein"> Liechtenstein </option>
                                          <option value="Lithuania"> Lithuania </option>
                                          <option value="Luxembourg"> Luxembourg </option>
                                          <option value="Macau"> Macau </option>
                                          <option value="Macedonia"> Macedonia </option>
                                          <option value="Madagascar"> Madagascar </option>
                                          <option value="Malawi"> Malawi </option>
                                          <option value="Malaysia"> Malaysia </option>
                                          <option value="Maldives"> Maldives </option>
                                          <option value="Malta"> Malta </option>
                                          <option value="Marshall Islands"> Marshall Islands </option>
                                          <option value="Martinique"> Martinique </option>
                                          <option value="Mayotte"> Mayotte </option>
                                          <option value="Mexico"> Mexico </option>
                                          <option value="Monaco"> Monaco </option>
                                          <option value="Montserrat"> Montserrat </option>
                                          <option value="Mozambique"> Mozambique </option>
                                          <option value="Namibia"> Namibia </option>
                                          <option value="Nepal"> Nepal </option>
                                          <option value="Netherlands"> Netherlands </option>
                                          <option value="New Caledonia"> New Caledonia </option>
                                          <option value="New Zealand"> New Zealand </option>
                                          <option value="Nicaragua"> Nicaragua </option>
                                          <option value="Niger"> Niger </option>
                                          <option value="Nigeria"> Nigeria </option>
                                          <option value="Norway"> Norway </option>
                                          <option value="Oman"> Oman </option>
                                          <option value="Pakistan"> Pakistan </option>
                                          <option value="Palau"> Palau </option>
                                          <option value="Palestine"> Palestine </option>
                                          <option value="Paraguay"> Paraguay </option>
                                          <option value="Peru"> Peru </option>
                                          <option value="Philippines"> Philippines </option>
                                          <option value="Poland"> Poland </option>
                                          <option value="Portugal"> Portugal </option>
                                          <option value="Puerto Rico"> Puerto Rico </option>
                                          <option value="Qatar"> Qatar </option>
                                          <option value="Reunion"> Reunion </option>
                                          <option value="Romania"> Romania </option>
                                          <option value="Rwanda"> Rwanda </option>
                                          <option value="San Marino"> San Marino </option>
                                          <option value="Saudi Arabia"> Saudi Arabia </option>
                                          <option value="Senegal"> Senegal </option>
                                          <option value="Singapore"> Singapore </option>
                                          <option value="Sint Maarten"> Sint Maarten </option>
                                          <option value="Slovakia"> Slovakia </option>
                                          <option value="Slovenia"> Slovenia </option>
                                          <option value="South Africa"> South Africa </option>
                                          <option value="South Korea"> South Korea </option>
                                          <option value="Spain"> Spain </option>
                                          <option value="St. Pierre and Miquelon"> St. Pierre and Miquelon </option>
                                          <option value="St. Vincent and Grenadines"> St. Vincent and Grenadines
                                          </option>
                                          <option value="Suriname"> Suriname </option>
                                          <option value="Sweden"> Sweden </option>
                                          <option value="Switzerland"> Switzerland </option>
                                          <option value="Taiwan"> Taiwan </option>
                                          <option value="Tajikistan"> Tajikistan </option>
                                          <option value="Tanzania"> Tanzania </option>
                                          <option value="Thailand"> Thailand </option>
                                          <option value="Togo"> Togo </option>
                                          <option value="Turkey"> Turkey </option>
                                          <option value="Turks And Caicos Islands"> Turks And Caicos Islands </option>
                                          <option value="Uganda"> Uganda </option>
                                          <option value="United Arab Emirates"> United Arab Emirates </option>
                                          <option value="United Kingdom"> United Kingdom </option>
                                          <option value="United States"> United States </option>
                                          <option value="Uruguay"> Uruguay </option>
                                          <option value="Uzbekistan"> Uzbekistan </option>
                                          <option value="Vatican"> Vatican </option>
                                          <option value="Vietnam"> Vietnam </option>
                                          <option value="Western Samoa"> Western Samoa </option>
                                          <option value="Zambia"> Zambia </option>
                                        </select>
                                        <label class="form-field__label">Country</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="phone-12 columns parent-validField">
                                    <div class="form-field form-field--full">
                                      <input v-model.trim="$v.address.$model" placeholder="Street and House Number" field="input" type="text"
                                        name="address" autocomplete="none" maxlength="100" class="form-control form-field__input" :class="{ 'is-invalid': $v.address.$error }">
                                      <label class="form-field__label">Street and House Number</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="phone-12 columns parent-validField">
                                    <div class="form-field">
                                      <input v-model.trim="$v.city.$model" placeholder="Town/City" autocomplete="none" field="input"
                                        type="text" name="city" maxlength="60" class="form-control form-field__input" :class="{ 'is-invalid': $v.city.$error }">
                                      <label class="form-field__label">Town/City</label>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="phone-12 columns parent-validField">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="phone-12 columns parent-validField">
                                    <div class="form-field">
                                      <input v-model.trim="$v.zipcode.$model" placeholder="Postal Code" autocomplete="none" field="input"
                                        type="text" name="zip" maxlength="15" class="form-control form-field__input" :class="{ 'is-invalid': $v.zipcode.$error }">
                                      <label class="form-field__label">Postal Code</label>
                                    </div>
                                  </div>
                                </div>
                                <div>
                                  <div class="row">
                                    <div class="phone-12 columns">
                                      <div class="cc-logos">
                                        <ul class="payment_method-icons">
                                          <li><img src="/images/visa.svg" alt="Visa"
                                              class="img_payment_method method-card active Visa-logo"><img
                                              src="/images/mastercard.svg" alt="MasterCard"
                                              class="img_payment_method method-card MasterCard-logo"></li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row margin-bottom-5">
                                    <div class="phone-12 columns">
                                      <label for="payment_method">Payment Method</label>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="phone-12 columns parent-validField">
                                      <div class="cs-container">
                                        <select v-model.trim="$v.cardType.$model" class="form-select" aria-label="Default select example" :class="{ 'is-invalid': $v.cardType.$error }">
                                          <option value="visa">Visa</option>
                                          <option value="master">Master</option>
                                          <option value="debit">Debit</option>
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="row scroll-to-block">
                                <div class="phone-12 columns parent-validField cc-card-elements">
                                  <div>
                                    <div class="form-group">
                                      <div class="form-field form-field--full"><span class="card-type default"></span>
                                        <input v-model.trim="$v.cardNumber.$model" type="number" @input="truncateCardNumber" placeholder="Card Number"
                                          class="cc-number form-control form-field__input" autocomplete="none" :class="{ 'is-invalid': $v.cardNumber.$error }">
                                        <label class="form-field__label">Card Number</label>
                                      </div>
                                      <div class="form-field">
                                        <select name="expiry_month" v-model.trim="$v.cardExpiryMonth.$model" type="tel" placeholder="Expiry Month" class="form-control form-field__input" autocomplete="none" :class="{ 'is-invalid': $v.cardExpiryMonth.$error }">
                                          <option value="" selected>Select Expiry Month</option>
                                          <option value="01">01</option>
                                          <option value="02">02</option>
                                          <option value="03">03</option>
                                          <option value="04">04</option>
                                          <option value="05">05</option>
                                          <option value="06">06</option>
                                          <option value="07">07</option>
                                          <option value="08">08</option>
                                          <option value="09">09</option>
                                          <option value="10">10</option>
                                          <option value="11">11</option>
                                          <option value="12">12</option>
                                        </select>
                                      </div>
                                      <div class="form-field">
                                        <select name="expiry_year" v-model.trim="$v.cardExpiryYear.$model" type="tel" placeholder="Expiry Year" class="form-control form-field__input" autocomplete="none" :class="{ 'is-invalid': $v.cardExpiryYear.$error }">
                                          <option value="" selected>Select Expiry Year</option>
                                          <option value="2023">2023</option>
                                          <option value="2024">2024</option>
                                          <option value="2025">2025</option>
                                          <option value="2026">2026</option>
                                          <option value="2027">2027</option>
                                          <option value="2028">2028</option>
                                          <option value="2029">2029</option>
                                          <option value="2030">2030</option>
                                          <option value="2031">2031</option>
                                          <option value="2032">2032</option>
                                          <option value="2033">2033</option>
                                          <option value="2034">2034</option>
                                        </select>
                                      </div>
                                      <div class="form-field" value=""><span class="form-field__help"></span>
                                        <input v-model.trim="$v.cardCvv.$model" type="number" name="cc_cvv" placeholder="CVV" @input="truncateCVV"
                                          class="cc-cvv form-control form-field__input" autocomplete="none" :class="{ 'is-invalid': $v.cardCvv.$error }">
                                        <label class="form-field__label">CVV</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row-war">
                                <div class="warrantee-block bestseller-warrantee-box">
                                  <div class="warrantee-box">
                                    <input v-model="tookWarranty" type="checkbox" name="warrantee-input" id="warrantee-input" class="warrantee"
                                      autocomplete="none">
                                    <label for="warrantee-input" class="warrantee-title">
                                      <span>3 Years Warranty:</span>
                                      <div class="inl-b">${{warrantyPrice}}</div>
                                    </label>
                                  </div>
                                  <label for="warrantee-input"><img src="/images/bestseller.png" width="49"
                                      height="59"></label>
                                </div>
                              </div>
                              <div class="row">
                                <div class="phone-12 columns text-center">
                                  <button type="submit" class="custom-button button-flat submit-btn expand"><span
                                      class="text">YES! SEND ME NOW</span></button>
                                </div>
                              </div>
                              <div class="encryption">
                                <div class="phone-12 columns text-center">{{ info_text }}</div>
                              </div>
                              <div class="encryption disclaimer-usd"><span class="smaller"></span></div>
                              <div class="text-center">
                                <br> <img src="/images/security-logos.png">
                              </div>
                              <div class="encryption"><i class="icon-lock"></i> <span class="smaller">Safe 256-Bit SSL
                                  encryption</span></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="v-portal" style="display: none;"></div>
            <div class="v-portal" style="display: none;"></div>
            <div class="v-portal" style="display: none;"></div>
            <div class="popups">
              <div id="someone-purchased" class="lastbuyer-box"><img src="/images/product-share.png"
                  alt="WIFI UltraBoost">
                <p><span><span class="lb-name">MEHBOOB</span> near <span class="lb-country">Lalamusa, Pakistan</span>
                    just bought:</span>
                  <a href="javascript:void(0)" class="prod_label_LastBuyer">
                    <div class="transl_text"><b>1</b> WIFI UltraBoost
                      <div class="inl-b">(<span class="calc-price">$22,230</span>/each)</div>
                    </div>
                  </a>
                </p>
              </div>
            </div>
            <!---->
            <div data-v-38530461="" class="wheel-container">
              <div data-v-38530461="" class="discount-wheel-outer">
                <div data-v-38530461="" class="logo"><img data-v-38530461="" src="/images/logo.png" alt="logo"
                    class="img-fluid"></div>
                <div data-v-38530461="" class="containered">
                  <div data-v-38530461="" class="wheel-object">
                    <div data-v-38530461="" class="triangle-svg">
                      <svg data-v-38530461="" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000"
                        enable-background="new 0 0 1000 1000" xml:space="preserve">
                        <g data-v-38530461="">
                          <path data-v-38530461="" fill="#15bd96"
                            d="M579.5,879.8c-43.7,75.7-115.3,75.7-159,0L28.7,201.1c-43.7-75.7-8-137.7,79.5-137.7h783.7c87.5,0,123.2,62,79.5,137.7L579.5,879.8z">
                          </path>
                        </g>
                      </svg>
                    </div>
                    <div data-v-e84d09d6="" data-v-38530461="" class="fw-container">
                      <div data-v-e84d09d6="" class="fw-wheel"
                        style="transform: rotateZ(0deg); transition-duration: 0s; transition-timing-function: cubic-bezier(0.36, 0.95, 0.64, 1);">
                        <canvas data-v-e84d09d6="" width="500" height="500"></canvas>
                      </div>
                      <div data-v-e84d09d6="" class="fw-btn">
                        <div data-v-e84d09d6="" class="fw-btn__btn" style="width: 50px; height: 50px;"> </div>
                      </div>
                    </div>
                  </div>
                  <div data-v-38530461="" class="description win-descr">
                    <div data-v-38530461="" class="description-text">
                      <h2 data-v-38530461="">Hurray! You’ve just WON a 10% discount.</h2>
                      <h2 data-v-38530461="">Lucky Day!</h2>
                      <p data-v-38530461="">Click the button below to activate your discount.</p>
                    </div>
                    <button data-v-38530461="">CONTINUE &amp; USE DISCOUNT</button>
                    <div data-v-38530461="" class="description-cancel">
                      <p data-v-38530461="" style="cursor: pointer;">Reject discount</p>
                      <div data-v-38530461="" class="close">
                        <svg data-v-38530461="" fill="#fff" height="22px" id="Layer_1" version="1.1"
                          viewBox="0 0 512 512" width="22px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                          xmlns:xlink="http://www.w3.org/1999/xlink">
                          <path data-v-38530461=""
                            d="M443.6,387.1L312.4,255.4l131.5-130c5.4-5.4,5.4-14.2,0-19.6l-37.4-37.6c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4  L256,197.8L124.9,68.3c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4L68,105.9c-5.4,5.4-5.4,14.2,0,19.6l131.5,130L68.4,387.1  c-2.6,2.6-4.1,6.1-4.1,9.8c0,3.7,1.4,7.2,4.1,9.8l37.4,37.6c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1L256,313.1l130.7,131.1  c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1l37.4-37.6c2.6-2.6,4.1-6.1,4.1-9.8C447.7,393.2,446.2,389.7,443.6,387.1z">
                          </path>
                        </svg>
                      </div>
                    </div>
                  </div>
                  <!---->
                  <div data-v-38530461="" class="description">
                    <div data-v-38530461="" class="description-text">
                      <h2 data-v-38530461="">Wait! Just a Second. Secret bonus unlocked!</h2>
                      <p data-v-38530461="">You have a chance to win a juicy discount. Are you ready? Click the button
                        below.</p>
                      <ul data-v-38530461="">
                        <li data-v-38530461="">You can spin the wheel only once.</li>
                        <li data-v-38530461="">If you win, you can claim your discount for 10 minutes only.</li>
                      </ul>
                    </div>
                    <button data-v-38530461="">I’M FEELING LUCKY</button>
                    <div data-v-38530461="">
                      <div data-v-38530461="" class="progressbar-holder">
                        <div data-v-38530461="" class="progressbar"></div>
                      </div>
                      <p data-v-38530461="">75% of discounts claimed. Act fast!</p>
                      <div data-v-38530461="" class="description-cancel">
                        <p data-v-38530461="">No, I don’t feel lucky</p>
                        <div data-v-38530461="" class="close">
                          <svg data-v-38530461="" fill="#fff" height="22px" id="Layer_1" version="1.1"
                            viewBox="0 0 512 512" width="22px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path data-v-38530461=""
                              d="M443.6,387.1L312.4,255.4l131.5-130c5.4-5.4,5.4-14.2,0-19.6l-37.4-37.6c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4  L256,197.8L124.9,68.3c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4L68,105.9c-5.4,5.4-5.4,14.2,0,19.6l131.5,130L68.4,387.1  c-2.6,2.6-4.1,6.1-4.1,9.8c0,3.7,1.4,7.2,4.1,9.8l37.4,37.6c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1L256,313.1l130.7,131.1  c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1l37.4-37.6c2.6-2.6,4.1-6.1,4.1-9.8C447.7,393.2,446.2,389.7,443.6,387.1z">
                            </path>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!---->
          </div>
        </div>
        <div class="row">
          <div class="phone-12 columns footer-container">
            <div class="social-icons">
              <a href="javascript: void(0);" class="social-icon facebook social-btn-container-facebook"><img
                  src="/images/facebook.png"></a>
              <a href="javascript: void(0);" class="social-icon twitter social-btn-container-twitter"><img
                  src="/images/twitter.png"></a>
              <a href="mailto:?Subject=I%20found%20this%20WIFI%20UltraBoost&amp;Body=I%20love%20my%20WIFI%20UltraBoost!%20Click%20here%20to%20get%20yours%20too."
                class="social-icon mailto"><img src="/images/mailto.png"></a>
            </div>
            <p class="policy-links"><a target="_blank" href="#">
                About us |
              </a> <a target="_blank" href="#">
                Contact Us |
              </a> <a target="_blank" href="#">
                Impressum |
              </a> <a target="_blank" href="#">
                Terms of business |
              </a> <a target="_blank" href="#">
                Data privacy statement |
              </a> <a href="#" target="_blank">Affiliate Program</a></p>
            <div class="text-center">
              <p class="policy-links" style="padding: 0px;"> Hyper Sls Ltd - Hong Kong
                <br> <span>Copyright © {{ new Date().getFullYear() }} onlybestgadgets. All Rights Reserved</span>
              </p>
            </div>
            <div class="text-center">
              <a href="javascript: void(0);" class="dmca-badge"><img src="/images/dmca_protected_sml_120s.png"
                  width="87" height="30"></a>
            </div>
          </div>
        </div>
      </div>
      <button type="button" class="scroll-top" style=""></button>
      <div data-v-cde1dacc="" class="v-portal" style="display: none;"></div>
      <div class="vue-portal-target">
        <div class="c-modal">
          <div class="c-modal__backdrop" style="display: none;"></div>
          <div tabindex="-1" class="c-modal__scroller" style="display: none;">
            <div class="c-modal__wrapper">
              <div class="c-modal__container"></div>
            </div>
          </div>
        </div>
        <div class="c-modal">
          <div class="c-modal__backdrop" style="display: none;"></div>
          <div tabindex="-1" class="c-modal__scroller" style="display: none;">
            <div class="c-modal__wrapper">
              <div class="c-modal__container">
                <div data-v-12b337fc="" class="duplicate-order-dialog">
                  <h2 data-v-12b337fc="">Looks like you have purchased this item before.</h2>
                  <p data-v-12b337fc=""><strong></strong>, it looks like you have already purchased today. Please
                    confirm if you want to buy again.</p>
                  <p data-v-12b337fc="">Your previous order has been successfully processed and will be delivered to
                    <span class="address"></span>
                  </p>
                  <div data-v-12b337fc="" class="duplicate-order-dialog__btn-container">
                    <button data-v-12b337fc="" class="btn">Yes</button>
                    <button data-v-12b337fc="" class="btn">No</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="vue-portal-target"></div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import { validationMixin } from "vuelidate";
import { BASE_URL, PRODUCT_IMG_URL } from '../constant'
import {
  required
} from "vuelidate/lib/validators";

export default {
  name: "CheckoutType1",
  mixins: [validationMixin],
  validations() {
    return {
      firstName: {
        required
      },
      lastName: {
        required
      },
      gender: {
        required
      },
      email: {
        required
      },
      country: {
        required
      },
      address: {
        required
      },
      city: {
        required
      },
      zipcode: {
        required
      },
      phone: {
        required
      },
      cardType:{
        required
      },
      cardNumber: {
        required
      },
      cardExpiryMonth: {
        required
      },
      cardExpiryYear: {
        required
      },
      cardCvv: {
        required
      }
    }
  },
  data() {
    return {
      product: {},
      firstName: '',
      lastName: '',
      gender: 'Mr',
      email: '',
      country: 'United States',
      address: '',
      city: '',
      zipcode: '',
      phone: '',
      cardType: 'visa',
      cardNumber: '',
      cardExpiryDate: '',
      cardExpiryYear: '',
      cardExpiryMonth: '',
      cardCvv: '',
      price: 0,
      tookWarranty: false,
      warrantyPrice: 2021,
      offerEndTime: '',
      hasInitialized: false,
      PRODUCT_IMG_URL: PRODUCT_IMG_URL,
      campaign_crm_id: '',
      crm_id: '',
      activeOffer: 0,
      info_text: '',
      campaign_id: ''
    }
  },
  mounted() {
    this.init()
    this.offerEndInterval()
  },
  methods: {
    formatNumber(){
      let cleaned = ('' + this.phone).replace(/\D/g, '')
      let formatted = cleaned.replace(/^(\d{3})(\d{3})(\d{4})$/, '($1) $2-$3')
      this.phone = formatted
    },
    truncateCVV (){
      if(this.cardCvv.length > 3){
        this.cardCvv = this.cardCvv.slice(0, 3)
      }
    },
    truncateCardNumber (){
      if(this.cardNumber.length > 16){
        this.cardNumber = this.cardNumber.slice(0, 16)
      }
    },
    async init() {
      await axios
        .get(`${BASE_URL}/list-offers/${this.$route.params.slug}`)
        .then((response) => {
          document.title = response.data.data.name
          let data = response.data.data
          this.info_text = data.info_text
          let offerLastIndex = data.offers.length - 1
          let lastOffer = data.offers[offerLastIndex]

          this.product = data
          this.price = (lastOffer.price * lastOffer.discount / 100).toFixed(2)
          this.crm_id = lastOffer.crm_id
          this.campaign_id = lastOffer.campaign_id
          this.activeOffer = offerLastIndex
        })
      this.hasInitialized = true;
    },
    async onSubmit() {
      let formData = new FormData();
      formData.append('firstName', this.firstName)
      formData.append('lastName', this.lastName)
      formData.append('gender', this.gender)
      formData.append('email', this.email)
      formData.append('country', this.country)
      formData.append('address', this.address)
      formData.append('city', this.city)
      formData.append('zipcode', this.zipcode)
      formData.append('phone', this.phone)
      formData.append('cardType', this.cardType)
      formData.append('cardNumber', this.cardNumber)
      formData.append('cardExpiryDate', this.cardExpiryMonth + this.cardExpiryYear)
      formData.append('cardCvv', this.cardCvv)
      formData.append('campaign_crm_id', this.product.campaign_crm_id)
      formData.append('crm_id', this.crm_id)
      formData.append('price', this.price)
      formData.append('campaign_id', this.campaign_id)
      if (this.tookWarranty) {
        formData.append('warrantyPrice', this.warrantyPrice)
      }

      this.$v.$touch();
      if (this.$v.$invalid) return;

      await axios
        .post(`${BASE_URL}/checkout`, formData)
        .then((response) => {
          if(response.data.status == 200){
            window.location.replace(response.data.redirect_url)
          }
          if(response.data.status == 400){
            this.$swal(response.data.error)
          }
        })
    },
    offerEndInterval() {
      const countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();
      setInterval(() => {
        const now = new Date().getTime();

        // Find the distance between now and the count down date
        const distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        this.offerEndTime = minutes + ":" + seconds + "";

        // If the count down is over, write some text
        if (distance < 0) {
          clearInterval(x);
          this.offerEndTime = "EXPIRED";
        }
      }, 1000);
    },
    doActiveOffer(price, crm_id, campaign_id) {
      this.price = price
      this.crm_id = crm_id
      this.campaign_id = campaign_id
    }
  }
}
</script>

<style scoped>
@import '../../css/style4.css';
</style>
