
CREATE DATABASE L11_Baktybekkyzy_65603_BG;
USE L11_Baktybekkyzy_65603_BG;

CREATE TABLE bicycles_BG (
    bicycle_id INT(5) PRIMARY KEY AUTO_INCREMENT,
    model_name VARCHAR(100) NOT NULL,
    brand VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT(5) NOT NULL
);

CREATE TABLE customers_BG (
    customer_id INT(5) PRIMARY KEY AUTO_INCREMENT,
    customer_name VARCHAR(100) NOT NULL,
    contact_email VARCHAR(100) NOT NULL,
    phone_number VARCHAR(15)
);

CREATE TABLE employees_BG (
    employee_id INT(5) PRIMARY KEY AUTO_INCREMENT,
    employee_name VARCHAR(100) NOT NULL,
    position VARCHAR(50) NOT NULL,
    salary DECIMAL(10, 2) NOT NULL
);

CREATE TABLE sales_BG (
    sale_id INT(5) PRIMARY KEY AUTO_INCREMENT,
    bicycle_id INT(5) NOT NULL,
    customer_id INT(5) NOT NULL,
    employee_id INT(5) NOT NULL,
    sale_date DATE NOT NULL,
    quantity INT(5) NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (bicycle_id) REFERENCES bicycles_BG(bicycle_id),
    FOREIGN KEY (customer_id) REFERENCES customers_BG(customer_id),
    FOREIGN KEY (employee_id) REFERENCES employees_BG(employee_id)
);

CREATE TABLE suppliers_BG (
    supplier_id INT(5) PRIMARY KEY AUTO_INCREMENT,
    supplier_name VARCHAR(100) NOT NULL,
    contact_email VARCHAR(100),
    phone_number VARCHAR(15)
);

CREATE TABLE supplies_BG (
    supply_id INT(5) PRIMARY KEY AUTO_INCREMENT,
    bicycle_id INT(5) NOT NULL,
    supplier_id INT(5) NOT NULL,
    supply_date DATE NOT NULL,
    quantity INT(5) NOT NULL,
    FOREIGN KEY (bicycle_id) REFERENCES bicycles_BG(bicycle_id),
    FOREIGN KEY (supplier_id) REFERENCES suppliers_BG(supplier_id)
);

CREATE TABLE maintenance_BG (
    maintenance_id INT(5) PRIMARY KEY AUTO_INCREMENT,
    bicycle_id INT(5) NOT NULL,
    employee_id INT(5) NOT NULL,
    maintenance_date DATE NOT NULL,
    description TEXT,
    cost DECIMAL(10, 2),
    FOREIGN KEY (bicycle_id) REFERENCES bicycles_BG(bicycle_id),
    FOREIGN KEY (employee_id) REFERENCES employees_BG(employee_id)
);


INSERT INTO bicycles_BG (model_name, brand, price, stock_quantity) VALUES
('Speedster 300', 'FastRiders', 1200.50, 10),
('Mountain King', 'HillHoppers', 950.00, 8),
('Urban Cruiser', 'CityCycle', 750.75, 15),
('EcoTour', 'GreenBikes', 550.25, 20),
('Racer X', 'ProCyclers', 2200.00, 5);

INSERT INTO customers_BG (customer_name, contact_email, phone_number) VALUES
('Aruuke Umarova', 'aruuke.umarov@example.com', '733-198-525'),
('Bekzat Gaparov', 'bekzat.gaparov@example.com', '987-654-210'),
('Bekzhan Gaparov', 'bekzhan.gaparov@example.com', '456-789-234');

INSERT INTO employees_BG (employee_name, position, salary) VALUES
('Gulzina Baktybek kyzy', 'Manager', 5000.00),
('Akyl Umarov', 'Salesperson', 3000.00),
('Nur Bekov', 'Technician', 3500.00);


INSERT INTO suppliers_BG (supplier_name, contact_email, phone_number) VALUES
('Bicycle World', 'contact@bicycleworld.com', '121-122-433'),
('Gear Supplies Inc.', 'info@gearsupplies.com', '144-255-766');


INSERT INTO supplies_BG (bicycle_id, supplier_id, supply_date, quantity) VALUES
(1, 1, '2025-01-10', 5),
(2, 2, '2025-01-15', 10),
(3, 1, '2025-01-20', 8);

INSERT INTO sales_BG (bicycle_id, customer_id, employee_id, sale_date, quantity, total_amount) VALUES
(1, 1, 2, '2025-01-12', 1, 1200.50),
(2, 2, 2, '2025-01-18', 2, 1900.00),
(3, 3, 3, '2025-01-22', 1, 750.75);

INSERT INTO maintenance_BG (bicycle_id, employee_id, maintenance_date, description, cost) VALUES
(1, 3, '2025-01-15', 'Brake adjustment and tire replacement', 50.00),
(2, 3, '2025-01-20', 'Gear tuning', 30.00);
