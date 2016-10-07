# yii2-postgresql-array-field
Yii2 postgresql object field support behavior

================

Provides PostgreSQL object fields support for yii2 models.

Installation
------------
Add a dependency to your project's composer.json:

```json
{
	"require": {
		"fgh151/yii2-postgresql-array-field": "*"
	}
}
```

Migration example
------------------

```php
$this->createTable('UserReward', [
    'jsonField' => fgh151\PostgresqlJsonb\db\Schema::TYPE_JSONB
]);
```

Usage example
--------------
#### Attach behavior to one or more fields of your model

```php
use yii\db\ActiveRecord;
use \fgh151\PostgresqlJsonb\PostgresqlJsonbFieldBehavior;

/**
 * @property array $modelField
 */
class Model extends ActiveRecord{
	public function behaviors() {
		return [
			[
				'class' => PostgresqlJsonbFieldBehavior::className(),
				'arrayFieldName' => 'modelField', // model's field to attach behavior
				'onEmptySaveNull' => true // if set to false, empty array will be saved as empty PostreSQL array '{}' (default: true)
			]
		];
	}
}
```

```php
$model->jsonField->property = 'value';
$model->jsonField->otherProperty->otherPropertyValue = 'another value';
```
