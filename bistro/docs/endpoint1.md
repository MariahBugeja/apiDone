
### List Reservations
Retrieves a list of all reservations.

- **HTTP Method**: GET
- **Endpoint**: `/api/reservations`
- **Description**: Retrieves a list of all reservations.
- **Response**: 
  - **200 OK**: JSON array containing details of all reservations.

### Get Reservation Details
Retrieves details of a specific reservation identified by `reservationid`.

- **HTTP Method**: GET
- **Endpoint**: `/api/reservations/{reservationid}`
- **Description**: Retrieves details of a specific reservation identified by `reservationid`.
- **URL Parameters**:
  - `reservationid`: Integer (required) - The ID of the reservation to retrieve.
- **Response**:
  - **200 OK**: JSON object containing details of the reservation.
- **Error Response**:
  - **404 Not Found**: Error message indicating the reservation ID was not found.

### Create Reservation
Creates a new reservation.

- **HTTP Method**: POST
- **Endpoint**: `/api/reservations`
- **Description**: Creates a new reservation.
- **Request Body**: JSON object containing reservation details.
- **Response**:
  - **201 Created**: JSON object with the ID of the newly created reservation.
- **Error Response**:
  - **400 Bad Request**: Error message indicating missing or invalid parameters.

### Update Reservation
Updates an existing reservation identified by `reservationid`.

- **HTTP Method**: PUT
- **Endpoint**: `/api/reservations/{reservationid}`
- **Description**: Updates an existing reservation identified by `reservationid`.
- **Request Body**: JSON object with updated reservation details.
- **Response**:
  - **200 OK**: JSON object with the updated reservation details.
- **Error Response**:
  - **404 Not Found**: Error message indicating the reservation ID was not found.

### Delete Reservation
Deletes the reservation identified by `reservationid`.

- **HTTP Method**: DELETE
- **Endpoint**: `/api/reservations/{reservationid}`
- **Description**: Deletes the reservation identified by `reservationid`.
- **Response**:
  - **204 No Content**: Empty response body.
- **Error Response**:
  - **404 Not Found**: Error message indicating the reservation ID was not found.

### Update Reservation Status
Updates the status of the reservation identified by `reservationid`.

- **HTTP Method**: PUT
- **Endpoint**: `/api/reservations/{reservationid}/status`
- **Description**: Updates the status of the reservation identified by `reservationid`.
- **Request Body**: JSON object with the new status.
- **Response**:
  - **200 OK**: JSON object with a success message.
- **Error Response**:
  - **404 Not Found**: Error message indicating the reservation ID was not found.

### Get All Reservations
Retrieves details of all reservations.

- **HTTP Method**: GET
- **Endpoint**: `/api/reservations/all`
- **Description**: Retrieves details of all reservations.
- **Response**:
  - **200 OK**: JSON array containing details of all reservations.