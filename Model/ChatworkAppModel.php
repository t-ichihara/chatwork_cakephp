<?php
App::uses('AppModel', 'Model');

/**
 * Chatwork API 用基底クラス.
 */
class ChatworkAppModel extends AppModel {

	/**
	 * Use database config
	 *
	 * @var string
	 */
	public $useDbConfig = null;

	/**
	 * Use table
	 *
	 * @var mixed False or table name
	 */
	public $useTable = false;

	/**
	 * @var エンドポイントのベース URI.
	 */
	const ENDPOINT_BASE_URI = 'https://api.chatwork.com/v1';

	/**
	 * 自分自身の情報にアクセスする.
	 */
	const ENDPOINT_ME = '/me';

	/**
	 * 自分が持つデータへアクセスする.
	 */
	const ENDPOINT_MY = '/my';

	/**
	 * 自分がコンタクトしているユーザーの一覧へアクセスする.
	 */
	const ENDPOINT_CONTACTS = '/contacts';

	/**
	 * チャットの情報へアクセスする.
	 */
	const ENDPOINT_ROOMS = '/rooms';

	/**
	 * ChatworkAPI のトークン.
	 */
	const TOKEN = Chatwork\API_TOKEN;

	/**
	 * GET リクエスト.
	 *
	 * @param string $endpoint ENDPOINT_* クラス定数.
	 * @param array $parameters 各種パラメータ.
	 */
	public static function get_request( $endpoint, array $parameters )
	{
		$query_parameters = http_build_query( $parameters );
		$request_uri = self::ENDPOINT_BASE_URI.$endpoint.(($query_parameters!=='') ? ('?'.$query_parameters) : '');

		$cURL_instance = curl_init( $request_uri );

		$curl_options = array
		(
			CURLOPT_RETURNTRANSFER	=> true,	// true を設定すると、curl_exec()  の返り値を 文字列で返す.
			CURLOPT_FAILONERROR		=> false,	// エラー処理.
			CURLOPT_SSL_VERIFYPEER	=> false,	// false を設定すると、CURL はサーバ証明書の検証を行いません.
			CURLOPT_HEADER			=> true,	// true を設定すると、ヘッダの内容も出力します.
			CURLOPT_POST			=> false,	// true を設定すると、HTTP POST を行います.
			CURLOPT_HTTPHEADER		=> array(self::TOKEN),	// API トークン.
		);
		curl_setopt_array( $cURL_instance, $curl_options );

		$response = curl_exec( $cURL_instance );

		$response = explode("\r\n\r\n",$response); // ヘッダと内容を分割.

		$results['method'] = 'GET';
		$results['uri'] = $request_uri;
		$results['header'] = explode("\r\n",$response[0]);
		$results['body'] = json_decode($response[1]);

		return $results;
	}

	/**
	 * POST リクエスト.
	 *
	 * @param string $endpoint ENDPOINT_* クラス定数.
	 * @param array $parameters 各種パラメータ.
	 */
	public static function post_request( $endpoint, array $parameters )
	{
		$request_uri = self::ENDPOINT_BASE_URI.$endpoint;
		$cURL_instance = curl_init( $request_uri );

		$data = http_build_query( $parameters );

		$curl_options = array
		(
			CURLOPT_RETURNTRANSFER	=> true,		// true を設定すると、curl_exec()  の返り値を 文字列で返す.
			CURLOPT_FAILONERROR		=> false,		// エラー処理.
			CURLOPT_SSL_VERIFYPEER	=> false,		// false を設定すると、CURL はサーバ証明書の検証を行いません.
			CURLOPT_HEADER			=> true,		// true を設定すると、ヘッダの内容も出力します.
			CURLOPT_POST			=> true,		// true を設定すると、HTTP POST を行います.
			CURLOPT_POSTFIELDS		=> $data,		// 送信するすべてのデータ.
			CURLOPT_HTTPHEADER		=> array(self::TOKEN),	// API トークン.
		);

		curl_setopt_array( $cURL_instance, $curl_options );
		$response = curl_exec( $cURL_instance );

		$response = explode("\r\n\r\n",$response); // ヘッダと内容を分割.

		$results['method'] = 'POST';
		$results['uri'] = $request_uri;
		$results['header'] = explode("\r\n",$response[0]);
		$results['body'] = json_decode($response[1]);

		return $results;
	}

