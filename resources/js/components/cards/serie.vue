<template>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <router-link
            :to="{ name: 'filterby.serie', params: { serieSlug: slug } }"
        >
            <div class="card border-0 bg-transparent px-1 m-auto mb-4">
                <img
                    :src="thumbnail"
                    class="card-img-rounded"
                    width="100%"
                    height="201px"
                />
                <div class="card-body p-0 mt-1">
                    <span
                        class="badge me-1"
                        :style="'background-color:' + tag.color"
                        v-for="tag in tags"
                        :key="tag.slug"
                    >
                        {{ tag["name"] }}
                    </span>
                    <h4 class="card-title my-2 text-dark">{{ name }}</h4>
                    <div class="card-text d-flex justify-content-between">
                        <small class="text-muted">{{ created_at }}</small>
                        <small class="text-secondary">
                            Serie
                            <span
                                class="fw-bold"
                                :class="{
                                    'text-danger': status === 'stuck',
                                    'text-success': status === 'complete',
                                    'text-warning': status === 'development',
                                }"
                            >
                                {{ status }}
                            </span>
                        </small>
                    </div>
                </div>
            </div>
        </router-link>
    </div>
</template>

<script>
export default {
    props: ["name", "slug", "thumbnail", "status", "tags", "created_at"],
};
</script>

<style></style>
