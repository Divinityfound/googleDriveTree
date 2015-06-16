<?php namespace Divinityfound\CredentialsKeysApi;
	class Processor {
		private $creds;
		private $submittedCreds;
		private $keys;
		private $requestedKeys;

		public function returnData() {
			if ($_SERVER['REQUEST_METHOD'] != 'POST') {
				return json_encode(array('Error' => 'Post data unavailable'));
			}
			$json = file_get_contents('php://input');
			$_POST = json_decode($json,true);
			//return json_encode(array('SUCCESS' => base64_decode($_POST['credentials'])));
			$this->submittedCreds = json_decode(base64_decode($_POST['credentials']),true);
			foreach ($this->creds as $key => $cred) {
				if ($this->creds[$key] != $this->submittedCreds[$key]) {
					return json_encode(array('Error' => 'Invalid Credentials'));
				}
			}
			$this->requestedKeys  = json_decode(base64_decode($_POST['keys']),true);
			$data = array();

			foreach ($this->requestedKeys as $key => $requested) {
				$data[$requested] = $this->keys[$requested];
			}

			return json_encode($data);
		}

		public function setCredentials($creds) {
			$this->creds = $creds;
			return $this;
		}

		public function setKeys($keys) {
			$this->keys = $keys;
			return $this;
		}
	}
?>