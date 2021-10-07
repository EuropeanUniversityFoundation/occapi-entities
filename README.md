# Open Course Catalogue API entities

Drupal implementation of Open Course Catalogue API entities _Programme_ and _Course_.

## Installation

Include the repository in your project's `composer.json` file:

    "repositories": [
        ...
        {
            "type": "vcs",
            "url": "https://github.com/EuropeanUniversityFoundation/occapi_entities"
        }
    ],

Then you can require the package as usual:

    composer require euf/occapi_entities

Finally, install the module:

    drush en occapi_entities

## Usage

The OCCAPI entity settings will be available at `/admin/structure/occapi`. The corresponding permissions are grouped under _OCCAPI entities_ at `/admin/people/permissions`.
