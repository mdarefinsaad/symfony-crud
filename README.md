# Symfony CRUD Application

This project is a Symfony-based CRUD (Create, Read, Update, Delete) application. It demonstrates basic CRUD operations for managing customers and products.

## Project Structure

### Controllers
- **CustomerController**: Manages CRUD operations for customers.
- **ProductController**: Manages operations related to products.

### Entities
- **Customer**: Represents a customer entity.
- **Product**: Represents a product entity.

### Repositories
- **CustomerRepository**: Handles database operations for customers.
- **ProductRepository**: Handles database operations for products.

### Services
- **CustomerService**: Contains business logic for customer-related operations.
- **ProductService**: Contains business logic for product-related operations.

### Migrations
- **Version20230823220350**: Migration for creating the customer table.
- **Version20230830184938**: Migration for creating the product table and establishing a foreign key relationship with the customer table.

### Configuration
- **Doctrine Configuration**: Located in `config/packages/doctrine.yaml`.
- **Framework Configuration**: Located in `config/packages/framework.yaml`.
- **Service Configuration**: Located in `config/services.yaml`.

### Docker Setup
- Docker configuration files are located in the `docker` directory.
- `docker-compose.yml` file for setting up the development environment.

### Environment Configuration
- Environment variables are managed in the `.env` file.

## Getting Started

### Prerequisites
- Docker
- Docker Compose

### Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/symfony-crud.git
   cd symfony-crud
2. Start the Docker containers:
    ```bash
    docker-compose up -d
3. Install dependencies:
    ```bash
    docker-compose exec php composer install
4. Run migrations:
    ```bash
    docker-compose exec php bin/console doctrine:migrations:migrate

### Usage
- Access the application at http://localhost:8000.
- Use the provided endpoints to manage customers and products.