sftwedoo
========

<b>Symfony load routing and services and load config with new extentions from bundle </br>

# How to work ?

You can add directory in your bundle:
<b>Resources/config/routing.yml</b> and put your routing without touch the routing global in <b>app/routing.yml</b>

You can add new parameters under <b>core_base</b> extentions in <b>Resources/config/config.yml</b> 
see exemple <b>/src/CoreBaseBundle/Resources/config/config.yml</b>

can change key and value of your config.yml in configuration.php treeBuilder :
see <b>src/CoreBaseBundle/DependencyInjection/Configuration.php</b>

if you want to load config parameters like routing from each bundle separate should change the class CoreBaseExtension in directory <b>DependencyInjection</b> to load the configuration treeBuilder from all bundle inside src like routing you can see 
<b>src/CoreBaseBundle/Services/RoutingInjection/RouteServiceProvider.php </b>
