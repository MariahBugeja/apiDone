### List Drinks
Retrieves a list of all drinks.

- **HTTP Method**: GET
- **Endpoint**: `/api/drinks`
- **Description**: Retrieves a list of all drinks.
- **Response**: 
  - **200 OK**: JSON array containing details of all drinks.

### Get Drink Details
Retrieves details of a specific drink identified by `drinkid`.

- **HTTP Method**: GET
- **Endpoint**: `/api/drinks/{drinkid}`
- **Description**: Retrieves details of a specific drink identified by `drinkid`.
- **URL Parameters**:
  - `drinkid`: Integer (required) - The ID of the drink to retrieve.
- **Response**:
  - **200 OK**: JSON object containing details of the drink.
- **Error Response**:
  - **404 Not Found**: Error message indicating the drink ID was not found.

### Create Drink
Creates a new drink.

- **HTTP Method**: POST
- **Endpoint**: `/api/drinks`
- **Description**: Creates a new drink.
- **Request Body**: JSON object containing drink details.
- **Response**:
  - **201 Created**: JSON object with the ID of the newly created drink.
- **Error Response**:
  - **400 Bad Request**: Error message indicating missing or invalid parameters.

### Update Drink
Updates details of a specific drink identified by `drinkid`.

- **HTTP Method**: PUT
- **Endpoint**: `/api/drinks/{drinkid}`
- **Description**: Updates details of a specific drink identified by `drinkid`.
- **URL Parameters**:
  - `drinkid`: Integer (required) - The ID of the drink to update.
- **Request Body**: JSON object containing updated drink details.
- **Response**:
  - **200 OK**: JSON object with a success message.
- **Error Response**:
  - **400 Bad Request**: Error message indicating missing or invalid parameters.
  - **404 Not Found**: Error message indicating the drink ID was not found.

### Delete Drink
Deletes the drink identified by `drinkid`.

- **HTTP Method**: DELETE
- **Endpoint**: `/api/drinks/{drinkid}`
- **Description**: Deletes the drink identified by `drinkid`.
- **URL Parameters**:
  - `drinkid`: Integer (required) - The ID of the drink to delete.
- **Response**:
  - **204 No Content**: Empty response body.
- **Error Response**:
  - **404 Not Found**: Error message indicating the drink ID was not found.

