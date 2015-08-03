<?php namespace Divinityfound\GoogleDriveTree;

	use Google_Auth_AssertionCredentials;
	use Google_Client;
	class GoogleClient {

		private static $client_id, $service_account_name, $key_file_location, $sub;
		public static function get_client() {
			$app_name = 'Drive';
			$key = file_get_contents(self::$key_file_location);

			$cred = new Google_Auth_AssertionCredentials(
				self::$service_account_name,
				array('https://www.googleapis.com/auth/drive'),
				$key
			);

			$cred->sub = self::$sub;

			$client = new Google_Client();
			$client->setClientId(self::$client_id);

			$client->setApplicationName($app_name);
			$client->setAccessType('offline_access');
			$client->setAssertionCredentials($cred);

			if ($client->getAuth()->isAccessTokenExpired()) {
				$client->getAuth()->refreshTokenWithAssertion();
			}

			return $client;
		}

		public function setClientId($value) {
			self::$client_id = $value;
			return $this;
		}

		public function setServiceAccountName($value) {
			self::$service_account_name = $value;
			return $this;
		}

		public function setKeyFileLocation($value) {
			self::$key_file_location = $value;
			return $this;
		}

		public function setSub($value) {
			self::$sub = $value;
			return $this;
		}

	}
?>