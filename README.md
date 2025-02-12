# Instance
Simple class to convert PHP classes to static and reusable

## Example
**Test Class:**
```php
class Test{
    private $name = '';
    public function ___construct($name='') {
        $this->name = $name;    
    }
    public function setName($name) {
        $this->name = $name;
        return $this;    
    }
    
    public function getName() {
        return $this->name;
    }
}
```
**Convert to static class:**
```php
$static = \EvolutionPHP\Instance\Instance::get(Test::class);
$static->setName('Smith');
echo $static->getName(); //Returns Smith

echo \EvolutionPHP\Instance\Instance::get(Test::class)->getName(); //Returns Smith
```

**Register arguments or recycle instance:**
```php
$static = \EvolutionPHP\Instance\Instance::register(Test::class, ['John']); //It is like: new Test('John');
echo $static->getName(); //Returns John

echo \EvolutionPHP\Instance\Instance::get(Test::class)->getName(); //Returns John

echo \EvolutionPHP\Instance\Instance::register(Test::class, ['Smith'])->getName(); //Returns Smith
```