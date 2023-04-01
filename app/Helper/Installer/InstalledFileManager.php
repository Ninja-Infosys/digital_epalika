<?php

namespace App\Helper\Installer;


class InstalledFileManager
{

    public function create(): void
    {
        file_put_contents(storage_path('installed'), '');
    }


    public function update(): void
    {
        $this->create();
    }
}
