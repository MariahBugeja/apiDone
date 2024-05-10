
### Create Order
Creates a new order.

- **URL**: `/api/orders`
- **Method**: `POST`
- **Request Body**: JSON object containing order details.
  - `customerId`: Integer (required) - The ID of the customer placing the order.
  - `tableId`: Integer (required) - The ID of the table where the order is placed.
  - `status`: String (required) - The status of the order (e.g., "pending", "in progress", "completed").
- **Success Response**:
  - **Code**: `201 Created`
  - **Content**: JSON object with the ID of the newly created order.
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**: Error message indicating missing or invalid parameters.

### Read Orders
Retrieves a list of all orders.

- **URL**: `/api/orders`
- **Method**: `GET`
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON array containing details of all orders.

### Read Single Order
Retrieves details of a specific order identified by `orderid`.

- **URL**: `/api/orders/{orderid}`
- **Method**: `GET`
- **URL Parameters**:
  - `orderid`: Integer (required) - The ID of the order to retrieve.
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON object with details of the order.
- **Error Response**:
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the order ID was not found.

### Update Order
Updates details of a specific order identified by `orderid`.

- **URL**: `/api/orders/{orderid}`
- **Method**: `PUT`
- **URL Parameters**:
  - `orderid`: Integer (required) - The ID of the order to update.
- **Request Body**: JSON object containing updated order details.
  - `status`: String (required) - The updated status of the order.
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON object with a success message.
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**: Error message indicating missing or invalid parameters.
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the order ID was not found.

### Delete Order
Deletes the order identified by `orderid`.

- **URL**: `/api/orders/{orderid}`
- **Method**: `DELETE`
- **URL Parameters**:
  - `orderid`: Integer (required) - The ID of the order to delete.
- **Success Response**:
  - **Code**: `204 No Content`
  - **Content**: Empty response body.
- **Error Response**:
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the order ID was not found.