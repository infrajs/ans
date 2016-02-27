<?php
use \infrajs\ans\src\Ans;
require_once __DIR__ . '/../src/Ans.php';

class AnsTest extends PHPUnit_Framework_TestCase
{
    public function testAns()
    {
        /**
         * Ans::ans([array $ans]) - Используется для вывода данных в формате json.
         */
        ob_start();
        Ans::ans('test');
        $data=ob_get_contents();
        ob_end_clean();
        $this->assertTrue($data === '"test"');
    }
}