<?php
    require_once(__DIR__ . '/../vendor/autoload.php');

    $params = array();
    $params['client_id']            = 'xyz.apps.googleusercontent.com';
    $params['service_account_name'] = 'xyz@developer.gserviceaccount.com';
    $params['key']                  = 'your_directory.P12';
    $params['sub']                  = 'youremail@example.com';
    $params['drive']                = 'drive_folder';

    $data = new \Divinityfound\GoogleDriveTree\Processor($params);

    echo '<pre>';
    print_r($data->file_tree);
    echo '</pre>';
    exit;
?>