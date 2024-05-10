### Create Recipe
Creates a new recipe.

- **URL**: `/api/recipes`
- **Method**: `POST`
- **Request Body**:
  - `name`: String (required) - The name of the recipe.
  - `description`: String (required) - The description of the recipe.
  - `ingredients`: Array of Strings (required) - The list of ingredients needed for the recipe.
  - `instructions`: String (required) - The cooking instructions for the recipe.
- **Success Response**:
  - **Code**: `201 Created`
  - **Content**: JSON object with the ID of the newly created recipe.
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**: Error message indicating missing or invalid parameters.

### Update Recipe
Updates details of a specific recipe identified by `recipeId`.

- **URL**: `/api/recipes/{recipeId}`
- **Method**: `PUT`
- **URL Parameters**:
  - `recipeId`: Integer (required) - The ID of the recipe to update.
- **Request Body**:
  - `name`: String (required) - The updated name of the recipe.
  - `description`: String (required) - The updated description of the recipe.
  - `ingredients`: Array of Strings (required) - The updated list of ingredients needed for the recipe.
  - `instructions`: String (required) - The updated cooking instructions for the recipe.
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON object with a success message.
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**: Error message indicating missing or invalid parameters.
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the recipe ID was not found.

### Delete Recipe
Deletes the recipe identified by `recipeId`.

- **URL**: `/api/recipes/{recipeId}`
- **Method**: `DELETE`
- **URL Parameters**:
  - `recipeId`: Integer (required) - The ID of the recipe to delete.
- **Success Response**:
  - **Code**: `204 No Content`
  - **Content**: Empty response body.
- **Error Response**:
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the recipe ID was not found.

### List Recipes
Retrieves a list of all recipes.

- **URL**: `/api/recipes`
- **Method**: `GET`
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON array containing details of all recipes.