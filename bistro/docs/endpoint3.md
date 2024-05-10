
### List Customers
Retrieves a list of all customers.

- **HTTP Method**: GET
- **Endpoint**: `/api/customers`
- **Description**: Retrieves a list of all customers.
- **Response**: 
  - **200 OK**: JSON array containing details of all customers.

### Get Customer Details
Retrieves details of a specific customer identified by `customerid`.

- **HTTP Method**: GET
- **Endpoint**: `/api/customers/{customerid}`
- **Description**: Retrieves details of a specific customer identified by `customerid`.
- **URL Parameters**:
  - `customerid`: Integer (required) - The ID of the customer to retrieve.
- **Response**:
  - **200 OK**: JSON object containing details of the customer.
- **Error Response**:
  - **404 Not Found**: Error message indicating the customer ID was not found.

### Create Customer
Creates a new customer.

- **HTTP Method**: POST
- **Endpoint**: `/api/customers`
- **Description**: Creates a new customer.
- **Request Body**: JSON object containing customer details.
- **Response**:
  - **201 Created**: JSON object with the ID of the newly created customer.
- **Error Response**:
  - **400 Bad Request**: Error message indicating missing or invalid parameters.

### Update Customer
Updates details of a specific customer identified by `customerid`.

- **HTTP Method**: PUT
- **Endpoint**: `/api/customers/{customerid}`
- **Description**: Updates details of a specific customer identified by `customerid`.
- **URL Parameters**:
  - `customerid`: Integer (required) - The ID of the customer to update.
- **Request Body**: JSON object containing updated customer details.
- **Response**:
  - **200 OK**: JSON object with a success message.
- **Error Response**:
  - **400 Bad Request**: Error message indicating missing or invalid parameters.
  - **404 Not Found**: Error message indicating the customer ID was not found.

### Change Customer Password
Changes the password of the customer identified by `customerid`.

- **HTTP Method**: PUT
- **Endpoint**: `/api/customers/{customerid}/password`
- **Description**: Changes the password of the customer identified by `customerid`.
- **URL Parameters**:
  - `customerid`: Integer (required) - The ID of the customer to update.
- **Request Body**: JSON object containing the new password.
- **Response**:
  - **200 OK**: JSON object with a success message.
- **Error Response**:
  - **400 Bad Request**: Error message indicating missing or invalid parameters.
  - **404 Not Found**: Error message indicating the customer ID was not found.

### Delete Customer
Deletes the customer identified by `customerid`.

- **HTTP Method**: DELETE
- **Endpoint**: `/api/customers/{customerid}`
- **Description**: Deletes the customer identified by `customerid`.
- **URL Parameters**:
  - `customerid`: Integer (required) - The ID of the customer to delete.
- **Response**:
  - **204 No Content**: Empty response body.
- **Error Response**:
  - **404 Not Found**: Error message indicating the customer ID was not found.

### Get Customer Food Details
Retrieves food details related to the customer identified by `customerid`.

- **HTTP Method**: GET
- **Endpoint**: `/api/customers/{customerid}/fooddetails`
- **Description**: Retrieves food details related to the customer identified by `customerid`.
- **URL Parameters**:
  - `customerid`: Integer (required) - The ID of the customer.
- **Response**:
  - **200 OK**: JSON object containing food details related to the customer.