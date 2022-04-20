<script>
import feather from "feather-icons";

export default {
  data: () => {
    return {
      // Todo
    };
  },

  mounted() {
    feather.replace();
  },
  updated() {
    feather.replace();
  },
};
</script>

<template>
  <section
    class="
      flex flex-col
      sm:justify-between
      items-center
      sm:flex-row
      lg:h-screen
      bg-overlay
      relative
    "
    style="margin-top: -220px; background: url(/_nuxt/static/home/slider.jpeg)"
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
                w-36
                sm:w-48
                mt-2
                mr-4
                mb-6
                sm:mb-0
                text-lg
                border border-indigo-200
                py-2.5
                sm:py-3
                shadow-lg
                rounded-lg
                bg-indigo-50
                focus:ring-1 focus:ring-indigo-900
                hover:bg-indigo-500
                duration-500
                text-white
                brand-color-bg
              "
              aria-label="Косметология"
            >
              <span class="text-sm sm:text-lg font-general-medium duration-100"
                >Косметология</span
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
                mr-4
                mb-6
                sm:mb-0
                text-lg
                border border-indigo-200
                dark:border-ternary-dark
                py-2.5
                sm:py-3
                shadow-lg
                rounded-lg
                bg-indigo-50
                focus:ring-1 focus:ring-indigo-900
                hover:bg-indigo-500
                text-white
                brand-color-bg
                duration-500
              "
              aria-label="Сестринское дело"
            >
              <span class="text-sm sm:text-lg font-general-medium duration-100"
                >Сестринское дело</span
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
                border border-indigo-200
                dark:border-ternary-dark
                py-2.5
                sm:py-3
                shadow-lg
                rounded-lg
                bg-indigo-50
                focus:ring-1 focus:ring-indigo-900
                hover:bg-indigo-500
                text-white
                brand-color-bg
                duration-500
              "
              aria-label="Колористика"
            >
              <span class="text-sm sm:text-lg font-general-medium duration-100"
                >Колористика</span
              >
            </NuxtLink>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped></style>
