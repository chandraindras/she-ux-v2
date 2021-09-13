<?php

namespace App\Services;

class SosialMediaCheck
{
 	public function isMediaTypeChecked(string $medias, string $target) : bool
    {
        $explodedMedias = explode('+', $medias);
        foreach ($explodedMedias as $media) {
            if ($media === $target) {
                return true;
            }
        }

        return false;
    }
}
