# Readme
Este servicio de API REST simula la gestión de tickets para eventos artísticos. Utiliza JSON para el traspaso de mensajes entre el cliente y el servidor. El desarrollo del servicio se realizó en PHP con Laravel.

## Supuestos
1. **Uso de Docker:** Se asume que el servicio se ejecutará en un entorno Dockerizado. Y el usuario que ejecute tiene todo los modulos necesarios para realizar esto.
2. **Linux**: Se asume de que quien ejecute, utilice linux para ejecutar el proyecto.
3. **Variables de entorno**: Se asume que las variables de entorno estan correctas.
4. **Librerias y modulos necesarios**: Se asume que todas las dependencias estan instaladas de forma correcta.
## Decisiones de desarrollo

### Tablas de base de datos

Se crean 3 distintas tablas dentro de una base de datos MySQL
- La tabla de purchases
```php
Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events');
            $table->integer('quantity');
            $table->timestamp('purchase_date');
            $table->timestamps();
        });
```
- La tabla de events
```php
Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date');
            $table->string('venue');
            $table->text('description');
            $table->integer('ticket_price');
            $table->timestamps();
        });
```
- La tabla de customers
```php
Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->timestamps();
        });
```
### Datos con Faker

Se crean datos con faker, teniendo 10 events y 10 customers.

### API Endpoints

Cada API Endpoint tiene como ruta base común `/api/` .
por ejemplo el API Enpoint de `/events` es `/api/events`

Se agregó para utilidad de visualización el Endpoint `/api/customers` donde lista a todos los clientes.

### Events

Dentro de el Endpoint de events se omite el valor de descripción.

### Event

Muestra todos los valores de la tabla de event mediante el id. `/api/event/id`, si el id no es valido se entrega status 404.

### Purchase

Se puede agregar solo valores con ids de customer o events validos, sino entrega status 422.

### Sail

Para la creación del programa se utilizo Sail.

### Orders 

Muestra la información del customer al que pertenece el id. Y dentro de los valores se incluye el valor orders el cual es una lista con todos las purchases que tenga ese customer. Si el id en `/api/orders/id` es invalido se entrega status 404.

## Ejecución
Para ejecutar el proyecto, en la carpeta raiz del proyecto hay que ejecutar:
```console
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
y luego:
```console
./vendor/bin/sail up
```

### Fotos ejecución
#### Customers Endpoint.
![image](https://github.com/DiegoGUrra/laravel-api/assets/32343613/36b81552-d246-4a75-9582-8e6531d56e74)
Aquí se muestran todos los customers que estan en la base de datos.

---

#### Events Endpoint.
![image](https://github.com/DiegoGUrra/laravel-api/assets/32343613/cf521f95-12b4-4ee9-b309-6de91ee83dd2)

---

#### Event Endpoint.
  ![image](https://github.com/DiegoGUrra/laravel-api/assets/32343613/7c2e00ef-44b0-4c69-ac7f-69fe067a9c45)
Este es con un id de event que existe.

---

![image](https://github.com/DiegoGUrra/laravel-api/assets/32343613/61e44df0-c3c9-4027-ae39-9a5a5b419528)

Este es con un id de event que no existe.

---

#### Purchase Endpoint.
![image](https://github.com/DiegoGUrra/laravel-api/assets/32343613/cc5dba8c-5402-4513-b3e9-0b4cb8c91839)

Este muestra como resultado el objecto que se acaba de crear.

---

![image](https://github.com/DiegoGUrra/laravel-api/assets/32343613/e3d7e0a7-2740-4818-90ba-e82717926a8e)

Aquí se usa un customerId que esta fuera de rango, y esto nos entrega que es un id invalido.

---

![image](https://github.com/DiegoGUrra/laravel-api/assets/32343613/ed424ab0-c1c6-4894-b7d6-3c352357c493)

Aquí se usa un eventId invalido y nos entrega que el valor es invalido.

---

#### Orders

![image](https://github.com/DiegoGUrra/laravel-api/assets/32343613/090681c9-3bc3-4ac5-ab69-7258fd68a863)

Nos muestra la información del customer y como atributo tenemos orders, el cual lista todas las orders de ese customer.

---

![image](https://github.com/DiegoGUrra/laravel-api/assets/32343613/527ba05d-5934-45cc-abaf-a78b4fcc7e04)

Aquí hay otro cliente.

---

![image](https://github.com/DiegoGUrra/laravel-api/assets/32343613/16532d4b-b146-44fb-8333-6e17957759b6)

Y aquí un orders con id de customer invalido.

---

### Video de ejecución

Video de la ejecución: https://drive.google.com/file/d/1YMJtKLEcd0beI9mxV0pbY3e5XKoXOVz5/view?usp=drive_link


## Postman

[API Collection.postman_collection.json](https://github.com/DiegoGUrra/laravel-api/blob/master/API%20Collection.postman_collection.json)
