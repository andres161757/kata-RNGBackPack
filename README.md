# 🎒 Kata: Gestor de Inventario de Rol (RPG Backpack) — Edición Avanzada

Tu equipo de desarrollo está creando un videojuego de rol y te han encargado diseñar el sistema que gestiona la mochila de los personajes. Para facilitar la integración con la interfaz de consola, todo el control del inventario se realiza procesando **instrucciones en forma de texto**.

Tu tarea es implementar una clase en PHP que interprete estas instrucciones, mantenga el estado de la mochila y devuelva una representación visual del inventario o del estado del sistema.

---

## 🧱 Reglas Generales

* Solo puede haber **una clase pública**, con un **único método público** que reciba una instrucción (`string`) y devuelva el estado actual de la mochila o un mensaje de error (`string`).
* Los nombres de los objetos **no distinguen entre mayúsculas y minúsculas**: `"Poción"`, `"poción"` y `"POCIÓN"` se consideran el mismo objeto. Al guardarse o mostrarse, se debe hacer siempre en **minúsculas**.
* La mochila comienza con una **capacidad máxima base de 10 unidades** de peso. El peso total acumulado por los objetos no puede superar el límite máximo vigente en ese instante.

---

## 🛑 Categorías y Restricciones de Peso

Los objetos pertenecen a una categoría específica según su nombre (que tu código debe deducir). Cada categoría altera las reglas de peso o capacidad de la mochila:

1. **Armas (`espada`, `hacha`, `arco`):** Son objetos pesados. Ocupan el **doble de espacio** por unidad. *(Ejemplo: una `espada` con cantidad 1 ocupa 2 unidades de peso; con cantidad 2 ocupa 4 unidades de peso).*
2. **Contenedores (`bolsa`, `saco`):** Cada unidad de contenedor equipada **aumenta la capacidad máxima total de la mochila en +2 unidades**. *(Ejemplo: si equipas 1 `saco`, la capacidad máxima de la mochila pasa de 10 a 12 unidades. Ocupan 1 unidad de peso normal).*
3. **Miscelánea (Cualquier otro objeto, ej. `pocion`, `flecha`):** Siguen las reglas estándar (ocupan 1 unidad de peso y no alteran la capacidad).

---

## ✅ Acciones que debe soportar

### 1. Equipar un objeto
* **Instrucción:** `equipar <nombre> [cantidad]`
* Si no se indica cantidad, se asume `1`.
* Si el objeto ya existe, se acumula la cantidad.
* **Regla de límite:** Si al intentar añadir la cantidad solicitada el peso total de la mochila superase la capacidad máxima permitida en ese momento, **no se debe modificar el estado de la mochila** y el método devolverá exactamente:
  `Mochila llena: no hay espacio suficiente`

### 2. Desequipar (tirar) un objeto
* **Instrucción:** `desequipar <nombre> [cantidad]`
* Si no se indica cantidad, se asume `1`. Se resta dicha cantidad a la cantidad actual del objeto.
* Si la cantidad de ese objeto llega a `0`, el objeto desaparece por completo de la mochila (y si era un contenedor, se pierde su bonus de capacidad inmediatamente).
* **Errores de desequipar:**
  * Si el objeto no existe en la mochila: `No tienes ese objeto en la mochila`
  * Si intentas desequipar más cantidad de la que tienes: `No tienes suficiente cantidad de ese objeto`

### 3. Consultar estado del peso
* **Instrucción:** `estado`
* Devuelve un reporte del peso total ocupado actualmente frente a la capacidad máxima permitida en ese instante.
* **Formato:** `Ocupación: [peso_actual]/[capacidad_maxima]`

### 4. Limpiar mochila
* **Instrucción:** `limpiar`
* Vacía por completo la mochila, reiniciando también la capacidad máxima a su base de 10.

---

## 📤 Formato de Salida

Tras cada instrucción **válida** (salvo con el comando `estado`), el método debe devolver el inventario completo formateado en un único string:
* Los objetos deben aparecer **ordenados alfabéticamente**.
* Cada objeto se muestra con el formato: `[nombre]xcantidad`.
* Los objetos se separan por un guion entre espacios ` - `.
* Si la mochila está vacía, devuelve una cadena vacía: `""`.

---
## 🔁 Ejemplo de Flujo

```php
$backpack->execute("equipar poción 2");   // "[pocion]x2"
$backpack->execute("estado");             // "Ocupación: 2/10"

// Añadir un arma (ocupa el doble de peso)
$backpack->execute("equipar espada 2");   // "[espada]x2 - [pocion]x2"
$backpack->execute("estado");             // "Ocupación: 6/10" (2 pociones = 2, más 2 espadas x 2 = 4. Total = 6)

// Añadir un contenedor (aumenta el límite máximo de la mochila)
$backpack->execute("equipar saco 1");     // "[espada]x2 - [pocion]x2 - [saco]x1"
$backpack->execute("estado");             // "Ocupación: 7/12" (6 de antes + 1 peso del saco = 7. Capacidad sube a 12)

// Intentar superar el límite máximo actual (12)
$backpack->execute("equipar hacha 3");    // "Mochila llena: no hay espacio suficiente" 
// (3 hachas x 2 de peso = 6. Ocupación 7 + 6 = 13. Supera el límite de 12. No se altera la mochila).

$backpack->execute("desequipar saco");    // "[espada]x2 - [pocion]x2"
$backpack->execute("estado");             // "Ocupación: 6/10" (Al quitar el saco, la capacidad vuelve a ser 10)

$backpack->execute("limpiar");            // ""
```
----


### Ejecución con Docker:

```bash
# Construir la imagen
docker build -t rng-backpack-php .

# Entrar al contenedor
# Al entrar, si no existe vendor/, se instala automáticamente
docker run -it -v "$(pwd)":/app rng-backpack-php bash

# Ejecutar los tests dentro del contenedor
vendor/bin/phpunit
```

### Ejecución local (requiere PHP 8.3+):

```bash
composer install
vendor/bin/phpunit
```

