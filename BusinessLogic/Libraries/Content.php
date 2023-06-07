<?php namespace Template\BusinessLogic\Libraries;

use AvegaCms\Controllers\FrontendController;
use AvegaCms\Models\Frontend\AvegaCmsContentModel;

class Content extends FrontendController
{
    protected object $CPM;

    protected string $imagePath = AVEGACMS['UPLOADS'] . 'content/';

    public function __construct()
    {
        parent::__construct();

        $this->CPM = new AvegaCmsContentModel();
    }

    public function getPosts(array $settings): array
    {
        $settings = $this->_getContentSettings($settings);

        $this->cmsFilter['limit'] = $settings['limit'] ?? service('request')->getGet('limit');

        $data = $this->CPM->getPosts($settings['locationID'], '', $this->cmsFilter['limit'], $settings['filter'] ?? []);

        if (!$data['list']) {
            $data['list'] = [];
        }

        $data['pagination'] = [
            'page' => (int)($this->cmsFilter['page'] ?? 1),
            'perPage' => (int)$this->cmsFilter['limit'],
            'total' => (int)$data['num']
        ];

        return $data;
    }

    public function getPages(array $settings): array
    {
        $settings = $this->_getContentSettings($settings);

        $this->cmsFilter['limit'] = $settings['limit'] ?? service('request')->getGet('limit');

        return $this->CPM->getSubPages($settings['locationID'], $settings['extensionID'], $settings['slug']);
    }

    public function getView(array $settings): string
    {
        return $this->viewRender($settings['path'] ?? '', $settings);
    }

    public function getServices(): array
    {
        return $services = $this->getPages(['slug' => 'services']);
    }

    protected function _getContentSettings(array $settings = []): array
    {
        return [
            'slug'        => $settings['slug'] ?? '',
            'limit'       => (int) ($settings['limit'] ?? service('request')->getGet('limit') ?? 8),
            'view'        => $settings['view'] ?? 'posts_item',
            'locationID'  => $settings['locationID'] ?? $this->CPM->getLocationID($settings['slug'] ?? ''),
            'extensionID' => service('avegacmsconfig')->getConfig('core.extensions.pages'),
            'filter'      => $settings['filter'] ?? []
        ];
    }
}