<?php namespace Template\BusinessLogic\Libraries;

use AvegaCms\Controllers\FrontendController;
use Modules\Albums\Models\Frontend\AlbumsModel;

class Album extends FrontendController
{
    protected object $AM;

    public function __construct()
    {
        parent::__construct();

        $this->AM = new AlbumsModel();
    }

    public function getImages(array $config): array
    {
        $images = $this->AM->getAlbum(array_merge(['limit' => 12], $config));

        $imagePath = AVEGACMS['UPLOADS'] . 'albums/';

        foreach ($images as &$image) {
            $image = array_merge(
                $image,
                [
                    'image'    => [
                        'original' => base_url(checkImage($imagePath . $image['image_src'])),
                        'thumb'    => base_url(checkImage($imagePath . "thumbs/thumb_{$image['image_src']}"))
                    ],
                    'is_video' => filter_var($image['is_video'], FILTER_VALIDATE_BOOLEAN)
                ]
            );
        }

        return $images;
    }
}