<template>
    <form @submit.prevent="$emit('submitted')">
        <div>
            <slot name="form"></slot>
        </div>
        <div class="d-flex justify-content-end" v-if="hasActions">
            <slot name="actions"></slot>
        </div>
    </form>
</template>
<script>
    export default {
        computed: {
            hasActions() {
                return !! this.$slots.actions
            }
        }
    }
</script>