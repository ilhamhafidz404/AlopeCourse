<template>
    <div class="col-sm-12 col-md-6 col-lg-4">
        <router-link
            :to="{ name: 'stream.video', params: { videoSlug: slug } }"
        >
            <div
                class="card border-0 bg-transparent position-relative m-0 mb-4"
            >
                <div
                    class="rounded video-thumb w-100"
                    :style="'background-image: url(' + thumbnail + ')'"
                ></div>
                <span
                    :class="{ 'd-none': isPremium == false }"
                    class="
                        badge
                        bg-white
                        position-absolute
                        end-0
                        m-3
                        py-2
                        px-1
                        shadow
                    "
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="CSS"
                >
                    <i class="fas fa-crown text-warning"></i>
                </span>
                <div class="card-body">
                    <h4 class="card-title my-1 text-dark">{{ title }}</h4>
                    <div class="d-flex justify-content-between">
                        <div>
                            <small href=""> #tag </small>
                        </div>
                        <div>
                            <span class="badge bg-secondary">
                                Episode {{ episode }}
                            </span>
                            <span class="badge bg-secondary">
                                {{ duration }} Menit
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </router-link>
    </div>
</template>

<script>
export default {
    props: ["title", "slug", "thumbnail", "episode", "duration", "isPremium"],
};
</script>

<style></style>
