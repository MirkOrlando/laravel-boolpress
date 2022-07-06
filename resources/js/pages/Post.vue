<template>
    <div class="page">
        <div class="wrapper" v-if="!loading">
            <div class="jumbo py-5 text-light"
                :style="{ backgroundImage: 'url(/storage/' + post.cover_img + ')', backgroundRepeat: 'no-repeat', backgroundSize: 'cover' }">
                <div class="container">
                    <h1 class="display-5">{{ post.title }}</h1>
                    <hr class="my-2">
                    <div class="metadata d-flex justify-content-between">
                        <div class="category">
                            <strong>Category: </strong>
                            <span v-if="post.category_id">{{ post.category.name }}</span>
                            <span v-else>N/A</span>
                        </div>
                        <div class="tags">
                            <strong>Tags: </strong>
                            <ul class="list-unstyled" v-if="post.tags.length > 0">
                                <li v-for="tag in post.tags" :key="tag.id">#{{ tag.name }}</li>
                            </ul>
                            <span v-else>N/A</span>
                        </div>
                        <div class="author">
                            <strong>Author: </strong>
                            <div class="result d-flex align-items-center">
                                <div
                                    class="icon p-1 d-flex justify-content-center align-items-center bg-secondary rounded-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" color="white"
                                        fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg>
                                </div>
                                <small class="name ml-1 text-primary font-weight-bold">
                                    {{ post.user.name }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            .<div class="container">
                <p>{{ post.content }}</p>
            </div>
        </div>
        <div class="wrapper" v-else>
            is loading...
        </div>
    </div>
</template>
<script>
export default {
    name: 'Post',
    data() {
        return {
            post: '',
            loading: true,
        }
    },
    methods: {
        apiCallPost() {
            axios.get('/api/posts/' + this.$route.params.slug)
                .then((response) => {
                    //console.log(response);
                    if (response.data.status_code === 404) {
                        this.$router.push({ name: 'not-found' })
                    } else {
                        this.post = response.data;
                        this.loading = false;
                    }
                }).catch((e) => {
                    console.log(e);
                })
        }
    },
    mounted() {
        this.apiCallPost();
    },
}
</script>

<style lang="scss">
.jumbo {
    background-color: #0000009e;
    background-blend-mode: overlay;
    min-height: 60vh;
}
</style>
