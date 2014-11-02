<?php
App::uses( 'Contact', 'Chatwork.Model' );

class ContactTest extends CakeTestCase
{
//	public $fixtures = array('plugin.chatwork.contact');

	public function setUp()
	{
		parent::setUp();
		$this->Contact = ClassRegistry::init('Chatwork.Contact');
	}

	public function testGet()
	{
		$contacts = $this->Contact->get( array() );
	}
}