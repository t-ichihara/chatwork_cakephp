<?php
App::uses('ChatworkAppModel', 'Chatwork.Model');

/**
 * ChatworkAPI '/contacts' request Model
 *
 * @author Shirone Takanashi.
 */
class Contact extends ChatworkAppModel
{
	/**
	 * GET リクエスト.
	 *
	 * @param array $parameters 各種パラメータ.
	 */
	public static function get( array $parameters=array() )
	{
		return parent::get_request( self::ENDPOINT_CONTACTS, $parameters );
	}
}
