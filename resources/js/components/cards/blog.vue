<template>
    <router-link :to="{ name: 'read.article', params: { articleSlug: slug } }">
        <div class="card shadow-sm">
            <div
                class="blog-serie w-100"
                :style="'background-image: url(' + thumbnail + ')'"
            ></div>
            <span> </span>
            <div class="card-body pt-1">
                <small class="text-muted"> Category </small>
                <h5 class="card-title mb-4 text-dark mt-0">{{ title }}</h5>
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <img
                            src=""
                            alt="grgrg"
                            class="rounded-circle writer-img"
                        />
                        <small class="text-muted ms-2"> Admin </small>
                    </div>
                    <small class="text-muted"> {{ created_at }} </small>
                </div>
            </div>
        </div>
    </router-link>
</template>

<script>
export default {
    props: ["title", "slug", "thumbnail", "created_at"],
};
</script>

<style></style>
