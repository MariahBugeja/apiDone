
### Create Order Item
Creates a new order item.

- **URL**: `/api/order-items`
- **Method**: `POST`
- **Request Body**:
  - `orderId`: Integer (required) - The ID of the associated order.
  - `mealId`: Integer (required) - The ID of the associated meal.
  - `drinkId`: Integer (optional) - The ID of the associated drink (if applicable).
  - `quantity`: Integer (required) - The quantity of the meal or drink in the order item.
- **Success Response**:
  - **Code**: `201 Created`
  - **Content**: JSON object with the ID of the newly created order item.
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**: Error message indicating missing or invalid parameters.
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the associated order or meal does not exist.

### Update Order Item
Updates details of a specific order item identified by `orderitemid`.

- **URL**: `/api/order-items/{orderitemid}`
- **Method**: `PUT`
- **URL Parameters**:
  - `orderitemid`: Integer (required) - The ID of the order item to update.
- **Request Body**:
  - `quantity`: Integer (required) - The new quantity of the order item.
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON object with a success message.
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**: Error message indicating missing or invalid parameters.
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the order item ID was not found.

### Get Order Item Details
Retrieves details of a specific order item identified by `orderitemid`.

- **URL**: `/api/order-items/{orderitemid}`
- **Method**: `GET`
- **URL Parameters**:
  - `orderitemid`: Integer (required) - The ID of the order item to retrieve.
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON object with details of the order item.
- **Error Response**:
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the order item ID was not found.

### Get All Order Items
Retrieves details of all order items.

- **URL**: `/api/order-items`
- **Method**: `GET`
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON array containing details of all order items.