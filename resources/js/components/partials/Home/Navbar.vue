<template>
    <header class="header">
        <div class="header__container container">
            <div class="dropdown language-selector">
                <button type="button" class="dropdown__button" @click="showLanguage">
                    <div class="selected-country-code">en</div>
                </button>
            </div>
            <a href="#" aria-current="page"
                class="logo router-link-exact-active router-link-active">
                <!-- <div class="logo__img"></div> -->
                <div class="logo__text">onlybestgadgets</div>
            </a>
            <button class="header__toggle navbar-toggler"></button>
            <div class="header__navigation-wrapper">
                <nav class="header__navigation "><a href="#"
                        class="button button--contact" target="_blank">
                        Contact Us
                    </a> <a href="#" target="_blank"
                        class="button button--white  header__button--tracking">
                        Order Tracking
                    </a></nav>
                <ul class="dropdown__list" id="myDIV" v-show="showNavbar">
                    <li class="dropdown__item">
                        <div class="language-key-text active">EN USA</div>
                    </li>
                    <li class="dropdown__item">
                        <div class="language-key-text">ES Spain</div>
                    </li>
                    <li class="dropdown__item">
                        <div class="language-key-text">DE Germany</div>
                    </li>
                    <li class="dropdown__item">
                        <div class="language-key-text">PT Portugal</div>
                    </li>
                    <li class="dropdown__item">
                        <div class="language-key-text">FR France</div>
                    </li>
                    <li class="dropdown__item">
                        <div class="language-key-text">JP Japan</div>
                    </li>
                    <li class="dropdown__item">
                        <div class="language-key-text">IT Italy</div>
                    </li>
                    <li class="dropdown__item">
                        <div class="language-key-text">KR South Korea</div>
                    </li>
                    <li class="dropdown__item">
                        <div class="language-key-text">NL Netherland</div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="erd_scroll_detection_container erd_scroll_detection_container_animation_active"
            style="visibility: hidden; display: inline; width: 0px; height: 0px; z-index: -1; overflow: hidden; margin: 0px; padding: 0px;">
            <div dir="ltr" class="erd_scroll_detection_container"
                style="position: absolute; flex: 0 0 auto; overflow: hidden; z-index: -1; visibility: hidden; width: 100%; height: 100%; left: 0px; top: 0px;">
                <div class="erd_scroll_detection_container"
                    style="position: absolute; flex: 0 0 auto; overflow: hidden; z-index: -1; visibility: hidden; inset: -18px -17px -17px -18px;">
                    <div
                        style="position: absolute; flex: 0 0 auto; overflow: scroll; z-index: -1; visibility: hidden; width: 100%; height: 100%;">
                        <div style="position: absolute; left: 0px; top: 0px; width: 1394px; height: 133px;"></div>
                    </div>
                    <div
                        style="position: absolute; flex: 0 0 auto; overflow: scroll; z-index: -1; visibility: hidden; width: 100%; height: 100%;">
                        <div style="position: absolute; width: 200%; height: 200%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
  name: "Navbar",
  data() {
    return {
        showNavbar: false
    }
  },
  methods: {
    showLanguage () {
      this.showNavbar = !this.showNavbar
    }
  }
}
</script>
