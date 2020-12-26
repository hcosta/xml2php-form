# xml2php-form

Es una clase creada con el objetivo de facilitar la edicion de documentos XML vía navegador Web.

<img src="/docs/workflow.png"/>

## Funcionamiento

Incluir la clase:

```php
include'xml_form.php';
```

Instanciar el objeto pasando dos variables, ruta del archivo xml y campo a mostrar en la edicion:

```php
$xml = new xml_form('personas.xml', 'Nombre');
```

Finalmente llamamos al metodo form:

```php
$xml->form();
```