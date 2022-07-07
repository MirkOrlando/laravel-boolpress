<<template>
    <form :method="method.toUpperCase() == 'GET' ? 'GET' : 'POST'">
        <input :value="csrfToken" name="_token" hidden />
        <input v-if="['GET', 'POST'].indexOf(method.toUpperCase()) === -1" :value="method" name="_method" hidden />
        <input type="submit" class="absolute invisible z-0">
        <slot />
    </form>
</template>
<script>
export default {
    props: { method: { default: 'POST' } },
    data() {
        return {
            csrfToken: null
        }
    },
    created() {
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').content
    },
}
</script>