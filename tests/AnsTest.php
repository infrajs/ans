<?php
use \infrajs\ans\Ans;
require_once __DIR__ . '/../src/Ans.php';

ob_start();
class AnsTest extends PHPUnit_Framework_TestCase
{
    public function testAns()
    {
        /**
         * Ans::ans([array $ans]) - Используется для вывода данных в формате json.
         */
        $data=ob_get_contents();
        $this->assertTrue(Ans::ans('test') === '"test"');
    }
}
ob_end_clean();