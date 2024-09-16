
# FlyModel: Dynamic Laravel Models on the Fly

FlyModel is a Laravel package that empowers you to create and manage models dynamically, **on the fly !**.

It define flexible and customizable models and model fields **without needing to change** the database schema.

This package streamlines your workflow by eliminating the need to define models explicitly in your codebase. Instead, you can generate and interact with models as needed, based on a unique "deck" identifier.

The package uses **FlexyField** Package as Dynamic Field Engine.

For More Info Visit: https://github.com/AuroraWebSoftware/FlexyField

## 🚀 Features

- **Dynamic Model Creation**: Instantiate models with a specified "deck" identifier without pre-defining them.
- **Dynamic Fields** : Define flexible and customizable fields on models **without needing to change** the database schema.
- **Automatic Scoping**: Models are automatically scoped according to the deck, ensuring data isolation.
- **Seamless Integration**: Works effortlessly with Laravel’s Eloquent ORM.

## 📦 Installation

To get started with FlyModel, follow these steps:

### Install the Package

Add FlyModel to your project using Composer:

```bash
composer require aurorawebsoftware/flymodel
```

### Run the Migration

Create the necessary database table for storing fly models:

```bash
php artisan migrate
```


## 📘 Usage

### Creating and Using Fly Models

With FlyModel, you can dynamically create models and perform various operations. Here’s how:

Instantiate a Model with a Deck

```php
$building = FlyModel::of('building');
```

Save the Model if not saved or created before

```php
$building->save();
```

Perform Field Operations
```php
$building->flexy->name = 'Headquarter Building'
$building->flexy->address = 'Ali Pasha Ave. number 10';
$building->flexy->city = 'İstanbul';
$building->flexy->floor = 7;
$building->flexy->area = 313;
$building->flexy->active = true;

$building->save();
```


Perform Eloquent Operations

```php
$buildings = FlyModel::of('building')->all();

$istanbulBuildings = FlyModel::of('building')
                        ->where('flexy_city', 'İstanbul')
                        ->get();

$largeBuildings = FlyModel::of('building')
                    ->where('flexy_area', '>' 500)
                    ->orderBy('flexy_area')
                    ->get();
                    
$highBuildingsInIstanbul = FlyModel::of('building')
                            ->where('flexy_floor', '>' 10)
                            ->where('flexy_city', 'İstanbul')
                            ->get();
```


## 🧪 Testing

FlyModel integrates with Laravel’s testing environment. Here’s an example of how to write tests for it:



## 💬 Contributing

We welcome contributions to improve FlyModel!
##
