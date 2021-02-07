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
                        <div class="col-12 col-sm-12 col-md-8">
                            <slot name="content"></slot>
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
        }
    }
</script>
