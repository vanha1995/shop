<template>
    <modal :show="show" :max-width="maxWidth" :type="type" :closeable="closeable" @close="close">
        <div class="modal-header">
            <h5 class="modal-title"><slot name="title"></slot></h5>
        </div>
        <div class="modal-body">
            <slot name="content"></slot>
        </div>
        <div class="modal-footer">
            <slot name="footer"></slot>
        </div>
    </modal>
</template>

<script>
    import Modal from './Modal'
    export default {
        components: {
            Modal
        },
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
                this.$emit('close')
            },
        }
    }
</script>
