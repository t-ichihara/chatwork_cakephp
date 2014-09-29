<?php
/**
 * Chatwork API 用シェルの実装.
 *
 * @author Shirone Takanashi.
 */
class ChatworkShell extends AppShell
{
	/**
	 * getOptionParser() の override.
	 */
	public function getOptionParser()
	{
		$parser = parent::getOptionParser();
		$dtype='chatwork_console';

		$parser->description
		(
			__d($dtype, 'A console tool for Chatwork API')
		)->addSubcommand
		(
			'fetchMe',
			array
			(
				'help' => __d($dtype, '自分自身の情報を取得する.'),
				'parser' => array
				(
					'description' => __d($dtype, 'この機能に引数はありません。'),
					'arguments' => array
					(
					),
				),
			)
		)->addSubcommand
		(
			'fetchMyStatus',
			array
			(
				'help' => __d($dtype, '自分の未読数、未読To数、未完了タスク数を返す.'),
				'parser' => array
				(
					'description' => __d($dtype, 'この機能に引数はありません。'),
					'arguments' => array
					(
					),
				),
			)
		)->addSubcommand
		(
			'fetchMyTasks',
			array
			(
				'help' => __d($dtype, '自分のタスク一覧を取得する.'),
				'parser' => array
				(
					'description' => __d($dtype, 'API がページネーションに対応していないため、100 件までしか取得できません。'),
					'arguments' => array
					(
						'assigned_by account_id' => array
						(
							'help' => __d($dtype, 'タスクの依頼者のアカウントID.'),
						),
						'status' => array
						(
							'choices' => array
							(
								'open',
								'done',
							),
							'help' => __d($dtype, 'タスクのステータス.'),
						),
					),
				),
			)
		)->addSubcommand
		(
			'fetchContacts',
			array
			(
				'help' => __d($dtype, '自分のコンタクト一覧を取得.'),
				'parser' => array
				(
					'description' => __d($dtype, 'この機能に引数はありません。'),
					'arguments' => array
					(
					),
				),
			)
		)->addSubcommand
		(
			'fetchRooms',
			array
			(
				'help' => __d($dtype, '自分のチャット一覧の取得.'),
				'parser' => array
				(
					'description' => __d($dtype, 'この機能に引数はありません。'),
					'arguments' => array
					(
					),
				),
			)
		)->addSubcommand
		(
			'fetchRoom',
			array
			(
				'help' => __d($dtype, 'チャットの名前、アイコン、種類(my/direct/group)を取得.'),
				'parser' => array
				(
					'description' => __d($dtype, ''),
					'arguments' => array
					(
						'room_id' => array
						(
							'help' => __d($dtype, 'チャットルーム ID.'),
						),
					),
				),
			)
		)->addSubcommand
		(
			'fetchRoomMembers',
			array
			(
				'help' => __d($dtype, 'チャットのメンバー一覧を取得.'),
				'parser' => array
				(
					'description' => __d($dtype, ''),
					'arguments' => array
					(
						'room_id' => array
						(
							'help' => __d($dtype, 'チャットルーム ID.'),
						),
					),
				),
			)
		)->addSubcommand
		(
			'fetchRoomMessages',
			array
			(
				'help' => __d($dtype, 'チャットのメッセージ一覧を取得.'),
				'parser' => array
				(
					'description' => __d($dtype, 'API がページネーションに対応していないため、100 件までしか取得できません。※このAPIは未実装です！まだ利用することはできません。'),
					'arguments' => array
					(
						'room_id' => array
						(
							'help' => __d($dtype, 'チャットルーム ID.'),
						),
					),
				),
			)
		)->addSubcommand
		(
			'fetchRoomMessage',
			array
			(
				'help' => __d($dtype, 'メッセージ情報を取得.'),
				'parser' => array
				(
					'description' => __d($dtype, ''),
					'arguments' => array
					(
						'room_id' => array
						(
							'help' => __d($dtype, 'チャットルーム ID.'),
						),
						'message_id' => array
						(
							'help' => __d($dtype, 'メッセージ ID.'),
						),
					),
				),
			)
		)->addSubcommand
		(
			'fetchRoomTasks',
			array
			(
				'help' => __d($dtype, 'チャットのタスク一覧を取得.'),
				'parser' => array
				(
					'description' => __d($dtype, 'API がページネーションに対応していないため、100 件までしか取得できません。'),
					'arguments' => array
					(
						'room_id' => array
						(
							'help' => __d($dtype, 'チャットルーム ID.'),
							'required' => true,
						),
						'account_id' => array
						(
							'help' => __d($dtype, 'タスクの担当者のアカウントID.'),
							'required' => true,
						),
						'assigned_by account_id' => array
						(
							'help' => __d($dtype, 'タスクの依頼者のアカウントID.'),
						),
						'status' => array
						(
							'choices' => array
							(
								'open',
								'done',
							),
							'help' => __d($dtype, 'タスクのステータス.'),
						),
					),
				),
			)
		)->addSubcommand
		(
			'fetchRoomTask',
			array
			(
				'help' => __d($dtype, 'タスク情報を取得.'),
				'parser' => array
				(
					'description' => __d($dtype, ''),
					'arguments' => array
					(
						'room_id' => array
						(
							'help' => __d($dtype, 'チャットルーム ID.'),
							'required' => true,
						),
						'task_id' => array
						(
							'help' => __d($dtype, 'タスク ID.'),
							'required' => true,
						),
					),
				),
			)
		)->addSubcommand
		(
			'fetchRoomFiles',
			array
			(
				'help' => __d($dtype, 'チャットのファイル一覧を取得.'),
				'parser' => array
				(
					'description' => __d($dtype, 'API がページネーションに対応していないため、100 件までしか取得できません。'),
					'arguments' => array
					(
						'room_id' => array
						(
							'help' => __d($dtype, 'チャットルーム ID.'),
							'required' => true,
						),
						'account_id' => array
						(
							'help' => __d($dtype, 'アップロードしたユーザーのアカウントID.'),
							'required' => true,
						),
					),
				),
			)
		)->addSubcommand
		(
			'fetchRoomFile',
			array
			(
				'help' => __d($dtype, 'ファイル情報を取得.'),
				'parser' => array
				(
					'description' => __d($dtype, ''),
					'arguments' => array
					(
						'room_id' => array
						(
							'help' => __d($dtype, 'チャットルーム ID.'),
							'required' => true,
						),
						'file_id' => array
						(
							'help' => __d($dtype, 'ファイルの ID.'),
							'required' => true,
						),
						'create_download_url' => array
						(
							'help' => __d($dtype, 'ダウンロードする為のURLを生成するか 30 秒間だけダウンロード可能なURLを生成します.'),
							'choices' => array
							(
								0,
								1,
							),
						),
					),
				),
			)
		)->addSubcommand
		(
			'createRoom',
			array
			(
				'help' => __d($dtype, 'ファイル情報を取得.'),
				'parser' => array
				(
					'description' => __d($dtype, ''),
					'arguments' => array
					(
						'name' => array
						(
							'required' => true,
							'help' => __d($dtype, '作成したいグループチャットのチャット名.'),
						),
						'members_admin_ids' => array
						(
							'required' => true,
							'help' => __d($dtype, '管理者権限のユーザー.'.PHP_EOL.
								'作成したチャットに参加メンバーのうち、管理者権限にしたいユーザーのアカウントIDの配列.'.PHP_EOL.
								'最低1人は指定する必要がある.'.PHP_EOL.
								'※リストはカンマ区切りで複数の値を指定してください.'),
						),
						'members_member_ids' => array
						(
							'help' => __d($dtype, 'メンバー権限のユーザー.'.PHP_EOL.
								'作成したチャットに参加メンバーのうち、メンバー権限にしたいユーザーのアカウントIDの配列.'.PHP_EOL.
								'※リストはカンマ区切りで複数の値を指定してください.'),
						),
						'members_readonly_ids' => array
						(
							'help' => __d($dtype, '閲覧のみ権限のユーザー.'.PHP_EOL.
								'作成したチャットに参加メンバーのうち、閲覧のみ権限にしたいユーザーのアカウントIDの配列.'.PHP_EOL.
								'※リストはカンマ区切りで複数の値を指定してください.'),
						),
						'description' => array
						(
							'help' => __d($dtype, 'グループチャットの概要説明テキスト.'),
						),
						'icon_preset' => array
						(
							'help' => __d($dtype, 'グループチャットのアイコン種類.'),
							'choices' => array
							(
								'group',
								'check',
								'document',
								'meeting',
								'event',
								'project',
								'business',
								'study',
								'security',
								'star',
								'idea',
								'heart',
								'magcup',
								'beer',
								'music',
								'sports',
								'travel',
							),
						),
					),
				),
			)
		)->addSubcommand
		(
			'postRoomMessage',
			array
			(
				'help' => __d($dtype, 'チャットに新しいメッセージを追加.'),
				'parser' => array
				(
					'description' => __d($dtype, ''),
					'arguments' => array
					(
						'room_id' => array
						(
							'help' => __d($dtype, 'チャットルーム ID.'),
							'required' => true,
						),
						'body' => array
						(
							'required' => true,
							'help' => __d($dtype, 'メッセージ本文.'),
						),
					),
				),
			)
		)->addSubcommand
		(
			'postRoomTask',
			array
			(
				'help' => __d($dtype, 'チャットに新しいタスクを追加.'),
				'parser' => array
				(
					'description' => __d($dtype, ''),
					'arguments' => array
					(
						'room_id' => array
						(
							'help' => __d($dtype, 'チャットルーム ID.'),
							'required' => true,
						),
						'body' => array
						(
							'required' => true,
							'help' => __d($dtype, 'タスクの内容.'),
						),
						'to_ids' => array
						(
							'required' => true,
							'help' => __d($dtype, '担当者のアカウントIDをカンマ区切りで.'.PHP_EOL.
								'※リストはカンマ区切りで複数の値を指定してください.'),
						),
						'limit' => array
						(
							'help' => __d($dtype, 'タスクの期限. Unix Time で入力してください.'),
						),
					),
				),
			)
		)->addSubcommand
		(
			'editRoom',
			array
			(
				'help' => __d($dtype, 'チャットの名前、アイコンをアップデート.'),
				'parser' => array
				(
					'description' => __d($dtype, ''),
					'arguments' => array
					(
						'room_id' => array
						(
							'help' => __d($dtype, 'チャットルーム ID.'),
							'required' => true,
						),
						'name' => array
						(
							'help' => __d($dtype, 'グループチャットのチャット名.'),
						),
						'description' => array
						(
							'help' => __d($dtype, 'グループチャットの概要説明テキスト'),
						),
						'icon_preset' => array
						(
							'help' => __d($dtype, 'グループチャットのアイコン種類.'),
							'choices' => array
							(
								'group',
								'check',
								'document',
								'meeting',
								'event',
								'project',
								'business',
								'study',
								'security',
								'star',
								'idea',
								'heart',
								'magcup',
								'beer',
								'music',
								'sports',
								'travel',
							),
						),
					),
				),
			)
		)->addSubcommand
		(
			'editRoomMembers',
			array
			(
				'help' => __d($dtype, 'チャットのメンバーを一括変更.'),
				'parser' => array
				(
					'description' => __d($dtype, ''),
					'arguments' => array
					(
						'room_id' => array
						(
							'required' => true,
							'help' => __d($dtype, 'チャットルーム ID.'),
						),
						'members_admin_ids' => array
						(
							'required' => true,
							'help' => __d($dtype, '管理者権限のユーザー.'.PHP_EOL.
								'作成したチャットに参加メンバーのうち、管理者権限にしたいユーザーのアカウントIDの配列.'.PHP_EOL.
								'最低1人は指定する必要がある.'.PHP_EOL.
								'※リストはカンマ区切りで複数の値を指定してください.'),
						),
						'members_member_ids' => array
						(
							'help' => __d($dtype, 'メンバー権限のユーザー.'.PHP_EOL.
								'作成したチャットに参加メンバーのうち、メンバー権限にしたいユーザーのアカウントIDの配列.'.PHP_EOL.
								'※リストはカンマ区切りで複数の値を指定してください.'),
						),
						'members_readonly_ids' => array
						(
							'help' => __d($dtype, '閲覧のみ権限のユーザー.'.PHP_EOL.
								'作成したチャットに参加メンバーのうち、閲覧のみ権限にしたいユーザーのアカウントIDの配列.'.PHP_EOL.
								'※リストはカンマ区切りで複数の値を指定してください.'),
						),
					),
				),
			)
		)->addSubcommand
		(
			'deleteRoom',
			array
			(
				'help' => __d($dtype, 'グループチャットを退席/削除する.'),
				'parser' => array
				(
					'description' => __d($dtype, ''),
					'arguments' => array
					(
						'room_id' => array
						(
							'required' => true,
							'help' => __d($dtype, 'チャットルーム ID.'),
						),
						'action_type' => array
						(
							'required' => true,
							'help' => __d($dtype, '退席するか、削除するか.'.PHP_EOL.
								'退席すると、このグループチャットにある自分が担当のタスク、および自分が送信したファイルは削除されます.'.PHP_EOL.
								'削除すると、このグループチャットに参加しているメンバー全員のメッセージ、タスク、ファイルはすべて削除されます.'.PHP_EOL.
								'※一度削除すると元に戻せません！'),
							'choices' => array
							(
								'leave',
								'delete',
							),
						),
					),
				),
			)
		);

		return $parser;
	}

/**
 * Override main() for help message hook
 *
 * @return void
 */
	public function main()
	{
		$this->out( $this->OptionParser->help() );
	}

