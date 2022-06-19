# About

Find whether a site is safe or not using google safe browsing lookup API, using facade pattern.

# Facade
Facade provides a simplified interface to a library, a framework, or any other complex set of classes.\
This is a structural design pattern.

### **Read more** from [here](https://refactoring.guru/design-patterns/facade)


## Google Safe browsing lookup API
- Google gives an API to find out whether a site is malicious or not.
- For this you need to create your own API key from [google console dashboard](https://console.cloud.google.com/apis/dashboard)

## Run this example
- Create your own API key from the google console dashboard
- Install dependencis: `composer install`
- Provide **API key**, **Client ID** & **Client version** in this file: `src\SafeUrlLookup.php` for the respective constants: **API_KEY**, **CLIENT_ID** and **CLIENT_VERSION**
- Run command from this folder: `php index.php`

## File Breakdown
- `src/SafeUrlLookup`: Main facade file
- `index`: Starting point
