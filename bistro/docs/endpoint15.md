### Create Staff Shift
Creates a new staff shift.

- **URL**: `/staff-shifts`
- **Method**: `POST`
- **Request Body**:
  - `staffId`: Integer (required) - The ID of the staff associated with this shift.
  - `start`: String (required) - The start time of the shift (format: YYYY-MM-DD HH:MM:SS).
  - `finish`: String (required) - The end time of the shift (format: YYYY-MM-DD HH:MM:SS).
  - `shiftType`: String (required) - The type of shift (e.g., morning, evening).
- **Success Response**:
  - **Code**: `201 Created`
  - **Content**: JSON object with the ID of the newly created staff shift.
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**: Error message indicating missing or invalid parameters.
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the staff ID does not exist.

### Delete Staff Shift
Deletes a staff shift.

- **URL**: `/staff-shifts/{staffShiftId}`
- **Method**: `DELETE`
- **URL Parameters**:
  - `staffShiftId`: Integer (required) - The ID of the staff shift to delete.
- **Success Response**:
  - **Code**: `204 No Content`
  - **Content**: Empty response body.
- **Error Response**:
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the staff shift ID was not found.

### Update Staff Shift
Updates details of a staff shift.

- **URL**: `/staff-shifts/{staffShiftId}`
- **Method**: `PUT`
- **URL Parameters**:
  - `staffShiftId`: Integer (required) - The ID of the staff shift to update.
- **Request Body**:
  - `staffId`: Integer (required) - The ID of the staff associated with this shift.
  - `start`: String (required) - The start time of the shift (format: YYYY-MM-DD HH:MM:SS).
  - `finish`: String (required) - The end time of the shift (format: YYYY-MM-DD HH:MM:SS).
  - `shiftType`: String (required) - The type of shift (e.g., morning, evening).
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON object with a success message.
- **Error Response**:
  - **Code**: `400 Bad Request`
  - **Content**: Error message indicating missing or invalid parameters.
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the staff shift ID was not found.

### Get Staff Shift by ID
Retrieves details of a staff shift by ID.

- **URL**: `/staff-shifts/{staffShiftId}`
- **Method**: `GET`
- **URL Parameters**:
  - `staffShiftId`: Integer (required) - The ID of the staff shift to retrieve.
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON object with details of the staff shift.
- **Error Response**:
  - **Code**: `404 Not Found`
  - **Content**: Error message indicating the staff shift ID was not found.

### Get All Staff Shifts
Retrieves details of all staff shifts.

- **URL**: `/staff-shifts`
- **Method**: `GET`
- **Success Response**:
  - **Code**: `200 OK`
  - **Content**: JSON array containing details of all staff shifts.
