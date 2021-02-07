<template>
    <portal to="modal">
        <transition leave-active-class="duration-200">
            <div :style="{display: show?'block':'none'}" :class="{'show': show}" class="modal fade" tabindex="-1" role="dialog" @click="close">
                <div class="modal-dialog" :class="{[`modal-${maxWidthClass}`]: true, [`modal-dialog-${typeClass}`] : true}" role="document">
                    <div class="modal-content" @click.stop>
                        <slot></slot>
                    </div>
                </div>
            </div>
        </transition>
    </portal>
</template>

<script>
    export default {
        props: {
            show: {
                default: false
            },
            maxWidth: {
                default: 'md'
            },
            type: {
                default: 'medium'
            },
            closeable: {
                default: true
            }
        },

        methods: {
            close() {
                if (this.closeable) {
                    this.$emit('close');
                }
            }
        },

        watch: {
            show: {
                immediate: true,
                handler: (show) => {
                    if (show) {
                        //$('div.modal').modal('show');
                    } else {
                        //$('div.modal').modal('hide');
                    }
                }
            }
        },

        created() {
            const closeOnEscape = (e) => {
                if (e.key === 'Escape' && this.show) {
                    this.close()
                }
            }

            document.addEventListener('keydown', closeOnEscape)

            this.$once('hook:destroyed', () => {
                document.removeEventListener('keydown', closeOnEscape)
            })
        },

        computed: {
            maxWidthClass() {
                return {
                    'sm': 'sm',
                    'md': 'md',
                    'lg': 'lg',
                    'xl': 'xl',
                } [this.maxWidth]
            },
            typeClass() {
                return {
                    'medium': 'medium',
                    'centered': 'centered',
                    'scrollable': 'scrollable',
                } [this.type]
            }
        }
    }

</script>
