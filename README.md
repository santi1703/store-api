# Products store API

This API is meant for saving products onto our system.

For use it, you will have to set the database for it to use in *.env* file.

You will also have to run the migrations using the command *php artisan migrate* for it to have
the required DB tables available.
___
## Available methods

> ***GET*** /api/v1/products

Fetches all products.
It accepts page parameter to check a particular data page.
It also accepts name parameter to filter all names containing the provided parameter string.
___

> ***POST*** /api/v1/products

Stores a new product into the system.
___

> ***GET*** /api/v1/products/{id}

Fetches data for the product with the provided id.
___

> ***PUT*** /api/v1/products/{id}

Updates data to the product with the provided id.
___

> ***DELETE*** /api/v1/products/{id}

Removes the product from the system.
___