	/**
	 * GET /me
	 * 自分自身の情報を取得.
	 *
	 * 引数：なし
	 */
	public function fetchMe()
	{
		$this->loadModel('Chatwork.Me');
		$results = Me::get();

		$this->out( print_r($results,true) );
	}

	/**
	 * GET /my/status
	 * 自分の未読数、未読To数、未完了タスク数を返す.
	 *
	 * 引数：なし
	 */
	public function fetchMyStatus()
	{
		$this->loadModel('Chatwork.My');
		$results = My::get( array('action'=>'/status') );

		$this->out( print_r($results,true) );
	}

	/**
	 * GET /my/tasks
	 * 自分のタスク一覧を取得する.
	 * @TODO ページネーション未対応.
	 *
	 * 引数0：assigned_by_account_id タスクの依頼者のアカウントID.
	 * 引数1：status タスクのステータス. (open, done)
	 */
	public function fetchMyTasks()
	{
		$query_parameters = array
		(
			'assigned_by_account_id'	=> isset($this->args[0]) ? $this->args[0] : null,	// 任意.
			'status'					=> isset($this->args[1]) ? $this->args[1] : null,	// 任意.
		);
		$query_parameters = self::filteringParameters( $query_parameters );

		$this->loadModel('Chatwork.My');
		$results = My::get( array('action'=>'/tasks','query_parameters'=>$query_parameters) );

		$this->out( print_r($results,true) );
	}

