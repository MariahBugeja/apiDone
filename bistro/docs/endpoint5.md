
### List Invoices
Retrieves a list of all invoices.

- **HTTP Method**: GET
- **Endpoint**: `/api/invoices`
- **Description**: Retrieves a list of all invoices.
- **Response**: 
  - **200 OK**: JSON array containing details of all invoices.

### Get Invoice Details
Retrieves details of a specific invoice identified by `invoiceid`.

- **HTTP Method**: GET
- **Endpoint**: `/api/invoices/{invoiceid}`
- **Description**: Retrieves details of a specific invoice identified by `invoiceid`.
- **URL Parameters**:
  - `invoiceid`: Integer (required) - The ID of the invoice to retrieve.
- **Response**:
  - **200 OK**: JSON object containing details of the invoice.
- **Error Response**:
  - **404 Not Found**: Error message indicating the invoice ID was not found.

### Create Invoice
Creates a new invoice.

- **HTTP Method**: POST
- **Endpoint**: `/api/invoices`
- **Description**: Creates a new invoice.
- **Request Body**: JSON object containing invoice details. The request will check if the associated order exists.
- **Response**:
  - **201 Created**: JSON object with the ID of the newly created invoice.
- **Error Response**:
  - **400 Bad Request**: Error message indicating missing or invalid parameters.
  - **404 Not Found**: Error message indicating the associated order ID was not found.

### Update Invoice
Updates details of a specific invoice identified by `invoiceid`.

- **HTTP Method**: PUT
- **Endpoint**: `/api/invoices/{invoiceid}`
- **Description**: Updates details of a specific invoice identified by `invoiceid`. The request will check if the associated order exists.
- **URL Parameters**:
  - `invoiceid`: Integer (required) - The ID of the invoice to update.
- **Request Body**: JSON object containing updated invoice details.
- **Response**:
  - **200 OK**: JSON object with a success message.
- **Error Response**:
  - **400 Bad Request**: Error message indicating missing or invalid parameters.
  - **404 Not Found**: Error message indicating the invoice ID or associated order ID was not found.

### Delete Invoice
Deletes the invoice identified by `invoiceid`.

- **HTTP Method**: DELETE
- **Endpoint**: `/api/invoices/{invoiceid}`
- **Description**: Deletes the invoice identified by `invoiceid`. The request will check if the associated order exists.
- **URL Parameters**:
  - `invoiceid`: Integer (required) - The ID of the invoice to delete.
- **Response**:
  - **204 No Content**: Empty response body.
- **Error Response**:
  - **404 Not Found**: Error message indicating the invoice ID or associated order ID was not found.

