<nav class="header-nav mx-auto" id="header-nav">
    <ul class="nav py-3 d-none d-lg-flex justify-content-between">
        <?php foreach (service('Content')->getMenu('menu')['list'] ?? [] as $menu) : $hasChildren = $menu['list'] ?? false?>
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
                <?php if ($hasChildren): ?>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" data-bs-popper="static">
                        <?php foreach ($menu['list'] as $submenu):?>
                            <li class="position-relative">
                                <a href="<?php echo $submenu['url']?>" class="dropdown-item"><span><?php echo $submenu['name']?><!--</span><span class="triangle-right"></span>--></a>
                                <?php if ($submenu['list'] ?? false): ?>
                                    <ul class="submenu">
                                        <?php foreach ($submenu['list'] as $subsubmenu):?>
                                            <li>
                                                <?php echo anchor(
                                                    $subsubmenu['url'],
                                                    $subsubmenu['name'],
                                                    [
                                                        'title' => $subsubmenu['name'],
                                                        'class' => 'dropdown-item'
                                                    ]
                                                );?>
                                                <?php if ($subsubmenu['list'] ?? false): ?>
                                                    <ul class="submenu subsubmenu">
                                                        <?php foreach ($subsubmenu['list'] as $subsubsubmenu):?>
                                                            <li>
                                                                <?php echo anchor(
                                                                    $subsubsubmenu['url'],
                                                                    $subsubsubmenu['name'],
                                                                    [
                                                                        'title' => $subsubsubmenu['name'],
                                                                        'class' => 'dropdown-item'
                                                                    ]
                                                                );?>
                                                            </li>
                                                        <?php endforeach;?>
                                                    </ul>
                                                <?php endif;?>
                                            </li>
                                        <?php endforeach;?>
                                    </ul>
                                <?php endif;?>
                            </li>
                        <?php endforeach;?>
                    </ul>
                <?php endif;?>
            </li>
        <?php endforeach;?>
    </ul>
</nav>
