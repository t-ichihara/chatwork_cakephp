<?php
require_once dirname(__FILE__) . DS . 'ChatworkGroupTestCase.php';

class AllDebugKitTest extends ChatworkGroupTestCase
{
	public static function suite()
	{
		$suite = new self;
		$files = $suite->getTestFiles();
		$suite->addTestFiles($files);

		return $suite;
	}
}