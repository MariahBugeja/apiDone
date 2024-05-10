### Create Table
Creates a new restaurant table.

- **URL**: `/api/tables`
- **Method**: `POST`
- **Request Body**:
  - `number`: Integer (required) - The table number.
  - `capacity`: Integer (required) - The seating capacity of the table.
- **Success Response**:
  - **Code**: `201 Created`
  - **Content**: JSON object with the ID of the newly created table.
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**: Error message indicating missing or invalid parameters.

### Update Table
Updates details of a specific restaurant table identified by `tableId`.

- **URL**: `/api/tables/{tableId}`
- **Method**: `PUT`
- **URL Parameters**:
  - `tableId`: Integer (required) - The ID of the restaurant table to update.
- **Request Body**:
  - `number`: Integer (required) - The updated table number.
  - `capacity`: Integer (required) - The updated seating capacity of the table.
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON object with a success message.
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**: Error message indicating missing or invalid parameters.
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the table ID was not found.

### Delete Table
Deletes the restaurant table identified by `tableId`.

- **URL**: `/api/tables/{tableId}`
- **Method**: `DELETE`
- **URL Parameters**:
  - `tableId`: Integer (required) - The ID of the restaurant table to delete.
- **Success Response**:
  - **Code**: `204 No Content`
  - **Content**: Empty response body.
- **Error Response**:
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the table ID was not found.

### List All Tables
Retrieves a list of all restaurant tables.

- **URL**: `/api/tables`
- **Method**: `GET`
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON array containing details of all restaurant tables.