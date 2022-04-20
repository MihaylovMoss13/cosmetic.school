<script>
  import VueSlickCarousel from 'vue-slick-carousel'
  import 'vue-slick-carousel/dist/vue-slick-carousel.css'
  // optional style for arrows & dots
  import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

  import AppBanner from "../components/shared/AppBanner.vue";
  import Button from "../components/reusable/Button.vue";
  export default {
    scrollToTop: true,
    components: { VueSlickCarousel, AppBanner, Button },
    data() {
      return {
        settings: {
          arrows: true,
          dots: true,
          autoplay: true,
          speed: 300,
        },
      }
    }
  };
</script>

<template>
  <div>
    <div
      class="
        bg-overlay
        relative
        lg:h-screen
      "
      style="margin-top:-220px;overflow:hidden;"
    >
      <VueSlickCarousel :arrows="true" :dots="true" v-bind="settings"
        style="margin-top:-220px;overflow:hidden;"
      >
        <img
          src="~/static/home/slider-main-1.jpeg"
        >
        <img
          src="~/static/home/slider-main-2.jpeg"
        >
        <img
          src="~/static/home/slider-main-3.jpeg"
        >
      </VueSlickCarousel>
      <section
        class="
          flex flex-col
          sm:justify-between
          items-center
          sm:flex-row
          lg:h-screen
          absolute
        "
        style="z-index:1;right:0;left:0;top:0;"
      >
        <div class="container relative mx-auto">
          <div
            class="
              w-full
              text-left
              relative
            "
          >
            <div
              class="
                pt-36
                items-center
                justify-evenly
                flex
                flex-wrap
                w-full
              "
            >
              <img
                src="~/static/cs-dark.svg"
                alt="Cosmetic School"
                class="
                  w-72
                  mb-6
                "
              />
              <div
                class="
                  lg:w-1/2
                "
              >
                <p
                  class="
                    font-general-regular
                    text-lg
                    sm:text-xl
                    text-center
                    sm:text-left
                    leading-none
                    text-uppercase
                    brand-color
                  "
                  style="font-size: 48px; line-height: 52px;"
                >
                  Очное образование в индустрии красоты
                </p>
                <p
                  class="
                    font-general-regular
                    text-lg
                    sm:text-xl
                    text-center
                    sm:text-left
                    leading-none
                    text-uppercase
                    brand-color
                    mt-4
                  "
                >
                  Возможно индивидуальное обучение
                </p>
              </div>
            </div>
            <div class="flex justify-center flex-wrap text-center w-full">
              <p class="mt-6 mb-2 w-full">Выберите направление обучения:</p>
              <div
                class="flex"
              >
                <NuxtLink
                  to="/about"
                  class="
                    flex
                    justify-center
                    items-center
                    w-60
                    sm:w-60
                    mt-2
                    mr-4
                    mb-6
                    sm:mb-0
                    text-lg
                    py-2.5
                    sm:py-3
                    shadow-lg
                    rounded-lg
                    bg-indigo-50
                    focus:ring-1 focus:ring-indigo-900
                    hover:bg-indigo-500
                    duration-500
                    brand-color-bg
                    text-white
                  "
                  aria-label="Курсы косметологии"
                >
                  <span class="text-sm sm:text-lg font-general-medium duration-100"
                    >Курсы косметологии</span
                  >
                </NuxtLink>
                <NuxtLink
                  to="/about"
                  download=""
                  class="
                    flex
                    justify-center
                    items-center
                    w-36
                    sm:w-60
                    mt-2
                    mb-6
                    sm:mb-0
                    text-lg
                    py-2.5
                    sm:py-3
                    shadow-lg
                    rounded-lg
                    bg-indigo-50
                    focus:ring-1 focus:ring-indigo-900
                    hover:bg-indigo-500
                    brand-color-bg
                    text-white
                    duration-500
                  "
                  aria-label="Колористика"
                >
                  <span class="text-sm sm:text-lg font-general-medium duration-100"
                    >Колористика</span
                  >
                </NuxtLink>
                <NuxtLink
                  to="/about"
                  download=""
                  class="
                    flex
                    justify-center
                    items-center
                    w-36
                    sm:w-60
                    mt-2
                    ml-4
                    mb-6
                    sm:mb-0
                    text-lg
                    py-2.5
                    sm:py-3
                    shadow-lg
                    rounded-lg
                    bg-indigo-50
                    focus:ring-1 focus:ring-indigo-900
                    hover:bg-indigo-500
                    brand-color-bg
                    text-white
                    duration-500
                  "
                  aria-label="Другие курсы"
                >
                  <span class="text-sm sm:text-lg font-general-medium duration-100"
                    >Другие курсы</span
                  >
                </NuxtLink>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <div class="container mt-12 mx-auto">
      <ProjectsGrid />

      <!-- View more projects button -->
      <div class="mt-5 sm:mt-14 flex justify-center">
        <NuxtLink
          to="/kursy"
          class="
            font-general-medium
            flex
            items-center
            px-6
            py-3
            rounded-lg
            shadow-lg
            hover:shadow-xl
            bg-indigo-500
            hover:bg-indigo-600
            focus:ring-1 focus:ring-indigo-900
            text-white text-lg
            sm:text-xl
            duration-300
          "
          aria-label="Все курсы"
        >
          <Button title="Все курсы" />
        </NuxtLink>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
