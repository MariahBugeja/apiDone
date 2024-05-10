### Create Staff Account
Creates a new staff account.

- **URL**: `/staff-accounts`
- **Method**: `POST`
- **Request Body**:
  - `staffId`: Integer (required) - The ID of the staff associated with this account.
  - `email`: String (required) - The email address of the staff account.
  - `password`: String (required) - The password for the staff account.
- **Success Response**:
  - **Code**: `201 Created`
  - **Content**: JSON object with the ID of the newly created staff account.
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**: Error message indicating missing or invalid parameters.
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the staff ID does not exist.

### Delete Staff Account
Deletes a staff account.

- **URL**: `/staff-accounts/{staffAccountId}`
- **Method**: `DELETE`
- **URL Parameters**:
  - `staffAccountId`: Integer (required) - The ID of the staff account to delete.
- **Success Response**:
  - **Code**: `204 No Content`
  - **Content**: Empty response body.
- **Error Response**:
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the staff account ID was not found.

### Update Staff Account Password
Updates the password of a staff account.

- **URL**: `/staff-accounts/{staffAccountId}/password`
- **Method**: `PATCH`
- **URL Parameters**:
  - `staffAccountId`: Integer (required) - The ID of the staff account to update.
- **Request Body**:
  - `password`: String (required) - The new password for the staff account.
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON object with a success message.
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**: Error message indicating missing or invalid parameters.
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the staff account ID was not found.

### Get Staff Account by ID
Retrieves details of a staff account by ID.

- **URL**: `/staff-accounts/{staffAccountId}`
- **Method**: `GET`
- **URL Parameters**:
  - `staffAccountId`: Integer (required) - The ID of the staff account to retrieve.
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON object with details of the staff account.
- **Error Response**:
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the staff account ID was not found.

### Get All Staff Accounts
Retrieves details of all staff accounts.

- **URL**: `/staff-accounts`
- **Method**: `GET`
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON array containing details of all staff accounts.
