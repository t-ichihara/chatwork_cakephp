<?php
App::uses('ChatworkAppModel', 'Chatwork.Model');

/**
 * ChatworkAPI '/me' request Model
 *
 * @author Shirone Takanashi.
 */
class Me extends ChatworkAppModel
{
	/**
	 * GET リクエスト.
	 *
	 * @param array $parameters 各種パラメータ.
	 */
	public static function get( array $parameters=array() )
	{
		return parent::get_request( self::ENDPOINT_ME, $parameters );
	}
}
