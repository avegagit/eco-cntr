<?php namespace Template\BusinessLogic\Libraries;

use AvegaCms\Controllers\FrontendController;

class Slider extends FrontendController
{
    public function getSlider(array $settings = []): array
    {
        return (new \Modules\Slider\Models\Frontend\SliderModel)->getSlider($this->_checkSettings($settings));
    }

    private function _checkSettings(array $settings = []): array
    {
        return [
            'group'  => $settings['group'] ?? '',
            'limit'  => $settings['limit'] ?? 0,
            'langID' => $settings['langID'] ?? 0
        ];
    }
}