	/**
	 * GET /contacts
	 * 自分のコンタクト一覧を取得.
	 *
	 * 引数：なし
	 */
	public function fetchContacts()
	{
		$this->loadModel('Chatwork.Contact');
		$results = Contact::get( array() );

		$this->out( print_r($results,true) );
	}

	/**
	 * GET /rooms
	 * 自分のチャット一覧の取得.
	 *
	 * 引数：なし
	 */
	public function fetchRooms()
	{
		$this->loadModel('Chatwork.Room');
		$results = Room::get( array() );

		$this->out( print_r($results,true) );
	}

	/**
	 * GET /rooms/{room_id}
	 * チャットの名前、アイコン、種類(my/direct/group)を取得.
	 *
	 * 引数0：room_id
	 */
	public function fetchRoom()
	{
		$this->loadModel('Chatwork.Room');
		$results = Room::get( array('room_id'=>$this->args[0]) );

		$this->out( print_r($results,true) );
	}

	/**
	 * GET /rooms/{room_id}/members
	 * チャットのメンバー一覧を取得
	 *
	 * 引数0：room_id
	 */
	public function fetchRoomMembers()
	{
		$this->loadModel('Chatwork.Room');
		$results = Room::get( array('room_id'=>$this->args[0],'action'=>'members') );

		$this->out( print_r($results,true) );
	}

