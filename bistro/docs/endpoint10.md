### Create Pre Order Item
Creates a new pre-order item.

- **URL**: `/api/pre-order-items`
- **Method**: `POST`
- **Request Body**:
  - `preOrderId`: Integer (required) - The ID of the associated pre-order.
  - `mealId`: Integer (required) - The ID of the associated meal.
  - `quantity`: Integer (required) - The quantity of the meal in the pre-order.
- **Success Response**:
  - **Code**: `201 Created`
  - **Content**: JSON object with the ID of the newly created pre-order item.
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**: Error message indicating missing or invalid parameters.
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the associated pre-order or meal does not exist.

### Get Pre Order Item Detail
Retrieves details of a specific pre-order item identified by `preOrderItemId`.

- **URL**: `/api/pre-order-items/{preOrderItemId}`
- **Method**: `GET`
- **URL Parameters**:
  - `preOrderItemId`: Integer (required) - The ID of the pre-order item to retrieve.
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON object with details of the pre-order item.
- **Error Response**:
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the pre-order item ID was not found.

### Get All Pre Order Items
Retrieves details of all pre-order items.

- **URL**: `/api/pre-order-items`
- **Method**: `GET`
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON array containing details of all pre-order items.