# Phalcon-Helpers
A collection of PHP Phalcon Helper Classes

The Cli class has methods that will add a progress bar to the terminal window.

```php
$rows = \Models\MyModel::find();
$count = count($rows);
$i=1;
foreach($rows as $row){
    // Do something with $row
    ...
    // Draw progress bar
    \Helpers\Cli::statusbar($i,$count);
}
```

The Controller class has methods that help with controller output.

```php
$response = array(
    'status' => 'success',
    'message' => 'The process was successful'
);
// JSON encode response and send JSON header
\Helpers\Controller::jsonify($response);
```

The Language class has methods for common response text in English.

```php
$response = array(
    'status' => \Helpers\Language::$postStatusSuccess
    'message' => 'The process was successful'
);
// JSON encode response and send JSON header
\Helpers\Controller::jsonify($response);
```

The Model class has methods that help to deal with models and result set objects.

```php
$params = $this->request->getPost();
$myModel = new \Models\MyModel();
foreach($params as $key=>$value){
    \Helpers\Model::setCreateProperty($myModel,$key,$value);
}
$myModel->create();
```