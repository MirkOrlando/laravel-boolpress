<template>
    <div class="page">
        <div class="p-5 bg-dark text-light">
            <div class="container">
                <h1 class="display-3">Contact Us</h1>
                <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt, quisquam.</p>
            </div>
        </div>
        <div class="container py-5">
            <vue-form action="/contact-form" method="POST">
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Mario Rossi"
                        aria-describedby="fullNameHelper">
                    <small id="fullNameHelper" class="text-muted">Type your full name</small>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="example@example.it"
                        aria-describedby="emailHelper">
                    <small id="emailHelper" class="text-muted">Type your email</small>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" name="subject" id="subject" class="form-control" placeholder="some subject"
                        aria-describedby="subjectHelper">
                    <small id="subjectHelper" class="text-muted">Type your subject</small>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" name="message" id="message" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </vue-form>
        </div>
    </div>
</template>
<script>
import VueForm from '../components/VueForm.vue'
export default {
    name: 'Contacts',
    components: { VueForm }
}
</script>