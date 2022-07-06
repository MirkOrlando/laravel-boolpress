<template>
    <div class="page">
        <div class="p-5 bg-dark text-light">
            <div class="container">
                <div class="d-flex align-items-center gap-3">
                    <div class="text">
                        <h1 class="display-4 m-0">Page not found</h1>
                        <p class="lead m-0">
                            Ops, the page that you're looking for was not found
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="redirect">
            <p>The page you requested was not found, try to visit these pages:</p>
            <ul>
                <li>
                    <router-link :to="{ name: 'home' }">Homepage</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'about' }">About</router-link>
                </li>
                <li>
                    <router-link :to="{ name: 'posts' }">Posts</router-link>
                </li>

            </ul>
        </div>
    </div>
</template>
<script>
export default {
    name: 'NotFound',
}
</script>