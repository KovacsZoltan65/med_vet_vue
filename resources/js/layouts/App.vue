<template>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <LeftNavbarLink />

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <NavbarSearch />

            <!-- Messages Dropdown Menu -->
            <Messages />

            <!-- Notifications Dropdown Menu -->
            <Notifications />

            <!-- Full screen -->
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>

            <!-- Controll panel -->
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
            
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <MainSidebar />

    <!-- Content Wrapper. Contains page content -->
    <router-view></router-view>
    <!-- /.content-wrapper -->

    <Footer />

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

</template>

<script>
import LeftNavbarLink from '../components/LeftNavbarLink.vue';
import Notifications from '../components/Notifications.vue';
import Messages from '../components/Messages.vue';
import MainSidebar from '../components/navigation/MainSidebar.vue';
import Footer from '../components/Footer.vue';
import NavbarSearch from '../components/NavbarSearch.vue';

export default {
    name: 'App',
    components: { 
        LeftNavbarLink,
        Notifications,
        Messages,
        MainSidebar,
        Footer,
        NavbarSearch
    }
}
</script>