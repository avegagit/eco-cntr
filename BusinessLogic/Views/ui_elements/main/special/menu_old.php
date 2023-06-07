<nav class="header-nav">
    <ul class="nav py-3 d-none d-lg-flex justify-content-between">
        <?php foreach (get_menu('menu', $navigationMenu) as $menu) : $hasChildren = $menu['children'] ?? false?>
            <li class="<?php echo sprintf('nav-item%s', $hasChildren ? ' dropdown' : '')?>">
                <?php echo anchor(
                    $menu['url'],
                    $menu['name'],
                    array_merge(
                        [
                            'class' => implode(' ', ['nav-link', ...($hasChildren ? ['dropdown-toggle'] : [])]),
                            'title' => $menu['name']
                        ],
                        $hasChildren
                            ? [
                            'data-bs-toggle' => 'dropdown'
                        ]
                            : []
                    )

                );?>
                <?php if ($hasChildren):?>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php foreach ($menu['children'] as $submenu):?>
                            <li>
                                <?php echo anchor(
                                    $submenu['url'],
                                    $submenu['name'],
                                    [
                                        'class' => 'dropdown-item',
                                        'title' => $submenu['name']
                                    ]
                                );?>
                            </li>
                        <?php endforeach;?>
                    </ul>
                <?php endif;?>
            </li>
        <?php endforeach;?>
    </ul>
</nav>
