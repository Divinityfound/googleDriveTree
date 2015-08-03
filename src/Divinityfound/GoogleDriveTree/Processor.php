<?php namespace Divinityfound\GoogleDriveTree;
	use Google_Service_Drive;
	class Processor {
		private $client;
		private $drive;
		public  $file_tree;

		public function __construct($params = array()) {
			$this->client = $this->client($params);
			$this->drive  = new Google_Service_Drive($this->client);
			$this->file_tree = $this->getChildren($params['drive']);
		}

		private function client($params) {
			$client = new GoogleClient();

			return $client->setClientId($params['client_id'])->
					 setServiceAccountName($params['service_account_name'])->
					 setKeyFileLocation($params['key'])->
					 setSub($params['sub'])->
					 get_client();
		}

		public function compileData($info) {
			if ($info['mimeType'] == 'application/vnd.google-apps.folder') {
				return array(
					'Folder'   => '1',
					'Info'     => $info,
					'Children' => $this->getChildren($info['id']));
			}

			return array(
				'Folder'   => '0',
				'Info'     => $info,
				'Children' => '');
		}

		public function getChildren($id) {
			$file_tree = array();
			$drive_documents = $this->drive->children->listChildren($id);
			foreach ($drive_documents->items as $doc) {
				$info = $this->drive->files->get($doc->id);
				array_push($file_tree, $this->compileData($info));
			}

			return $file_tree;
		}
	}

?>