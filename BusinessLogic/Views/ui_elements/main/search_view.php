<div class="container">
    <?php echo form_open('', ['method' => 'GET', 'class' => 'input-group my-3']) .
    form_input(
        [
            'name'        => 's',
            'class'       => 'form-control',
            'value'       => service('request')->getGet('s'),
            'placeholder' => 'Поиск..'
        ]
    ) .
    form_button(
        [
            'type'    => 'submit',
            'class'   => 'btn btn-primary',
            'content' => 'Поиск'
        ]
    ) .
    form_close()?>
    <?php if ($searchResult['pages']):?>
        <div class="mb-3">
            <h2>
                Страницы:
            </h2>
            <ul>
                <?php foreach ($searchResult['pages'] as $page):?>
                    <li>
                        <?php echo anchor(
                            $page['url'],
                            $page['title']
                        )?>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
    <?php if ($searchResult['posts']):?>
        <div class="mb-3">
            <h2>
                Записи:
            </h2>
            <ul>
                <?php foreach ($searchResult['posts'] as $page):?>
                    <li>
                        <?php echo anchor(
                            $page['url'],
                            $page['title']
                        )?>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    <?php endif;?>
</div>