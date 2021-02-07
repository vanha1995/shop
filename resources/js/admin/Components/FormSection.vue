<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <cpt-section-title>
                            <template #title><slot name="title"></slot></template>
                            <template #description><slot name="description"></slot></template>
                        </cpt-section-title>

                        <div class="col">
                            <form @submit.prevent="$emit('submitted')">
                                <div>
                                    <slot name="form"></slot>
                                </div>
                                <div class="d-flex justify-content-end" v-if="hasActions">
                                    <slot name="actions"></slot>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CptSectionTitle from './SectionTitle'

    export default {
        components: {
            CptSectionTitle,
        },
        computed: {
            hasActions() {
                return !! this.$slots.actions
            }
        }
    }
</script>
