<template>
    <div>
        <modal name="login" :width="400" :height="400" :pivotX="0.5" :pivotY="0.5" @before-open="setCallback">
            <form @submit.prevent="login">
                <div class="card-body p-6">
                    <div class="card-title">Login to continue</div>
                    <div class="form-group">
                        <label class="form-label">Email address</label>
                        <input type="email"
                               class="form-control"
                               v-model="email"
                               :class="{ 'is-invalid': form.errors.has('email') }"
                               required
                               placeholder="Enter email" autocomplete="off">
                        <div class="invalid-feedback">{{ form.errors.get('email') }}</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password"
                               class="form-control"
                               v-model="password"
                               :class="{ 'is-invalid': form.errors.has('password') }"
                               required
                               placeholder="Password">
                        <div class="invalid-feedback">{{ form.errors.get('password') }}</div>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" v-model="remember">
                            <span class="custom-control-label">Remember me</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary btn-block" :disabled="form.isPending">
                            <i v-if="form.isPending" class="fa fa-spinner fa-spin"></i>
                            {{ signInText }}
                        </button>
                    </div>
                </div>
            </form>
        </modal>
    </div>
</template>

<script>
    import Form from 'form-object';

    export default {
        components: {
            Form
        },
        data: function () {
            return {
                email: '',
                password: '',
                remember: false,
                form: new Form,
                callback: function () {
                }
            }
        },
        computed: {
            signInText: function () {
                return this.form.isPending ? ' Signing in' : ' Sign In';
            }
        },
        methods: {
            setCallback(event) {
                this.callback = event.params ? event.params.callback : (() => {});
            },
            login() {
                this.form.post(route('login'), {
                    email: this.email,
                    password: this.password,
                    remember: this.remember,
                    _token: document.head.querySelector('meta[name="csrf-token"]').content
                }).then((response) => {
                    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = response.csrf;

                    this.$modal.hide('login');
                    this.callback();

                    this.$root.$emit('userLoggedIn', {
                        user: response.user,
                        isLoggedIn: response.isLoggedIn
                    });
                }).catch((error) => {
                    console.log(error);
                })
            }
        }
    }
</script>