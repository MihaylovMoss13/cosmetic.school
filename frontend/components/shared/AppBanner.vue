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
      relative
      lg:h-screen
    "
  >
    <div class="container mx-auto">
      <div class="w-full lg:w-1/2 text-left relative">
        <h1
          class="
            font-general-semibold
            text-3xl
            md:text-3xl
            xl:text-4xl
            text-center
            sm:text-left
            text-ternary-dark
            dark:text-primary-light
            uppercase
          "
        >
          Институт косметологии в Москве
        </h1>
        <p
          class="
            font-general-medium
            mt-5
            text-lg
            sm:text-xl
            text-center
            sm:text-left
            leading-none
            text-gray-400
          "
        >
          Предлагает своим студентам возможность получить дополнительное образование в сфере косметологии.
        </p>
        <div class="flex justify-center sm:block">
          <NuxtLink
            to="/about"
            download=""
            class="
              flex
              justify-center
              items-center
              w-36
              sm:w-60
              mt-12
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
              text-gray-500
              hover:text-white
              duration-500
            "
            aria-label="Узнать подробнее"
          >
            <span class="text-sm sm:text-lg font-general-medium duration-100"
              >Узнать подробнее</span
            >
          </NuxtLink>
        </div>
      </div>

      <div class="hidden lg:flex text-right absolute" style="right: 0; bottom: 0">
        <img src="~/static/home/main.png">
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped></style>
