<?php
App::uses('ChatworkAppModel', 'Chatwork.Model');

/**
 * ChatworkAPI '/rooms' request Model
 *
 * @author Shirone Takanashi.
 */
class Room extends ChatworkAppModel
{
	// POST /rooms
	// PUT /rooms/{room_id}
	// icon_preset 用列挙
	const ICON_GROUP		= 'group';
	const ICON_CHECK		= 'check';
	const ICON_DOCUMENT		= 'document';
	const ICON_MEETING		= 'meeting';
	const ICON_EVENT		= 'event';
	const ICON_PROJECT		= 'project';
	const ICON_BUSINESS		= 'business';
	const ICON_STUDY		= 'study';
	const ICON_SECURITY		= 'security';
	const ICON_STAR			= 'star';
	const ICON_IDEA			= 'idea';
	const ICON_HEART		= 'heart';
	const ICON_MAGCUP		= 'magcup';
	const ICON_BEER			= 'beer';
	const ICON_MUSIC		= 'music';
	const ICON_SPORTS		= 'sports';
	const ICON_TRAVEL		= 'travel';

	// DELETE /rooms/{room_id}
	// action_type 用列挙
	const ACTION_LEAVE		= 'leave';
	const ACTION_DELETE		= 'delete';

	// GET /rooms/{room_id}/tasks
	// status 用列挙.
	const STATUS_OPEN		= 'open';
	const STATUS_DONE		= 'done';

	/**
	 * GET リクエスト.
	 *
	 * @param array $parameters 各種パラメータ.
	 */
	public static function get( array $parameters=array() )
	{
		$room_id = isset($parameters['room_id']) ? ('/'.$parameters['room_id']) : '';
		$action = isset($parameters['action']) ? ('/'.$parameters['action']) : '';
		$message_id = isset($parameters['message_id']) ? ('/'.$parameters['message_id']) : '';
		$task_id = isset($parameters['task_id']) ? ('/'.$parameters['task_id']) : '';
		$file_id = isset($parameters['file_id']) ? ('/'.$parameters['file_id']) : '';
		$query_parameters = isset($parameters['query_parameters']) ? $parameters['query_parameters'] : array();

		return parent::get_request( self::ENDPOINT_ROOMS.$room_id.$action.$message_id.$task_id.$file_id, $query_parameters );
	}

	/**
	 * POST リクエスト.
	 *
	 * @param array $parameters 各種パラメータ.
	 */
	public static function post( array $parameters=array() )
	{
		$room_id = isset($parameters['room_id']) ? ('/'.$parameters['room_id']) : '';
		$action = isset($parameters['action']) ? ('/'.$parameters['action']) : '';
		$query_parameters = isset($parameters['query_parameters']) ? $parameters['query_parameters'] : array();

		return parent::post_request( self::ENDPOINT_ROOMS.$room_id.$action, $query_parameters );
	}

	/**
	 * PUT リクエスト.
	 *
	 * @param array $parameters 各種パラメータ.
	 */
	public static function put( array $parameters=array() )
	{
		$room_id = isset($parameters['room_id']) ? ('/'.$parameters['room_id']) : '';
		$action = isset($parameters['action']) ? ('/'.$parameters['action']) : '';
		$query_parameters = isset($parameters['query_parameters']) ? $parameters['query_parameters'] : array();

		return parent::put_request( self::ENDPOINT_ROOMS.$room_id.$action, $query_parameters );
	}

	/**
	 * DELETE リクエスト.
	 *
	 * @param array $parameters 各種パラメータ.
	 */
	public static function delete_request( array $parameters=array() )
	{
		$room_id = isset($parameters['room_id']) ? ('/'.$parameters['room_id']) : '';
		$query_parameters = isset($parameters['query_parameters']) ? $parameters['query_parameters'] : array();

		return parent::del_request( self::ENDPOINT_ROOMS.$room_id, $query_parameters );
	}
}
