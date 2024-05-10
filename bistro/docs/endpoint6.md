
### List Meals
Retrieves a list of all meals.

- **HTTP Method**: GET
- **Endpoint**: `/api/meals`
- **Description**: Retrieves a list of all meals available in the restaurant.
- **Response**: 
  - **200 OK**: JSON array containing details of all meals.

### Get Meal Details
Retrieves details of a specific meal identified by `mealid`.

- **HTTP Method**: GET
- **Endpoint**: `/api/meals/{mealid}`
- **Description**: Retrieves details of a specific meal identified by `mealid`.
- **URL Parameters**:
  - `mealid`: Integer (required) - The ID of the meal to retrieve.
- **Response**:
  - **200 OK**: JSON object containing details of the meal.
- **Error Response**:
  - **404 Not Found**: Error message indicating the meal ID was not found.

### Create Meal
Creates a new meal.

- **HTTP Method**: POST
- **Endpoint**: `/api/meals`
- **Description**: Creates a new meal.
- **Request Body**: JSON object containing meal details.
- **Response**:
  - **201 Created**: JSON object with the ID of the newly created meal.
- **Error Response**:
  - **400 Bad Request**: Error message indicating missing or invalid parameters.

### Update Meal
Updates details of a specific meal identified by `mealid`.

- **HTTP Method**: PUT
- **Endpoint**: `/api/meals/{mealid}`
- **Description**: Updates details of a specific meal identified by `mealid`.
- **URL Parameters**:
  - `mealid`: Integer (required) - The ID of the meal to update.
- **Request Body**: JSON object containing updated meal details.
- **Response**:
  - **200 OK**: JSON object with a success message.
- **Error Response**:
  - **400 Bad Request**: Error message indicating missing or invalid parameters.
  - **404 Not Found**: Error message indicating the meal ID was not found.

### Delete Meal
Deletes the meal identified by `mealid`.

- **HTTP Method**: DELETE
- **Endpoint**: `/api/meals/{mealid}`
- **Description**: Deletes the meal identified by `mealid`.
- **URL Parameters**:
  - `mealid`: Integer (required) - The ID of the meal to delete.
- **Response**:
  - **204 No Content**: Empty response body.
- **Error Response**:
  - **404 Not Found**: Error message indicating the meal ID was not found.

