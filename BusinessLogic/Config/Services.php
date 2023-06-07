<?php namespace Template\BusinessLogic\Config;

use CodeIgniter\Config\Services as CoreServices;

require_once SYSTEMPATH . 'Config/Services.php';

class Services extends CoreServices
{
    /**
     * @param bool $getShared
     * @return mixed|\Template\BusinessLogic\Libraries\BusinessLogicLib
     */
    public static function BusinessLogic($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('BusinessLogic');
        }
        return new \Template\BusinessLogic\Libraries\BusinessLogicLib();
    }

    public static function Content($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('Content');
        }
        return new \Template\BusinessLogic\Libraries\Content();
    }

    public static function Album($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('Album');
        }
        return new \Template\BusinessLogic\Libraries\Album();
    }

    public static function Slider($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('Slider');
        }
        return new \Template\BusinessLogic\Libraries\Slider();
    }
}