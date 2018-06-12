# yii2-permission-rules
Check user role and status

## Installation

Recommended installation via [composer](http://getcomposer.org/download/):

```
composer require venomousboy/yii2-permission-rules
```

## Usage

Use in Controller behaviors:

```php

class CommentController extends \yii\web\Controller
{
    public function behaviors()
    {
	return [
    	    'access' => [
        	'class' => AccessControl::class,
        	'only' => ['index', 'view', 'create', 'update', 'delete'],
        	'rules' => [
            	    [
                	'actions' => ['index', 'view', 'create', 'update', 'delete'],
                	'allow' => true,
                	'matchCallback' => function($rule, $action) {
                    	    return PermissionRules::requireRole('admin') && PermissionRules::requireStatus('active');
                	}
            	    ],
            	    [
                	'actions' => [],
                	'allow' => false,
            	    ],
        	],
    	    ],
    	    'verbs' => [
        	'class' => VerbFilter::class,
        	'actions' => [
            	    'delete' => ['post'],
        	],
    	    ],
	];
    }

...
}
```
