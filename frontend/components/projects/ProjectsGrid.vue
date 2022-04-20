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
  <div class="pt-10 sm:pt-20 md:pt-11">
    <!-- Projects grid header -->
    <div class="text-center">
      <p
        class="
          font-general-semibold
          text-2xl
          sm:text-5xl
          font-semibold
          mb-4
          text-ternary-dark
          dark:text-ternary-light
        "
      >
        {{ projectsHeading }}
      </p>
      <!-- Note: This description is commented out, but if you want to see it, just uncomment this -->
      <p class="text-lg sm:text-xl text-gray-500 dark:text-ternary-light">
        {{ projectsDescription }}
      </p>
    </div>

    <!-- Projects grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 mt-12 sm:gap-4">
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
          bg-white
          dark:bg-ternary-dark
        "
        aria-label="`${course.title}`"
      >
        <NuxtLink :to="`/kursy/${course.slug}`">
          <div class="relative rounded-t-xl border-none" style="height: 200px; overflow: hidden; display: flex; align-items: center;">
            <img
              :src="course.thumb"
              :alt="course.title"
            />
            <div class="badge absolute" style="left: 15px; top: 15px;">
              {{ course.type }}
            </div>
          </div>
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

            <hr/>
            <p
              class="
                pt-3
                pb-2
                brand-color
              "
            >
              <span
                class="
                  text-sm
                  font-general-semibold
                "
              >Продолжительность:</span> {{ course.duration }}
            </p>

            <hr/>
            <div
              class="
                pt-4
                flex
                items-center
              "
            >
              <span
                class="
                  mr-4
                  text-sm
                  font-general-semibold
                "
              >Цена:</span>
              <div class="flex flex-wrap">
                <p class="w-full text-xs mb-0"><strike>{{ course.old_price }} ₽</strike></p>
                <p class="color-red w-full pt-0" style="line-height: 14px;">{{ course.price }} ₽</p>
              </div>
            </div>
          </div>
        </NuxtLink>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped></style>
