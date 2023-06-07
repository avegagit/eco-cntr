<?php

namespace Template\BusinessLogic\Libraries;

use CodeIgniter\View\ViewDecoratorInterface;

class Snippets implements ViewDecoratorInterface
{
    public static function decorate(string $html): string
    {
        if (\Config\Services::request()->uri->getSegment(1) === 'admin') {
            return $html;
        }

        $snippets = [
            //'[[::-> button <-::]]' => '<button class="btn btn-primary mt-40 mx-auto" type="button" data-bs-toggle="modal" data-bs-target="#requestModal" title="Оставить заявку"> Оставить заявку </button>'
        ];

        return strtr($html, $snippets);
    }
}