<template>
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                </ul>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img v-if="$page.props.user.profile_photo_path != null" alt="image" :src="$page.props.user.profile_photo_path" class="rounded-circle mr-1">
                        <img v-else alt="image" :src="$page.props.user.profile_photo_url" class="rounded-circle mr-1">
                        
                        <div class="d-sm-none d-lg-inline-block">{{ $page.props.user.name }}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <inertia-link :href="route('profile.show')" class="dropdown-item has-icon"><i class="far fa-user"></i> Hồ sơ</inertia-link>
                        <div class="dropdown-divider"></div>
                        <!-- Authentication -->
                        <inertia-link :href="route('logout')" method="post" class="dropdown-item has-icon text-danger" as="button"><i class="fas fa-sign-out-alt"></i> Đăng xuất</inertia-link>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <inertia-link v-if="!!$page.props.settings.name_brand" href="/">{{ $page.props.settings.name_brand }}</inertia-link>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <inertia-link v-if="!!$page.props.settings.name_brand" href="/">{{ $page.props.settings.name_brand.split(' ').map(x => x.charAt(0)).join('').substr(0, 2).toUpperCase() }}</inertia-link>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Dashboard</li>
                    <li class="nav-item">
                        <inertia-link class="nav-link" href="/"><i class="fas fa-fire"></i> <span>Dashboard</span></inertia-link>
                    </li>
                    <li class="menu-header">Hệ thống</li>
                    <li class="nav-item">
                        <inertia-link :href="route('settings.show')" class="nav-link"><i class="fas fa-cog"></i><span>Cài đặt</span></inertia-link>
                    </li>
                    <li class="menu-header">Sản phẩm</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fab fa-500px"></i><span>Sản phẩm</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <inertia-link :href="route('settings.show')" class="nav-link"><span>Cài đặt</span></inertia-link>
                            </li>
                            <li>
                                <inertia-link :href="route('settings.show')" class="nav-link"><span>Danh mục sản phẩm</span></inertia-link>
                            </li>
                            <li>
                                <inertia-link :href="route('settings.show')" class="nav-link"><span>Danh sách sản phẩm</span></inertia-link>
                            </li>
                            <li>
                                <inertia-link :href="route('settings.show')" class="nav-link"><span>Thuộc tính sản phẩm</span></inertia-link>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-header">Đơn hàng</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fab fa-first-order-alt"></i><span>Đơn hàng</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <inertia-link :href="route('settings.show')" class="nav-link"><span>Cài đặt</span></inertia-link>
                            </li>
                            <li>
                                <inertia-link :href="route('settings.show')" class="nav-link"><span>Danh sách đơn hàng</span></inertia-link>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-header">Tin tức</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="far fa-newspaper"></i><span>Tin tức</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <inertia-link :href="route('settings.show')" class="nav-link"><span>Cài đặt</span></inertia-link>
                            </li>
                            <li>
                                <inertia-link :href="route('settings.show')" class="nav-link"><span>Danh mục tin tức</span></inertia-link>
                            </li>
                            <li>
                                <inertia-link :href="route('settings.show')" class="nav-link"><span>Danh sách tin tức</span></inertia-link>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-header">Báo cáo</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-flag"></i><span>Báo cáo</span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <inertia-link :href="route('settings.show')" class="nav-link"><span>Cài đặt</span></inertia-link>
                            </li>
                            <li>
                                <inertia-link :href="route('settings.show')" class="nav-link"><span>Báo cáo tháng</span></inertia-link>
                            </li>
                            <li>
                                <inertia-link :href="route('settings.show')" class="nav-link"><span>Báo cáo quý</span></inertia-link>
                            </li>
                            <li>
                                <inertia-link :href="route('settings.show')" class="nav-link"><span>Báo cáo năm</span></inertia-link>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <slot name="header"></slot>
                </div>

                <div class="section-body">
                    <slot></slot>
                </div>
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2020 <div class="bullet"></div> Design By <a href="#">TVH</a>
            </div>
            <div class="footer-right">
                1.0.0
            </div>
        </footer>
        <!-- Modal Portal -->
        <portal-target name="modal" multiple ></portal-target>
    </div>
</template>

<script>
    import CptNavLink from '@/admin/Components/NavLink'
    
    export default {
        components: {
            CptNavLink,
        },

        data() {
            return {
                showingNavigationDropdown: false,
            }
        },
        beforeMount(){
            //console.log(this.$page.props.user);
        }
    }
</script>
<style scoped>
button.dropdown-item{
    padding: 10px 20px;
    font-weight: 500;
    line-height: 1.2;
    font-size: 13px;
}
.fa-product-hunt:before{
    content: "\f288";
}
</style>
