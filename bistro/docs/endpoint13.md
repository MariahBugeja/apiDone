### Create Staff Member
Creates a new staff member.

- **URL**: `/api/staff`
- **Method**: `POST`
- **Request Body**:
  - `name`: String (required) - The name of the staff member.
  - `role`: String (required) - The role of the staff member (e.g., waiter, chef).
  - `email`: String (required) - The email address of the staff member.
  - `phone`: String (optional) - The phone number of the staff member.
- **Success Response**:
  - **Code**: `201 Created`
  - **Content**: JSON object with the ID of the newly created staff member.
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**: Error message indicating missing or invalid parameters.

### Update Staff Member
Updates details of a specific staff member.

- **URL**: `/api/staff/{staffId}`
- **Method**: `PUT`
- **URL Parameters**:
  - `staffId`: Integer (required) - The ID of the staff member to update.
- **Request Body**:
  - `name`: String  - The updated name of the staff member.
  - `role`: String  - The updated role of the staff member.
  - `email`: String  - The updated email address of the staff member.
  - `phone`: String  - The updated phone number of the staff member.
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON object with a success message.
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**: Error message indicating missing or invalid parameters.
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the staff member ID was not found.

### Delete Staff Member
Deletes the staff member identified by `staffId`.

- **URL**: `/api/staff/{staffId}`
- **Method**: `DELETE`
- **URL Parameters**:
  - `staffId`: Integer (required) - The ID of the staff member to delete.
- **Success Response**:
  - **Code**: `204 No Content`
  - **Content**: Empty response body.
- **Error Response**:
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the staff member ID was not found.

### Get Staff Member Details
Retrieves details of a specific staff member.

- **URL**: `/api/staff/{staffId}`
- **Method**: `GET`
- **URL Parameters**:
  - `staffId`: Integer (required) - The ID of the staff member to retrieve.
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON object with details of the staff member.
- **Error Response**:
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the staff member ID was not found.

### List All Staff Members
Retrieves a list of all staff members.

- **URL**: `/api/staff`
- **Method**: `GET`
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON array containing details of all staff members.