	/**
	 * GET /rooms/{room_id}/messages
	 * チャットのメッセージ一覧を取得.
	 * @TODO ページネーション未対応.
	 * @TODO Chatwork 側が機能未実装らしい.
	 *
	 * 引数0：room_id
	 */
	public function fetchRoomMessages()
	{
		$this->loadModel('Chatwork.Room');
		$results = Room::get( array('room_id'=>$this->args[0],'action'=>'messages') );

		$this->out( print_r($results,true) );
	}

	/**
	 * GET /rooms/{room_id}/messages/{message_id}
	 * メッセージ情報を取得.
	 *
	 * 引数0：room_id
	 * 引数1：message_id
	 */
	public function fetchRoomMessage()
	{
		$this->loadModel('Chatwork.Room');
		$results = Room::get( array('room_id'=>$this->args[0],'action'=>'messages','message_id'=>$this->args[1]) );

		$this->out( print_r($results,true) );
	}

	/**
	 * GET /rooms/{room_id}/tasks
	 * チャットのタスク一覧を取得.
	 * @TODO ページネーション未対応.
	 *
	 * 引数0：room_id
	 * 引数1：account_id タスクの担当者のアカウントID.
	 * 引数2：assigned_by_account_id タスクの依頼者のアカウントID.
	 * 引数3：status タスクのステータス. (open, done)
	 */
	public function fetchRoomTasks()
	{
		$query_parameters = array
		(
			'account_id'				=> isset($this->args[1]) ? $this->args[1] : null,	// 任意.
			'assigned_by_account_id'	=> isset($this->args[2]) ? $this->args[2] : null,	// 任意.
			'status'					=> isset($this->args[3]) ? $this->args[3] : null,	// 任意.
		);
		$query_parameters = self::filteringParameters( $query_parameters );

		$this->loadModel('Chatwork.Room');
		$results = Room::get( array('room_id'=>$this->args[0],'action'=>'tasks','query_parameters'=>$query_parameters) );

		$this->out( print_r($results,true) );
	}

