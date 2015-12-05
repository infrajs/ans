<?php
namespace infrajs\ans;
use infrajs\infra\Load;
Ans::$conf['isReturn'] = function () {
	return Load::isphp();
};
