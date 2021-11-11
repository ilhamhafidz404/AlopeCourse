<template>
    <div>
        <section class="py-5 text-start header text-white position-relative">
            <div class="container-fluid pb-5">
                <div class="row">
                    <div class="col-lg-8">
                        <br />

                        <a
                            class="
                                py-1
                                px-3
                                mt-5
                                header-hot
                                d-flex
                                justify-content-between
                                align-items-center
                                text-white
                            "
                            href=""
                        >
                            <div>
                                <span class="badge bg-danger me-2">
                                    <i class="fas fa-fire me-1"></i> HOT
                                </span>
                                <small>
                                    Reedem untuk membuka seluruh tutorial
                                </small>
                            </div>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                        <h1 class="fw-light text-uppercase mt-3">
                            <span class="fw-bold serie-name position-relative"
                                >Blog Tutorial</span
                            >
                        </h1>
                        <small class="lead text-white mt-5">
                            Tutorial dalam bentuk Blog untuk kalian yang suka
                            membaca bisa didapatkan. Artikel tersedia dengan
                            Source Code dan Highlighting Syntax yang membuat
                            anda nyaman melihat potongan baris code di setiap
                            bahasa pemrogrammanya.
                        </small>
                    </div>
                </div>
            </div>
        </section>
        <div class="container-fluid series-content">
            <div class="card p-4 shadow position-relative">
                <div class="row mt-4">
                    <div
                        class="col-md-3 mb-4"
                        v-for="article in articles"
                        :key="article.slug"
                    >
                        <articlecard-component
                            :title="article.title"
                            :slug="article.slug"
                            :thumbnail="article.thumbnail"
                            :created_at="article.created_at"
                        ></articlecard-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            articles: [],
        };
    },

    mounted() {
        axios.get("api/article").then((response) => {
            this.articles = response.data.data;
        });
    },
};
</script>

<style></style>