	/**
	 * GET /rooms/{room_id}/tasks/{task_id}
	 * タスク情報を取得.
	 *
	 * 引数0：room_id
	 * 引数1：task_id
	 */
	public function fetchRoomTask()
	{
		$this->loadModel('Chatwork.Room');
		$results = Room::get( array('room_id'=>$this->args[0],'action'=>'tasks','task_id'=>$this->args[1]) );

		$this->out( print_r($results,true) );
	}

	/**
	 * GET /rooms/{room_id}/files
	 * チャットのファイル一覧を取得.
	 * @TODO ページネーション未対応.
	 *
	 * 引数0：room_id
	 * 引数1：account_id アップロードしたユーザーのアカウントID.
	 */
	public function fetchRoomFiles()
	{
		$query_parameters = array
		(
			'account_id' => isset($this->args[1]) ? $this->args[1] : null,	// 任意.
		);
		$query_parameters = self::filteringParameters( $query_parameters );

		$this->loadModel('Chatwork.Room');
		$results = Room::get( array('room_id'=>$this->args[0],'action'=>'files','query_parameters'=>$query_parameters) );

		$this->out( print_r($results,true) );
	}

	/**
	 * GET /rooms/{room_id}/files/{file_id}
	 * ファイル情報を取得.
	 *
	 * 引数0：room_id
	 * 引数1：file_id
	 * 引数2：create_download_url ダウンロードする為のURLを生成するか 30 秒間だけダウンロード可能なURLを生成します.
	 */
	public function fetchRoomFile()
	{
		$query_parameters = array
		(
			'create_download_url' => isset($this->args[2]) ? $this->args[2] : null,	// 任意.
		);
		$query_parameters = self::filteringParameters( $query_parameters );

		$this->loadModel('Chatwork.Room');
		$results = Room::get( array('room_id'=>$this->args[0],'action'=>'files','file_id'=>$this->args[1],'query_parameters'=>$query_parameters) );

		$this->out( print_r($results,true) );
	}

