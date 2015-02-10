# laravel-setup
My default Laravel 4.2 setup, ready for creating a site with user setup/authentication and/or RESTful web services. This is the setup I use to kick off most of my Laravel based projects where RESTful services and user roles/authentication functionality is high priority.

## Includes:

* Default layout views including Twitter Bootstrap 
* Packages:
  * **Confide** User Authentication and views: https://github.com/Zizaco/confide
  * **API-Guard** for API Key Generation: https://github.com/chrisbjr/api-guard
  * **API-Response** for handling/transforming API reponses: https://github.com/ellipsesynergie/api-response
  * **Entrust** for role based permissions: https://github.com/Zizaco/entrust
  * **Faker** for dummy data generation: https://github.com/fzaninotto/Faker
  * **JeffreyWay Generators** for better workflow: https://github.com/JeffreyWay/Laravel-4-Generators
  * **Laracasts** PHP to Javascript utility: https://github.com/laracasts/PHP-Vars-To-Js-Transformer
  * **Guzzle 4** for Mandrill/Mailgun


#Notes

### 1. Config
*app/config/app.php*

**Providers** have been updated to include the following:

```
'Laracasts\Utilities\UtilitiesServiceProvider',
'Way\Generators\GeneratorsServiceProvider',
'EllipseSynergie\ApiResponse\Laravel\ResponseServiceProvider',
'Chrisbjr\ApiGuard\ApiGuardServiceProvider',
'Zizaco\Confide\ServiceProvider',
'Zizaco\Entrust\EntrustServiceProvider'
```

**Aliases** have been updated to include the following:

```
'Carbon'        => 'Carbon\Carbon',
'Confide' 			=> 'Zizaco\Confide\Facade',
'Entrust'    		=> 'Zizaco\Entrust\EntrustFacade',
```

### 2. Bootstrap
*bootstrap/start.php*

Updated detect environment at line 27 to distinguish between production and development depending on location:

```
$env = $app->detectEnvironment(array(

	'local' => array('*.local','*localhost*'),
    'production' => array('*.com', '*.net', '*.ie')

));
```

### 3. composer.json
*composer.json*

**Important!** This file has been updated to include the packages I have listed above.

### 4. Views
*app/views/layouts*
*app/views/users*

I have included some starter templates for general and user-related layouts. The user related layouts utilise the Confide package to generate forms.

### 5. Models
*app/models/User/php*

I have updated the User model to utilise Confide.

### 6. Migrations
*apps/database/migrations*

Migration files for Entrust and Confide are generated and ready for migration once the database has been configured.

#Installation Instructions

1. Download or clone the laravel-setup directory and rename it as per your naming scheme.
2. Update your database details as per the Laravel docs: http://laravel.com/docs/4.2/database
3. Generate the api-guard migration using composer:
  ```$ php artisan migrate --package="chrisbjr/api-guard"```
4. Migrate the databases for Confide and Sentry:
  ``` $ php artisan migrate ```
5. If you wish, you can update the UsersController or Confide's configuration to point to the Bootstrapped user views located at *app/layout/users*.
6. Set up the email configuration to your preference.
7. Configure the various packages as per their docs.

# Coming soon:
* API-Guard Controllers, integrated with Confide
* Example API/RESTful service Controller
* Extra views/generic layouts
* Mail configuration
