<!-- Sidebar -->
<ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img style="height: 50px" src="<?= base_url() ?>/image/assets/caps_logo_white.svg" alt="">
            <!-- <i class="fab fa-apple"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3">CAS Admin 1.1</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- query menu -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id`,`menu`,`icons`
                  FROM `user_menu` JOIN `user_access_menu`
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                 WHERE `user_access_menu`.`role_id` = $role_id
              ORDER BY `user_access_menu`.`menu_id` ASC
              ";

    $menu = $this->db->query($queryMenu)->result_array();
    ?>
    <!-- looping menu -->
    <?php foreach ($menu as $m) : ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#<?= $m['menu']; ?>" aria-expanded="true" aria-controls="<?= $m['menu']; ?>">
                <i class="<?= $m['icons']; ?>"></i>
                <span><?= $m['menu']; ?></span>
            </a>
            <div id="<?= $m['menu']; ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <!-- Submenu sesuai menu yang diijinkan -->
                    <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT *
                      FROM `user_sub_menu` JOIN `user_menu`
                        ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                     WHERE `user_sub_menu`.`menu_id` = $menuId
                       AND `user_sub_menu`.`is_active` = 1
                  ";
                    $submenu = $this->db->query($querySubMenu)->result_array();
                    ?>
                    <h6 class="collapse-header">Submenu :</h6>
                    <?php foreach ($submenu as $sm) : ?>
                        <a class="collapse-item" href="<?= base_url($sm['url']) ?>"><?= $sm['tittle'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </li>
    <?php endforeach; ?>




    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->