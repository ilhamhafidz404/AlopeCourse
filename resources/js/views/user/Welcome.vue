<template>
    <h1>foj</h1>
</template>

<script>
export default {
    data() {
        return {
            series: [],
        };
    },

    mounted() {
        axios.get("/api/serie").then((response) => {
            this.series = response.data.data;
        });
    },
};
</script>

<style></style>