	/**
	 * POST /rooms
	 * グループチャットを新規作成.
	 *
	 * 引数0：name 作成したいグループチャットのチャット名.
	 * 引数1：members_admin_ids 管理者権限のユーザー.<br />
	 *                          作成したチャットに参加メンバーのうち、管理者権限にしたいユーザーのアカウントIDの配列.
	 *                          最低1人は指定する必要がある.
	 *                          ※リストはカンマ区切りで複数の値を指定してください.
	 * 引数2：members_member_ids メンバー権限のユーザー.<br />
	 *                           作成したチャットに参加メンバーのうち、メンバー権限にしたいユーザーのアカウントIDの配列.<br />
	 *                          ※リストはカンマ区切りで複数の値を指定してください.
	 * 引数3：members_readonly_ids 閲覧のみ権限のユーザー.<br />
	 *                             作成したチャットに参加メンバーのうち、閲覧のみ権限にしたいユーザーのアカウントIDの配列.<br />
	 *                             ※リストはカンマ区切りで複数の値を指定してください.
	 * 引数4：description グループチャットの概要説明テキスト.
	 * 引数5：icon_preset グループチャットのアイコン種類. (group, check, document, meeting, event, project, business, study, security, star, idea, heart, magcup, beer, music, sports, travel)
	 */
	public function createRoom()
	{
		$query_parameters = array
		(
			'name'					=> isset($this->args[0]) ? $this->args[0] : null,	// 必須.
			'members_admin_ids'		=> isset($this->args[1]) ? $this->args[1] : null,	// 必須.
			'members_member_ids'	=> (isset($this->args[2])&&(!empty($this->args[2]))) ? $this->args[2] : null,	// 任意.
			'members_readonly_ids'	=> (isset($this->args[3])&&(!empty($this->args[3]))) ? $this->args[3] : null,	// 任意.
			'description'			=> (isset($this->args[4])&&(!empty($this->args[4]))) ? $this->args[4] : null,	// 任意.
			'icon_preset'			=> (isset($this->args[5])&&(!empty($this->args[5]))) ? $this->args[5] : null,	// 任意.
		);
		$query_parameters = self::filteringParameters( $query_parameters );

		$this->loadModel('Chatwork.Room');
		$results = Room::post( array('query_parameters'=>$query_parameters) );

		$this->out( print_r($results,true) );
	}

	/**
	 * POST /rooms/{room_id}/messages
	 * チャットに新しいメッセージを追加.
	 *
	 * 引数0：room_id
	 * 引数1：body メッセージ本文.
	 */
	public function postRoomMessage()
	{
		$query_parameters = array
		(
			'body' => isset($this->args[1]) ? $this->args[1] : null,	// 必須.
		);
		$query_parameters = self::filteringParameters( $query_parameters );

		$this->loadModel('Chatwork.Room');
		$results = Room::post( array('room_id'=>$this->args[0],'action'=>'messages','query_parameters'=>$query_parameters) );

		$this->out( print_r($results,true) );
	}

	/**
	 * POST /rooms/{room_id}/tasks
	 * チャットに新しいタスクを追加.
	 *
	 * 引数0：room_id
	 * 引数1：body タスクの内容.
	 * 引数2：to_ids 担当者のアカウントIDをカンマ区切りで. <br />
	 *               ※リストはカンマ区切りで複数の値を指定してください.
	 * 引数3：limit タスクの期限. Unix Time で入力してください.
	 */
	public function postRoomTask()
	{
		$query_parameters = array
		(
			'body'		=> isset($this->args[1]) ? $this->args[1] : null,	// 必須.
			'to_ids'	=> isset($this->args[2]) ? $this->args[2] : null,	// 必須.
			'limit'		=> isset($this->args[3]) ? $this->args[3] : null,	// 任意.
		);
		$query_parameters = self::filteringParameters( $query_parameters );

		$this->loadModel('Chatwork.Room');
		$results = Room::post( array('room_id'=>$this->args[0],'action'=>'tasks','query_parameters'=>$query_parameters) );

		$this->out( print_r($results,true) );
	}

