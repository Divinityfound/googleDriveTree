##Google Drive Tree
###Google Drive to an Array Tree

This solution was developed to make it easier for developers to figure out the entirety of the Google Drive file map for public or private use.

###Google Setup

1. Visit https://console.developers.google.com/project
2. Create a project.
3. On the menu on the left, expand "APIs & auth", select APIs
4. Select under Google Apps APIs, Drive API
5. Enable API
6. On the menu on the left under "APIs & auth", select Credentials
7. Under OAuth, click "Create new Client ID"
8. Click Service Account, select P12 Key
9. Store your P12 Key somewhere safe
10. Visit https://admin.google.com
11. Click "Security". It may be under Show More.
12. Click Show More when in Security, click Advanced Settings.
13. Click Manage "API client access"
14. Insert Service Account's Client Id under Client Name, insert into API Scope "https://www.googleapis.com/auth/drive"
15. Your API is now set up!

###Code

```php

	require_once(__DIR__ . '/../vendor/autoload.php');

	$params = array();
	$params['client_id']            = 'xyz.apps.googleusercontent.com';
	$params['service_account_name'] = 'xyz@developer.gserviceaccount.com';
	$params['key']                  = 'your_directory.P12';
	$params['sub']                  = 'youremail@example.com';
	$params['drive']				= 'drive_folder';

	$data = new \Divinityfound\GoogleDriveTree\Processor($params);

	echo '<pre>';
	print_r($data->file_tree);
	echo '</pre>';
	exit;

```