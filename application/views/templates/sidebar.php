<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>">
        <div class="sidebar-brand-icon rotate-n-14">
            <!--<i class="fas fa-smoking-ban"></i>-->
            <i><img src="<?php echo base_url(); ?>assets/img/profile/eka.png" height="50"/></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADIT <sup>EB</sup></div>
    </a>
 
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Query menu -->
    <?php
    $role_id = $this->session->userdata('role_id');

    $queryMenu = "  SELECT user_menu.id,menu
                            FROM user_menu JOIN user_access_menu
                            ON user_menu.id = user_access_menu.menu_id
                            WHERE user_access_menu.role_id = $role_id
                            ORDER BY user_access_menu.menu_id ASC
                            ";

    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- Looping menu -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu'] ?>
        </div>

        <!-- Looping sub-menu -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "  SELECT *
                                FROM user_sub_menu
                                WHERE menu_id = $menuId
                                AND is_active = 1
                                ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= ($sm['icon']); ?>"></i>
                    <span><?= ($sm['title']); ?></span></a>
                </li>

            <?php endforeach; ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

        <?php endforeach; ?>


        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->
