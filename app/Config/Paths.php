<?php

namespace Config;

class Paths
{
    /**
     * SYSTEM FOLDER
     */
    public string $systemDirectory = __DIR__ . '/../../system';

    /**
     * APP FOLDER
     */
    public string $appDirectory = __DIR__ . '/..';

    /**
     * WRITABLE FOLDER
     */
    public string $writableDirectory = __DIR__ . '/../../writable';

    /**
     * TESTS FOLDER
     */
    public string $testsDirectory = __DIR__ . '/../../tests';

    /**
     * VIEWS FOLDER
     */
    public string $viewDirectory = __DIR__ . '/../Views';

    /**
     * PUBLIC FOLDER (ubah ke root ‘.’ karena file index.php ada di root)
     */
    public string $publicDirectory = '.';
}
