Soap Api App
========================

Welcome to the Soap Api App which is developed in Symfony 2.8.

What's inside?
--------------

The App contains the Soap Server to handle the request made to the Atom Api and Soap Client to consume 
Atom API along with other Soap Apis. The Atom api consists of methods to fetch details like Element Name, Atomic Number, Element Symbol, Atom List, etc. The request to the atom details can be handled
by two ways:
* **SoapServer** : This is the default PHP Server. It handles requests by buffering output
from the functions or classes set to be handled by the server.  
* **BeSimpleSoap** : This is a third party library which comes with a feature of 
annotations for creating wsdl for the Soap Api, setting the requests,headers and responses on the server side
and handling the requests normally using services.

The App is configured with the following defaults:
````
An AppBundle you can use to start coding;
Twig as the only configured template engine;
Doctrine ORM/DBAL;
Swiftmailer;
Annotations enabled for everything.
````
It comes pre-configured with the following bundles:

* **FrameworkBundle** - The core Symfony framework bundle
* **SensioFrameworkExtraBundle** - Adds several enhancements, including
    template and routing annotation capability
* **DoctrineBundle** - Adds support for the Doctrine ORM
* **TwigBundle** - Adds support for the Twig templating engine
* **SecurityBundle** - Adds security by integrating Symfony's security
    component
* **SwiftmailerBundle** - Adds support for Swiftmailer, a library for
    sending emails

It contains the following bundle:

* **AppBundle** - It contains the following items:
    * Controller : The controller contains action for particular routes.They are:
        * AtomController - for handling Soap Requests using PHP SOAP Server.  
        * BeSimpleSoapController - for handling Soap Requests using BeSimpleSoap. 
    * Constant : Soap Constants containing fault Codes, fault string and duplicated strings     
    * Model/Entity : Atom Entity which maps the fields in class to columns in dB.
    * EventListener : Exception Listener to be used for logging exceptions.
    * Form : The form for creating Atoms. 
    * View/Twig : It contains views which are rendered according to the particular action in controller.They are:
        * Atom - Create atom using Symfony Forms.  
    * Service: The services are used for creating helper objects for controllers.They are:
        * HandleRequest - The request to be handled by the PHP Soap Server.
        * PeriodicTable - The class containing the Soap Methods which returns back the appopriate response.
        * Validator - For Validating the incoming Soap Requests.
        * CreateResponse - Used for creating appropriate response for the BeSimpleSoap. 
    * Util : The helper classes which are used in services. They are:
        * AtomUtil : For checking if atom exits.
        * DomUtil : For creating XML  in CDATA using root and nodes  with text as argmuents.
        * SOAP : Header, Requests and responses for the BeSimple Controller which in turn get converted to wsdl.
        
* **Soap Client** - It contains the PHP files in the web directory for consuming the Atom Soap Api and also other Soap Api avaliable on www.http://webservicex.com:
    * Holiday : Holiday Api containing methods to fetch holiday for the year or a particular month.
    * Library : Having a small api containing bookYear as method with soap client, server and soap method to call.
    * PeriodicTable : Various call to the methods in the Atom API.
    * Weather : Weather Api to the method GetCitiesByCountry.           
                         
Installation
--------------   

For Installing symfony 2.8 and the necessary bundles use composer.

* Composer Installation: curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
* Symfony Installation:  composer create-project symfony/framework-standard-edition:2.8.32 NameOfProject
* Doctrine Migrations Bundle: composer require doctrine/doctrine-migrations-bundle:1.3.1
* FOS User Bundle: composer require friendsofsymfony/user-bundle:"~1.3"
* BeSimpleSoap Bundle : composer require besimple/soap:"^0.2.6"
* PHP2WSDL generator : composer require php2wsdl/php2wsdl:"0.6" 
 

