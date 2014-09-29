<?php
App::uses('ChatworkAppModel', 'Chatwork.Model');

/**
 * ChatworkAPI '/my' request Model
 *
 * @author Shirone Takanashi.
 */
class My extends ChatworkAppModel
{
	/**
	 * GET リクエスト.
	 *
	 * @param array $parameters 各種パラメータ.
	 */
	public static function get( array $parameters=array() )
	{
		return parent::get_request( self::ENDPOINT_MY.$parameters['action'], $parameters );
	}
}