	/**
	 * PUT /rooms/{room_id}
	 * チャットの名前、アイコンをアップデート.
	 *
	 * 引数0：room_id
	 * 引数1：name グループチャットのチャット名.
	 * 引数2：description グループチャットの概要説明テキスト.
	 * 引数3：icon_preset グループチャットのアイコン種類. (group, check, document, meeting, event, project, business, study, security, star, idea, heart, magcup, beer, music, sports, travel)
	 */
	public function editRoom()
	{
		$query_parameters = array
		(
			'name'			=> (isset($this->args[1])&&(!empty($this->args[1]))) ? $this->args[1] : null,	// 任意.
			'description'	=> (isset($this->args[2])&&(!empty($this->args[2]))) ? $this->args[2] : null,	// 任意.
			'icon_preset'	=> (isset($this->args[3])&&(!empty($this->args[3]))) ? $this->args[3] : null,	// 任意.
		);
		$query_parameters = self::filteringParameters( $query_parameters );

		$this->loadModel('Chatwork.Room');
		$results = Room::put( array('room_id'=>$this->args[0],'query_parameters'=>$query_parameters) );

		$this->out( print_r($results,true) );
	}

	/**
	 * PUT /rooms/{room_id}/members
	 * チャットのメンバーを一括変更.
	 *
	 * 引数0：room_id
	 * 引数1：members_admin_ids 管理者権限のユーザー.<br />
	 *                          作成したチャットに参加メンバーのうち、管理者権限にしたいユーザーのアカウントIDの配列.
	 *                          最低1人は指定する必要がある.
	 *                          ※リストはカンマ区切りで複数の値を指定してください.
	 * 引数2：members_member_ids メンバー権限のユーザー.<br />
	 *                           作成したチャットに参加メンバーのうち、メンバー権限にしたいユーザーのアカウントIDの配列.<br />
	 *                          ※リストはカンマ区切りで複数の値を指定してください.
	 * 引数3：members_readonly_ids 閲覧のみ権限のユーザー.<br />
	 *                             作成したチャットに参加メンバーのうち、閲覧のみ権限にしたいユーザーのアカウントIDの配列.<br />
	 *                             ※リストはカンマ区切りで複数の値を指定してください.
	 */
	public function editRoomMembers()
	{
		$query_parameters = array
		(
			'members_admin_ids'		=> isset($this->args[1]) ? $this->args[1] : null,	// 必須.
			'members_member_ids'	=> (isset($this->args[2])&&(!empty($this->args[2]))) ? $this->args[2] : null,	// 任意.
			'members_readonly_ids'	=> (isset($this->args[3])&&(!empty($this->args[3]))) ? $this->args[3] : null,	// 任意.
		);
		$query_parameters = self::filteringParameters( $query_parameters );

		$this->loadModel('Chatwork.Room');
		$results = Room::put( array('room_id'=>$this->args[0],'action'=>'members','query_parameters'=>$query_parameters) );

		$this->out( print_r($results,true) );
	}

	/**
	 * DELETE /rooms/{room_id}
	 * グループチャットを退席/削除する.
	 *
	 * 引数0：room_id
	 * 引数1：action_type 退席するか、削除するか.<br />
	 *                    退席すると、このグループチャットにある自分が担当のタスク、および自分が送信したファイルは削除されます.<br />
	 *                    削除すると、このグループチャットに参加しているメンバー全員のメッセージ、タスク、ファイルはすべて削除されます.<br />
	 *                    ※一度削除すると元に戻せません！ (leave, delete)
	 */
	public function deleteRoom()
	{
		$query_parameters = array
		(
			'action_type' => isset($this->args[1]) ? $this->args[1] : null,	// 必須.
		);
		$query_parameters = self::filteringParameters( $query_parameters );

		$this->loadModel('Chatwork.Room');
		$results = Room::del( array('room_id'=>$this->args[0],'query_parameters'=>$query_parameters) );

		$this->out( print_r($results,true) );
	}





	/**
	 * 連想配列の値が null の要素を省いた連想配列を返す.
	 *
	 * @param array $parameters 連想配列.
	 */
	protected static function filteringParameters( array $parameters )
	{
		return array_filter( $parameters, function($v){return $v!==null;} );
	}
}