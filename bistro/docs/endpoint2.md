
### List Allergies
Retrieves a list of all allergies.

- **HTTP Method**: GET
- **Endpoint**: `/api/allergies`
- **Description**: Retrieves a list of all allergies.
- **Response**: 
  - **200 OK**: JSON array containing details of all allergies.

### Get Allergy Details
Retrieves details of a specific allergy identified by `allergyid`.

- **HTTP Method**: GET
- **Endpoint**: `/api/allergies/{allergyid}`
- **Description**: Retrieves details of a specific allergy identified by `allergyid`.
- **URL Parameters**:
  - `allergyid`: Integer (required) - The ID of the allergy to retrieve.
- **Response**:
  - **200 OK**: JSON object containing details of the allergy.
- **Error Response**:
  - **404 Not Found**: Error message indicating the allergy ID was not found.

### Create Allergy
Creates a new allergy.

- **HTTP Method**: POST
- **Endpoint**: `/api/allergies`
- **Description**: Creates a new allergy.
- **Request Body**: JSON object containing allergy details.
- **Response**:
  - **201 Created**: JSON object with the ID of the newly created allergy.
- **Error Response**:
  - **400 Bad Request**: Error message indicating missing or invalid parameters.

### Delete Allergy
Deletes the allergy identified by `allergyid`.

- **HTTP Method**: DELETE
- **Endpoint**: `/api/allergies/{allergyid}`
- **Description**: Deletes the allergy identified by `allergyid`.
- **URL Parameters**:
  - `allergyid`: Integer (required) - The ID of the allergy to delete.
- **Response**:
  - **204 No Content**: Empty response body.
- **Error Response**:
  - **404 Not Found**: Error message indicating the allergy ID was not found.

### Get All Allergies
Retrieves all allergies.

- **HTTP Method**: GET
- **Endpoint**: `/api/allergies/all`
- **Description**: Retrieves all allergies.
- **Response**:
  - **200 OK**: JSON array containing details of all allergies.