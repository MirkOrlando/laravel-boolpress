<template>
    <div>
        <div class="p-5 bg-dark text-light">
            <div class="container">
                <div class="d-flex align-items-center gap-3">
                    <div class="pic">
                        <img class="rounded-circle" src="https://picsum.photos/100" alt="">
                    </div>
                    <div class="text">
                        <h1 class="display-4 m-0">About Me</h1>
                        <p class="lead m-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt,
                            quisquam.
                        </p>
                    </div>
                </div>
                <hr class="my-2">
                <p>Visit the Blog!</p>
                <p class="lead">
                    <router-link class="btn btn-primary btn-lg" :to="{ name: 'posts' }">Go to Blog</router-link>
                </p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'About',
}
</script>