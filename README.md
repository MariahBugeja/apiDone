

# Bistro API Documentation

Welcome to the Bistro API documentation! This overview provides a summary of the key features and functionalities of our API, designed to facilitate interactions with the Bistro platform.

## Overview

The Bistro API allows developers to seamlessly integrate with our platform, providing essential features for managing customers, reservations, tables, staff, meals, drinks items, and orders. By leveraging our API, developers can enhance restaurant operations and deliver exceptional customer experiences.

## Endpoints


- **Customers**: Manage customer information, including creating, updating, deleting, and retrieving customer details.
- **Drinks**: Handle drink menu items, allowing for creation, updating, deletion, and retrieval of drink information.
- **Invoices**: Manage invoices generated for orders, including creation, updating, deletion, and retrieval of invoice details.
- **Meals**: Handle meal menu items, allowing for creation, updating, deletion, and retrieval of meal information.
- **Orders**: Manage customer orders, including creating new orders, updating order details, and retrieving order information.
- **Preorders**: Handle customer preorders, allowing for creation, updating, and retrieval of preorder information.
- **Preorder Items**: Manage items within preorders, enabling staff to add items and retrieve preorder details.
- **Recipes**: Handle recipes for meals, including creation, updating, deletion, and retrieval of recipe details.
- **Reservations**: Manage restaurant reservations, including creating, updating reservation status, and retrieving reservation details.
- **Restaurant Tables**: Manage restaurant table information, including adding, updating, deleting, and retrieving table details.
- **Staff**: Manage staff members, including adding, updating, deleting, and retrieving staff information.
- **Staff Accounts**: Manage staff accounts, including creating and deleting accounts and retrieving account details.
- **Staff Shifts**: Manage staff shift schedules, including creating, updating, deleting, and retrieving shift details.

## Structure

- **api/**: This folder contains scripts for managing different requests like creating bookings, handling orders, and managing stuff  within the API.
- **core/**: Here, you'll find important parts like setting up the database and other key configurations needed for the main functions of the application.
- **database/**: Inside this folder are scripts for managing the MySQL database, like creating its structure and adding sample data.
- **documentation/**: This folder is for creating detailed project documentation using MkDocs, which explains the API endpoints and how to use them.
- **includes/**: Here, you'll find shared code and useful functions that are used in many parts of the project to keep things organized and easier to manage.
- **postman/**: In this folder, you'll find collections and setups for Postman, a tool used for testing and developing the API.

  
## Usage


1. **Clone the Repository**: This means making a copy of the project from the internet onto your computer. You can do this by typing a command in a special program called a terminal or command prompt. It's like downloading a file.

2. **Install Dependencies**: Before using the project, you need to install some extra tools or programs. These are like pieces of software that help the project work better. You'll need to follow some instructions to install them.

3. **Configure the Database**: The project needs a place to store information, like a digital filing cabinet. You need to set up this filing cabinet and make sure it's organized correctly. You'll need to create a new "filing cabinet" on your computer, and then set it up to work with the project.

4. **Run the Application**: Once everything is set up, you can start using the project. You'll need to start a special program on your computer that makes the project work. It's like turning on a machine.

5. **Access the API Endpoints**: Now that the project is running, you can use it like a website. You can look at different parts of it and interact with it using a special tool called Postman or just a regular web browser. It's like using a map to find your way around a new place.


## API Testing

The API can be thoroughly tested and explored using Postman. We have provided Postman collections and environments to assist in API testing. To begin:

1. Import the provided collections and environments into Postman.
2. Utilize the endpoints in the collections to test the API.
3. Refer to Postman's documentation for additional guidance on using the tool.

## Contributing

Contributions to the Bistro API are greatly appreciated! If you wish to contribute, kindly fork the repository and create a pull request. Please adhere to coding best practices and include clear, concise comments in your code.

## License

This project is licensed under the [MIT License](LICENSE).