	/**
	 * PUT リクエスト.
	 *
	 * @param string $endpoint ENDPOINT_* クラス定数.
	 * @param array $parameters 各種パラメータ.
	 */
	public static function put_request( $endpoint, array $parameters )
	{
		$request_uri = self::ENDPOINT_BASE_URI.$endpoint;
		$cURL_instance = curl_init( $request_uri );

		$data = http_build_query( $parameters );

		$curl_options = array
		(
			CURLOPT_RETURNTRANSFER	=> true,		// true を設定すると、curl_exec()  の返り値を 文字列で返す.
			CURLOPT_FAILONERROR		=> false,		// エラー処理.
			CURLOPT_SSL_VERIFYPEER	=> false,		// false を設定すると、CURL はサーバ証明書の検証を行いません.
			CURLOPT_HEADER			=> true,		// true を設定すると、ヘッダの内容も出力します.
			CURLOPT_POST			=> false,		// true を設定すると、HTTP POST を行います.
			CURLOPT_POSTFIELDS		=> $data,		// 送信するすべてのデータ.
			CURLOPT_CUSTOMREQUEST	=> 'PUT',		// GET,POST 以外の Restful なリクエストのメソッド指定に用います.
			CURLOPT_HTTPHEADER		=> array(self::TOKEN),	// API トークン.
		);

		curl_setopt_array( $cURL_instance, $curl_options );
		$response = curl_exec( $cURL_instance );

		$response = explode("\r\n\r\n",$response); // ヘッダと内容を分割.

		$results['method'] = 'PUT';
		$results['uri'] = $request_uri;
		$results['header'] = explode("\r\n",$response[0]);
		$results['body'] = json_decode($response[1]);

		return $results;
	}

	/**
	 * DELETE リクエスト.
	 *
	 * @param string $endpoint ENDPOINT_* クラス定数.
	 * @param array $parameters 各種パラメータ.
	 */
	public static function delete_request( $endpoint, array $parameters )
	{
		$request_uri = self::ENDPOINT_BASE_URI.$endpoint;
		$cURL_instance = curl_init( $request_uri );

		$data = http_build_query( $parameters );

		$curl_options = array
		(
			CURLOPT_RETURNTRANSFER	=> true,		// true を設定すると、curl_exec()  の返り値を 文字列で返す.
			CURLOPT_FAILONERROR		=> false,		// エラー処理.
			CURLOPT_SSL_VERIFYPEER	=> false,		// false を設定すると、CURL はサーバ証明書の検証を行いません.
			CURLOPT_HEADER			=> true,		// true を設定すると、ヘッダの内容も出力します.
			CURLOPT_POST			=> false,		// true を設定すると、HTTP POST を行います.
			CURLOPT_POSTFIELDS		=> $data,		// 送信するすべてのデータ.
			CURLOPT_CUSTOMREQUEST	=> 'DELETE',	// GET,POST 以外の Restful なリクエストのメソッド指定に用います.
			CURLOPT_HTTPHEADER		=> array(self::TOKEN),	// API トークン.
		);

		curl_setopt_array( $cURL_instance, $curl_options );
		$response = curl_exec( $cURL_instance );

		$response = explode("\r\n\r\n",$response); // ヘッダと内容を分割.

		$results['method'] = 'DELETE';
		$results['uri'] = $request_uri;
		$results['header'] = explode("\r\n",$response[0]);
		$results['body'] = json_decode($response[1]);

		return $results;
	}
}
