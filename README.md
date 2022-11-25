# Módulo Magento GpViComm

Este modulo permite a los usuarios de magento procesar pagos de manera fácil y rápida con GpVicomm.

## Descarga e Instalación

**1. Ejecuta el siguiente comando para instalar nuestro paquete :**

Para instalar la ultima versión.  `composer require vicomm/payment-gateway`

Para instalar una version específica.  `composer require vicomm/payment-gateway:2.4.0`

Una vez que finalice la instalación, Continúe con el siguiente comando en su terminal.


**2. Actualizar dependencias:**

`php bin/magento setup:di:compile`


**3. Actualizar modulos de registro:**

`php bin/magento setup:upgrade`


**Opcional.- Este comando es opcional para ambientes de producción:**

`php bin/magento setup:static-content:deploy`


Ahora Debería ver los settings de GpViComm  en `Stores > Configuration > Sales > Payment Methods` en el Dashboard Admin de Magento.


## Mantenimiento y Actualización

Si necesita actualizar la última versión del plugin use: `composer update vicomm/payment-gateway` 
o si requiere un versión especifica `composer require vicomm/payment-gateway:2.4.0` .

## Notificaciones Webhook y Actualizacion de Transacciones

Cada que una transacción cambie su estado, GpViComm enviara una notificación HTTP POST a su webhook.

La URL que se debe usar para actualizar via webhook es:

`https://magentodomain.com/rest/V2/webhook/vicomm`

Esta URL estara configurada en GpViComm.
