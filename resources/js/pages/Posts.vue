<template>
    <div class="page">
        <bannerComponent />
        <main class="d-flex justify-content-center py-5">
            <section class="posts">
                <div class="container">
                    <div style="row-gap: 1.5rem;" class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                        <div class="col" v-for="post in posts" :key="post.id">
                            <div class="card h-100">
                                <img class="card-img-top" :src="'storage/' + post.cover_img" :alt="post.title">
                                <div class="card-body">
                                    <h4 class="card-title">{{ post.title }}</h4>
                                    <p class="card-text">
                                        {{ truncateText(post.content) }}
                                        <router-link :to="{ name: 'post', params: { slug: post.slug } }">See more
                                        </router-link>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="metadata mb-1">
                                        <div class="tags" v-if="post.tags.length > 0">
                                            <span v-for="tag in post.tags" :key="tag.id">#{{ tag.name }} </span>
                                        </div>
                                        <div class="category" v-if="post.category">
                                            <strong>Category: </strong><span>{{ post.category.name }}</span>
                                        </div>
                                    </div>
                                    <div class="author d-flex align-items-center">
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
                    <nav aria-label="Page navigation">
                        <ul class="pagination mt-3 justify-content-center">
                            <li class="page-item" :class="postResponse.current_page === 1 ? 'disabled' : ''">
                                <a class="page-link" href="#" aria-label="Previous"
                                    @click.prevent="apiPostsCall(postResponse.current_page - 1)">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                            </li>
                            <li class="page-item" :class="postResponse.current_page === page ? 'active' : ''"
                                v-for="page in postResponse.last_page">
                                <a class="page-link" href="#" @click.prevent="apiPostsCall(page)">{{ page }}</a>
                            </li>
                            <li class="page-item"
                                :class="postResponse.current_page === postResponse.last_page ? 'disabled' : ''">
                                <a class="page-link" href="#" aria-label="Next"
                                    @click.prevent="apiPostsCall(postResponse.current_page + 1)">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </section>
            <aside>
                <div class="widget bg-dark text-light mb-3 p-3 rounded">
                    <h5>Categories</h5>
                    <ul class="m-0">
                        <li v-for="category in categories" :key="category.id">
                            {{ category.name }}
                        </li>
                    </ul>
                </div>
                <div class="widget bg-dark text-light mb-3 p-3 rounded">
                    <h5>Tags</h5>
                    <ul class="m-0">
                        <li v-for="tag in tags" :key="tag.id">
                            {{ tag.name }}
                        </li>
                    </ul>
                </div>
            </aside>
        </main>
    </div>
</template>
<script>
import Axios from 'axios';
import bannerComponent from '../components/BannerComponent.vue'
export default {
    name: 'Posts',
    components: { bannerComponent },
    data() {
        return {
            posts: '',
            postResponse: '',
            categories: '',
            tags: '',
        }
    },
    methods: {
        apiPostsCall(postPage) {
            Axios.get('api/posts', {
                params: {
                    page: postPage
                }
            })
                .then((response) => {
                    console.log(response);
                    this.posts = response.data.data;
                    this.postResponse = response.data;
                }).catch((e) => {
                    console.log(e);
                })
        },
        apiCategoriesCall() {
            Axios.get('api/categories')
                .then((response) => {
                    console.log(response);
                    this.categories = response.data
                }).catch((e) => {
                    console.log(e);
                })
        },
        apiTagsCall() {
            Axios.get('api/tags')
                .then((response) => {
                    console.log(response);
                    this.tags = response.data
                }).catch((e) => {
                    console.log(e);
                })
        },
        truncateText(text) {
            if (text.length > 100) {
                return text.slice(0, 100) + '...'
            } else {
                return text
            }
        }
    },
    mounted() {
        console.log('mounted');
        this.apiPostsCall();
        this.apiCategoriesCall();
        this.apiTagsCall();
    },
}
</script>