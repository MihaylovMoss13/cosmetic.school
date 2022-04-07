<template>
    <p v-if="$fetchState.pending">Loading...</p>
    <p v-else-if="$fetchState.error">Error! {{ this.$route.params.course }}</p>
    <div v-else class="flex">
        <div class="w-full pl-14">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">{{ course.title }}</h1>
                <span class="block font-semibold">${{ course.price_per_day / 100 }} per day</span>
            </div>
            <p class="leading-loose mb-5">
                {{ course.description }}
            </p>
            <Button class="mt-7">Book</Button>
        </div>
    </div>
</template>

<script>
export default {
    data: () => ({
        course: {}
    }),

    async fetch() {
        const response = await this.$axios.$get('/courses/' + this.$route.params.course)

        this.course = response.data;
    },

    head() {
        return {
            title: this.course.title + ' — ergodnc',
        }
    },
}
</script>
