## Model

Model is used to access data on the database. All models are stored in the `app/Models` directory.

## Basic Usage

### Define the table name
```php
public function __construct()
{
    parent::__construct();
    $this->table = 'users';
}
```

### Create function for database operation
```php
public function all()
{
    return $this->db->select()->from($this->table)
                    ->execute()->fetchAll();
}
```

### Completed code example
```php
<?php

namespace App\Models;

use FYLite\Models;

class User extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }
    
    public function all()
    {
        return $this->db->select()->from($this->table)
                        ->execute()->fetchAll();
    }
}
```
FYLite use PDO database library by Slim-PDO for database operation. For completed documentation about database operation can be read on [Slim-PDO Documentation](https://github.com/FaaPz/Slim-PDO/blob/master/docs/README.md).

## Related Documentation
* [Controller](https://github.com/biobii/fylite/blob/master/docs/controller.md)
* [Routing](https://github.com/biobii/fylite/blob/master/docs/routing.md)

Back to [Home](https://github.com/biobii/fylite)


