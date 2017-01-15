/*username: duczbase
Stanislaw Golebiewski, sgolebiewski@unibz.it
Kamil Idzikowski, kidzikowski@unibz.it*/

CREATE TABLE customer(
customer_id INTEGER PRIMARY KEY NOT NULL,
name VARCHAR(40),
phone VARCHAR(12),
address_street VARCHAR(40),
address_number VARCHAR(10),
address_postal_code VARCHAR(10),
address_city VARCHAR(20));

CREATE TABLE product(
product_id INTEGER PRIMARY KEY NOT NULL,
name VARCHAR(30),
category VARCHAR(30));

CREATE TABLE orders(
order_id INTEGER PRIMARY KEY NOT NULL,
customer_id INTEGER NOT NULL,
date DATE NOT NULL,
price DECIMAL(10,2) NOT NULL CHECK(price >= 0),
FOREIGN KEY(customer_id) REFERENCES customer(customer_id) ON DELETE CASCADE);

CREATE TABLE product_order(
order_id INTEGER NOT NULL, 
product_id INTEGER NOT NULL,
quantity INTEGER NOT NULL CHECK(quantity >= 0),
PRIMARY KEY(order_id, product_id),
FOREIGN KEY(order_id) REFERENCES orders(order_id) ON DELETE CASCADE,
FOREIGN KEY(product_id) REFERENCES product(product_id) ON DELETE CASCADE);

CREATE TABLE warehouse(
warehouse_id INTEGER PRIMARY KEY NOT NULL,
address_street VARCHAR(40),
address_number VARCHAR(10) ,
address_postal_code VARCHAR(10) ,
address_city VARCHAR(20) );

CREATE TABLE availability(
warehouse_id INTEGER NOT NULL,
product_id INTEGER NOT NULL,
/*we assume that location is determined which 3 letters and 2 numbers*/
location VARCHAR(5) NOT NULL CHECK(location SIMILAR TO '[A-Z][A-Z][A-Z][0-9][0-9]'),
quantity INTEGER NOT NULL CHECK(quantity >= 0),
PRIMARY KEY (warehouse_id, product_id),
FOREIGN KEY (warehouse_id) REFERENCES warehouse(warehouse_id) ON DELETE CASCADE,
FOREIGN KEY (product_id) REFERENCES product(product_id) ON DELETE CASCADE);

CREATE TABLE employee(
employee_id INTEGER PRIMARY KEY NOT NULL,
phone VARCHAR(12),
name VARCHAR(30));

CREATE TABLE account(
employee_id INTEGER NOT NULL,
login VARCHAR(20),
password VARCHAR(20),
permission VARCHAR(10) CHECK(permission IN ('MANAGER','PACKER','DRIVER')),
PRIMARY KEY (employee_id,login),
FOREIGN KEY(employee_id) REFERENCES employee(employee_id) ON DELETE CASCADE);

CREATE TABLE manager(
employee_id INTEGER NOT NULL PRIMARY KEY,
warehouse_id INTEGER,
FOREIGN KEY(employee_id) REFERENCES employee(employee_id) ON DELETE CASCADE,
FOREIGN KEY(warehouse_id) REFERENCES warehouse(warehouse_id));

CREATE TABLE packer(
employee_id INTEGER NOT NULL PRIMARY KEY,
warehouse_id INTEGER,
FOREIGN KEY(employee_id) REFERENCES employee(employee_id) ON DELETE CASCADE,
FOREIGN KEY(warehouse_id) REFERENCES warehouse(warehouse_id));

CREATE TABLE driver(
employee_id INTEGER NOT NULL,
/*new employee can have no car assigned, so there is no "NOT NULL" constrain*/
car_id INTEGER,
PRIMARY KEY(employee_id),
FOREIGN KEY(employee_id) REFERENCES employee(employee_id) ON DELETE CASCADE);

CREATE TABLE shipment(
shipment_id INTEGER PRIMARY KEY NOT NULL,
driver_id INTEGER,
warehouse_id INTEGER,
order_id INTEGER NOT NULL,
/*shipment can have six possible statuses*/
status VARCHAR(20) CHECK(status in ('PENDING APPROVAL','COMPLETING','DELIVERED','ON THE WAY','CANCELED')) NOT NULL,
delivery_date DATE,
FOREIGN KEY(driver_id) REFERENCES driver(employee_id),
FOREIGN KEY(warehouse_id) REFERENCES warehouse(warehouse_id) ON DELETE CASCADE,
FOREIGN KEY(order_id) REFERENCES orders(order_id) ON DELETE CASCADE);

CREATE TABLE packing_line(
packer_id INTEGER,
shipment_id INTEGER NOT NULL,
PRIMARY KEY (packer_id, shipment_id),
FOREIGN KEY(packer_id) REFERENCES packer(employee_id) ON DELETE CASCADE,
FOREIGN KEY(shipment_id) REFERENCES shipment(shipment_id) ON DELETE CASCADE);

CREATE TABLE product_shipment(
shipment_id INTEGER NOT NULL,
product_id INTEGER NOT NULL,
quantity INTEGER NOT NULL CHECK(quantity>0),
PRIMARY KEY(shipment_id, product_id),
FOREIGN KEY(shipment_id) REFERENCES shipment(shipment_id) ON DELETE CASCADE,
FOREIGN KEY(product_id) REFERENCES product(product_id) ON DELETE CASCADE);


