<?php

namespace Support;

use Illuminate\Foundation\Application;

class DApplication extends Application
{
    /**
     * @inheritdoc
     */
    public function path($path = '')
    {
        return $this->basePath . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'App' .
            DIRECTORY_SEPARATOR . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}
