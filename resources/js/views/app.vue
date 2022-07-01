<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <router-link class="navbar-brand" :to="{ name: 'home' }">
                    BoolPress
                </router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item" v-for="(item, index) in navItems" :key="index">
                            <!-- implementare la funzione che attiva il link della pagina 
                            visualizzata @click="getItemActive(index)" 
                           :class="activeItem === index ? 'active' : ''"
                           -->
                            <router-link class="nav-link" :to="{ name: item.name }">{{ item.text }}
                            </router-link>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                    </ul>
                </div>
            </div>
        </nav>
        <router-view></router-view>
        <footer class="py-4 bg-dark text-light text-center">Copyright &copy;2022</footer>
    </div>
</template>
<script>
export default {
    name: 'App',
    data() {
        return {
            navItems: [
                {
                    name: 'home',
                    text: 'Home',
                },
                {
                    name: 'about',
                    text: 'About',
                },
                {
                    name: 'posts',
                    text: 'Posts',
                },
            ],
            /* activeItem: 0 */
        }
    },
    methods: {
        /* getItemActive(i) {
            this.activeItem = i
        } */
    },
}
</script>
