<template>
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div :class="widthScreen">
                    <div class="login-brand">
                        <slot name="logo" />
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>{{ heading5 }}</h4>
                        </div>
                        <div class="card-body">
                            <slot />
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; TVH 2020
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    props: {
        widthScreen: {
            type: String,
            default: 'col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4'
        },
        heading5: {
            type: String,
            default: null
        }
    }
}
</script>
