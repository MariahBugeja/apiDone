
### Create Pre Order
Creates a new pre-order.

- **URL**: `/api/pre-orders`
- **Method**: `POST`
- **Request Body**:
  - `customerId`: Integer (required) - The ID of the associated customer.
  - `mealId`: Integer (required) - The ID of the associated meal.
  - `quantity`: Integer (required) - The quantity of the meal in the pre-order.
- **Success Response**:
  - **Code**: `201 Created`
  - **Content**: JSON object with the ID of the newly created pre-order.
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**: Error message indicating missing or invalid parameters.
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the associated customer or meal does not exist.

### Update Pre Order Status
Updates the status of a specific pre-order identified by `preOrderId`.

- **URL**: `/api/pre-orders/{preOrderId}`
- **Method**: `PUT`
- **URL Parameters**:
  - `preOrderId`: Integer (required) - The ID of the pre-order to update.
- **Request Body**:
  - `status`: String (required) - The new status of the pre-order.
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON object with a success message.
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**: Error message indicating missing or invalid parameters.
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the pre-order ID was not found.

### Get Pre Order Details
Retrieves details of a specific pre-order identified by `preOrderId`.

- **URL**: `/api/pre-orders/{preOrderId}`
- **Method**: `GET`
- **URL Parameters**:
  - `preOrderId`: Integer (required) - The ID of the pre-order to retrieve.
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON object with details of the pre-order.
- **Error Response**:
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the pre-order ID was not found.

### Get All Pre Orders
Retrieves details of all pre-orders.

- **URL**: `/api/pre-orders`
- **Method**: `GET`
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON array containing details of all pre-orders.