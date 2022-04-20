<script>
import feather from "feather-icons";

export default {
  scrollToTop: true,
  data: () => {
    return {
      contacts: [
        {
          id: 1,
          name: "г. Москва",
          icon: "map-pin",
        },
        {
          id: 2,
          name: "info@cosmetic.school",
          icon: "mail",
        },
        {
          id: 3,
          name: "",
          icon: "phone",
        },
      ],
    };
  },
  head() {
    return {
      title: 'Контакты'
    }
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
  <div
    class="container mx-auto"
  >
    <div class="w-full flex flex-col-reverse md:flex-row">
      <ContactDetails :contacts="contacts" />

      <ContactForm />
    </div>
  </div>
</template>
