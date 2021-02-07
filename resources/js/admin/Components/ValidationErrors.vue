<template>
    <div v-if="hasErrors" class="alert" :class="{[`alert-${type}`]: true}">
        <ul>
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: 'success'
            }
        },
        computed: {
            errors() {
                return this.$page.props.errors
            },

            hasErrors() {
                return Object.keys(this.errors).length > 0;
            },
        }
    }
</script>
