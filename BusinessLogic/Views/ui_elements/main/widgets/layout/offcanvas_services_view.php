<div class="offcanvas offcanvas-top offcanvas-services" tabindex="-1" id="offcanvasServices" aria-labelledby="offcanvasServicesLabel">
    <div class="container">
        <div class="offcanvas-header">
            <a href="/" class="header-logo">
                <?php echo
                img(
                    [
                        'data-src'=>'/template/ecocentr/assets/images/logo.svg',
                        'class'=>'img-background lozad',
                        'alt'=>'logo'
                    ]
                )?>
            </a>
            <?php echo service('Content')->getView([
                'path' => 'main/widgets/layout/menu'
            ])?>
            <button type="button" class="btn-close fs-4" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
    </div>
</div>


