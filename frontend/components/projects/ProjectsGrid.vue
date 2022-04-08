<script>
import { mapState } from "vuex";
import feather from "feather-icons";

export default {
  data: () => {
    return {
      courses: [],
      selectedProject: "",
      searchProject: "",
    };
  },
  computed: {
    ...mapState(["projectsHeading", "projectsDescription", "projects"]),
    filteredProjects() {
      if (this.selectedProject) {
        return this.filterProjectsByCategory();
      } else if (this.searchProject) {
        return this.filterProjectsBySearch();
      }
      return this.projects;
    },
  },
  methods: {
    filterProjectsByCategory() {
      return this.projects.filter((item) => {
        let category =
          item.category.charAt(0).toUpperCase() + item.category.slice(1);
        return category.includes(this.selectedProject);
      });
    },
    filterProjectsBySearch() {
      let project = new RegExp(this.searchProject, "i");
      return this.projects.filter((el) => el.title.match(project));
    },
  },
  mounted() {
    feather.replace();
  },
  async fetch() {
    const courses = await this.$axios.$get('/courses')
    this.courses = courses.data;
  },
};
</script>

<template>
  <div class="pt-10 sm:pt-20 md:pt-18">
    <!-- Projects grid header -->
    <div class="text-center">
      <p
        class="
          font-general-semibold
          text-2xl
          sm:text-5xl
          font-semibold
          mb-2
          text-ternary-dark
          dark:text-ternary-light
        "
      >
        {{ projectsHeading }}
      </p>
      <!-- Note: This description is commented out, but if you want to see it, just uncomment this -->
      <!-- <p class="text-lg sm:text-xl text-gray-500 dark:text-ternary-light">
        {{ projectsDescription }}
      </p> -->
    </div>

    <!-- Filter and search projects -->
    <div class="mt-8 sm:mt-10">
      <h3
        class="
          font-general-regular
          text-center text-secondary-dark
          dark:text-ternary-light
          text-md
          sm:text-xl
          font-normal
          mb-4
        "
      >
        Выберите нужное Вам направление
      </h3>
    </div>

    <!-- Projects grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 mt-6 sm:gap-10">
      <div
        v-for="course in courses"
        :key="course.id"
        class="
          rounded-xl
          shadow-lg
          hover:shadow-xl
          cursor-pointer
          mb-10
          sm:mb-0
          bg-secondary-light
          dark:bg-ternary-dark
        "
        aria-label="`${course.title}`"
      >
        <NuxtLink :to="`/kursy/${course.slug}`">
          <div class="text-left px-4 py-6">
            <span
              class="
                font-general-medium
                text-lg text-ternary-dark
                dark:text-ternary-light
              "
              >{{ course.category_id.title }}
            </span>
            <p
              class="
                font-general-semibold
                text-xl text-ternary-dark
                dark:text-ternary-light
                font-semibold
                mb-2
              "
            >
              {{ course.title }}
            </p>
            <div class="badge">
              {{ course.course_type }}
            </div>
          </div>
          <div>
            <img
              :src="course.img"
              :alt="course.title"
              class="rounded-t-xl border-none"
            />
          </div>
        </NuxtLink>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped></style>
