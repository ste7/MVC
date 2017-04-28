MVC structure done from scratch

## Example usage

1 . create db and configure it in ``config.php``
```
$GLOBALS['mysql'] = [
    'host' => '127.0.0.1',
    'user' => 'root',
    'pass' => '',
    'dbname' => 'mvcdb'
];
```
2 . create a new model in models directory witch will be extended a base Model class ``App\Models\Model`` and set a namespace
```
// use $_handler property to handle with database class
// every method in DB class returns an object so you need to use
// first() or last() method to get a results

public function user($id){
    return $this->_handler
        ->table('users')
        ->where(['id' => $id])
        ->get();
}
```
3 . create a new controller in controllers directory, extend a base Controller ``App\Controllers\Controller`` and set a namespace
```
// use method getParam() to grab param from the url
// return a view with a view() method from parent class
// and send a data in array

public function getHome(){
    $id = $this->getParam();
    $user = new User();
    $username = $user->user($id);
    
    return parent::view('home/[id]', ['username' => $username]);
}
```
4 . every root call with ``$app->get('namespace', 'method')`` method in ``route.php``
```
$app->get('App\Controllers\HomeController', 'getHome');
```
5 . ``home.php``
```
// data will be accessible in $data array

$data['username']->first()->username;
```