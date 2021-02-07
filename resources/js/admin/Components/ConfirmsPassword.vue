<template>
    <span>
        <span @click="startConfirmingPassword">
            <slot />
        </span>

        <cpt-dialog-modal :show="confirmingPassword" @close="closeModal">
            <template #title>
                {{ title }}
            </template>

            <template #content>
                {{ content }}
                
                <div class="mt-4">
                    <cpt-input type="password" :class="{'is-invalid':form.error}" placeholder="Mật khẩu" ref="password" v-model="form.password" @keyup.enter.native="confirmPassword" />
                    <cpt-input-error :message="form.error" class="mt-2" />
                </div>
            </template>

            <template #footer>
                <cpt-button type="primary" @click.native="confirmPassword" :loading="form.processing">
                    {{ button }}
                </cpt-button>
                <cpt-button type="secondary" @click.native="closeModal">
                    Thoát
                </cpt-button>
            </template>
        </cpt-dialog-modal>
    </span>
</template>

<script>
    import CptButton from './Button'
    import CptDialogModal from './DialogModal'
    import CptInput from './Input'
    import CptInputError from './InputError'

    export default {
        props: {
            title: {
                default: 'Xác nhận mật khẩu',
            },
            content: {
                default: 'Để bảo mật cho bạn, vui lòng xác nhận mật khẩu của bạn để tiếp tục.',
            },
            button: {
                default: 'Xác nhận',
            }
        },

        components: {
            CptButton,
            CptDialogModal,
            CptInput,
            CptInputError
        },

        data() {
            return {
                confirmingPassword: false,
                form: {
                    password: '',
                    error: '',
                },
            }
        },

        methods: {
            startConfirmingPassword() {
                axios.get(route('password.confirmation')).then(response => {
                    if (response.data.confirmed) {
                        this.$emit('confirmed');
                    } else {
                        this.confirmingPassword = true;

                        setTimeout(() => this.$refs.password.focus(), 250)
                    }
                })
            },

            confirmPassword() {
                this.form.processing = true;

                axios.post(route('password.confirm'), {
                    password: this.form.password,
                }).then(() => {
                    this.form.processing = false;
                    this.closeModal()
                    this.$nextTick(() => this.$emit('confirmed'));
                }).catch(error => {
                    this.form.processing = false;
                    this.form.error = error.response.data.errors.password[0];
                    this.$refs.password.focus()
                });
            },

            closeModal() {
                this.confirmingPassword = false
                this.form.password = '';
                this.form.error = '';
            },
        }
    }
</script>
