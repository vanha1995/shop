<template>
    <cpt-authentication-card widthScreen="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4" heading5="Đăng nhập">
        <template #logo>
            <cpt-authentication-card-logo width="100px" />
        </template>
        <form @submit.prevent="submit">
            <div class="form-group">
                <cpt-label for="username" value="Tên đăng nhập" />
                <cpt-input id="username" type="text" v-model="form.username" autofocus />
                <cpt-input-error :message="form.errors.username" class="mt-2" />
            </div>

            <div class="form-group">
                <div class="d-block">
                    <cpt-label for="password" value="Mật khẩu" />
                    <!--<div class="float-right">
                        <inertia-link v-if="canResetPassword" :href="route('password.request')" class="text-small">
                            Quên mật khẩu?
                        </inertia-link>
                    </div>-->
                </div>
                <cpt-input id="password" type="password" v-model="form.password" />
                <cpt-input-error :message="form.errors.password" class="mt-2" />
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <cpt-Checkbox id="remember-me" v-model="form.remember"></cpt-Checkbox>
                    <label class="custom-control-label" for="remember-me">Nhớ cho lần sau</label>
                </div>
            </div>

            <div class="form-group">
                <cpt-button :loading="form.processing" :block="true" :disabled="form.processing">Đăng nhập</cpt-button>
            </div>
        </form>
    </cpt-authentication-card>
</template>

<script>
    import CptAuthenticationCard from '@/admin/Components/AuthenticationCard'
    import CptAuthenticationCardLogo from '@/admin/Components/AuthenticationCardLogo'
    import CptButton from '@/admin/Components/Button'
    import CptInput from '@/admin/Components/Input'
    import CptCheckbox from '@/admin/Components/Checkbox'
    import CptLabel from '@/admin/Components/Label'
    import CptInputError from '@/admin/components/InputError'
    export default {
        components: {
            CptAuthenticationCard,
            CptAuthenticationCardLogo,
            CptButton,
            CptInput,
            CptCheckbox,
            CptLabel,
            CptInputError
        },
        props: {
    errors: Object,
  },
        data() {
            return {
                form: this.$inertia.form({
                    username: '',
                    password: '',
                    remember: false
                })
            }
        },
        methods: {
            submit() {
                const data = {
                    email: this.form.email,
                    password: this.form.password,
                    remember: this.form.remember,
                }
                this.$inertia.post(this.route('admin.login'), data);
            }
        }
    }
</script>