/*CUSTOMERS*/
INSERT INTO customer (customer_id, name, phone, address_street, address_number, address_postal_code, address_city)
  VALUES (1, 'Palaiologos', '+48390285723', 'Kwiatowa', '10023', '23-531', 'Radom');

INSERT INTO customer (customer_id, name, phone, address_street, address_number, address_postal_code, address_city)
  VALUES (2, 'Kantakouzinos', '+48190283941', 'Ziemniakowa', '132', '23-321', 'Radom');

INSERT INTO customer (customer_id, name, phone, address_street, address_number, address_postal_code, address_city)
  VALUES (3, 'Duczmal', '+48380153928', 'Janalowa', '56', '10-000', 'Krakow');

INSERT INTO customer (customer_id, name, phone, address_street, address_number, address_postal_code, address_city)
  VALUES (4, 'Janal', '+48591038592', 'Duczmalowa', '12', '98-231', 'Warszawka');


/*PRODUCTS*/
INSERT INTO product (product_id, name, category)
  VALUES (1, 'Saga tea', 'Groceries');

INSERT INTO product (product_id, name, category)
  VALUES (2, 'Lipton tea', 'Groceries');

INSERT INTO product (product_id, name, category)
  VALUES (3, 'Rake', 'Gardening');

INSERT INTO product (product_id, name, category)
  VALUES (4, 'Pitchfork', 'Gardening');

INSERT INTO product (product_id, name, category)
  VALUES (5, 'Lemon sprinkler', 'Kitchen utensils');


/*ORDERS*/
INSERT INTO orders (order_id, customer_id, date, price)
  VALUES (1, 1, '2016-10-12', 20.12);

INSERT INTO orders (order_id, customer_id, date, price)
  VALUES (2, 1, '2016-11-21', 41.23);

INSERT INTO orders (order_id, customer_id, date, price)
  VALUES (3, 2, '2016-11-09', 1.09);

INSERT INTO orders (order_id, customer_id, date, price)
  VALUES (4, 2, '2016-11-10', 100.98);

INSERT INTO orders (order_id, customer_id, date, price)
  VALUES (5, 2, '2016-11-30', 219944.23);

INSERT INTO orders (order_id, customer_id, date, price)
  VALUES (6, 4, '2016-12-05', 11.00);


/*PRODUCTS_ORDERS*/
INSERT INTO product_order (order_id, product_id, quantity)
  VALUES (1, 1, 21);

INSERT INTO product_order (order_id, product_id, quantity)
  VALUES (1, 5, 10);

INSERT INTO product_order (order_id, product_id, quantity)
  VALUES (2, 3, 6);

INSERT INTO product_order (order_id, product_id, quantity)
  VALUES (3, 4, 2);

INSERT INTO product_order (order_id, product_id, quantity)
  VALUES (3, 1, 12);

INSERT INTO product_order (order_id, product_id, quantity)
  VALUES (3, 5, 1);

INSERT INTO product_order (order_id, product_id, quantity)
  VALUES (4, 5, 1023);

INSERT INTO product_order (order_id, product_id, quantity)
  VALUES (5, 1, 100);

INSERT INTO product_order (order_id, product_id, quantity)
  VALUES (6, 5, 1);


/*EMPLOYEES*/
INSERT INTO employee (employee_id, phone, name)
  VALUES (1, '+48123456902', 'Spock');

INSERT INTO employee (employee_id, phone, name)
  VALUES (2, '+21420245039', 'Szkocik');

INSERT INTO employee (employee_id, phone, name)
  VALUES (3, '+10539538429', 'Kapitan');

INSERT INTO employee (employee_id, phone, name)
  VALUES (4, '+90533295821', 'Ben Aflek');

INSERT INTO employee (employee_id, phone, name)
  VALUES (5, '+41290432434', 'Danuta');

INSERT INTO employee (employee_id, phone, name)
  VALUES (6, '+90112842905', 'Takej');

INSERT INTO employee (employee_id, phone, name)
  VALUES (7, '+32591053923', 'Ryszard Lipton');

INSERT INTO employee (employee_id, phone, name)
  VALUES (8, '+15139020352', 'Doktor Kostek');


/*ACCOUNTS*/
INSERT INTO account (employee_id, login, password, permission)
  VALUES (1, 'synznieprawegoloza11', 'pudelko', 'MANAGER');

INSERT INTO account (employee_id, login, password, permission)
  VALUES (2, 'oszust42', 'jajka', 'MANAGER');

INSERT INTO account (employee_id, login, password, permission)
  VALUES (3, 'kapitan1001', 'bobo', 'DRIVER');

INSERT INTO account (employee_id, login, password, permission)
  VALUES (4, 'aflek432', 'duczmal', 'DRIVER');

INSERT INTO account (employee_id, login, password, permission)
  VALUES (5, 'danuta', 'janal', 'PACKER');

INSERT INTO account (employee_id, login, password, permission)
  VALUES (6, 'takej02', 'kotki043', 'PACKER');

INSERT INTO account (employee_id, login, password, permission)
  VALUES (7, 'liptonlipton', 'biegaj.jpg', 'PACKER');

INSERT INTO account (employee_id, login, password, permission)
  VALUES (8, 'doktor11', 'duczmaltojanal', 'PACKER');


/*WAREHOUSES*/
INSERT INTO warehouse (warehouse_id, address_street, address_number, address_postal_code, address_city)
  VALUES (1, 'Ananasowa', '23a', '32-214', 'Radom');
  
INSERT INTO warehouse (warehouse_id, address_street, address_number, address_postal_code, address_city)
  VALUES (2, 'Herbatnikowa', '182/B', '41-231', 'Warszawka');


/*AVAILABILITY*/
INSERT INTO availability (warehouse_id, product_id, location, quantity)
  VALUES (1, 1, 'AJO13', 1004);

INSERT INTO availability (warehouse_id, product_id, location, quantity)
  VALUES (1, 2, 'JOO21', 4239);

INSERT INTO availability (warehouse_id, product_id, location, quantity)
  VALUES (1, 3, 'CMO21', 1003);

INSERT INTO availability (warehouse_id, product_id, location, quantity)
  VALUES (1, 4, 'OMO90', 1500);

INSERT INTO availability (warehouse_id, product_id, location, quantity)
  VALUES (1, 5, 'OZP12', 0);

INSERT INTO availability (warehouse_id, product_id, location, quantity)
  VALUES (2, 1, 'CZM21', 1600);

INSERT INTO availability (warehouse_id, product_id, location, quantity)
  VALUES (2, 2, 'JMS05', 293);

INSERT INTO availability (warehouse_id, product_id, location, quantity)
  VALUES (2, 3, 'MOC93', 613);

INSERT INTO availability (warehouse_id, product_id, location, quantity)
  VALUES (2, 4, 'HUM04', 413);

INSERT INTO availability (warehouse_id, product_id, location, quantity)
  VALUES (2, 5, 'PUF51', 1835);


/*MANAGERS*/
INSERT INTO manager (employee_id, warehouse_id)
  VALUES (1, 1);

INSERT INTO manager (employee_id, warehouse_id)
  VALUES (2, 2);


/*DRIVERS*/
INSERT INTO driver (employee_id, car_id)
  VALUES (3, 1245);

INSERT INTO driver (employee_id, car_id)
  VALUES (4, 2214);


/*PACKER*/
INSERT INTO packer (employee_id, warehouse_id)
  VALUES (5, 1);

INSERT INTO packer (employee_id, warehouse_id)
  VALUES (6, 1);

INSERT INTO packer (employee_id, warehouse_id)
  VALUES (7, 2);

INSERT INTO packer (employee_id, warehouse_id)
  VALUES (8, 2);
  
/*SHIPMENTS*/
INSERT INTO shipment (shipment_id, driver_id, warehouse_id, order_id, status)
  VALUES (1, 3, 1, 1, 'PENDING APPROVAL');

INSERT INTO shipment (shipment_id, driver_id, warehouse_id, order_id, status)
  VALUES (2, 3, 1, 2, 'COMPLETING');

INSERT INTO shipment (shipment_id, driver_id, warehouse_id, order_id, status)
  VALUES (3, 4, 1, 3, 'COMPLETING');

INSERT INTO shipment (shipment_id, driver_id, warehouse_id, order_id, status)
  VALUES (4, 4, 2, 4, 'ON THE WAY');

INSERT INTO shipment (shipment_id, driver_id, warehouse_id, order_id, status)
  VALUES (5, 3, 2, 4, 'COMPLETING');

INSERT INTO shipment (shipment_id, driver_id, warehouse_id, order_id, status)
  VALUES (6, 4, 2, 5, 'ON THE WAY');

INSERT INTO shipment (shipment_id, driver_id, warehouse_id, order_id, status)
  VALUES (7, 3, 2, 6, 'ON THE WAY');

/*PACKING LINES*/
INSERT INTO packing_line (packer_id, shipment_id)
  VALUES (5, 1);

INSERT INTO packing_line (packer_id, shipment_id)
  VALUES (6, 1);

INSERT INTO packing_line (packer_id, shipment_id)
  VALUES (6, 2);

INSERT INTO packing_line (packer_id, shipment_id)
  VALUES (5, 3);

INSERT INTO packing_line (packer_id, shipment_id)
  VALUES (6, 3);

INSERT INTO packing_line (packer_id, shipment_id)
  VALUES (7, 4);

INSERT INTO packing_line (packer_id, shipment_id)
  VALUES (8, 5);

INSERT INTO packing_line (packer_id, shipment_id)
  VALUES (7, 5);

INSERT INTO packing_line (packer_id, shipment_id)
  VALUES (8, 6);

/*PRODUCT_SHIPMENT*/
INSERT INTO product_shipment (shipment_id, product_id, quantity)
  VALUES (1, 1, 21);

INSERT INTO product_shipment (shipment_id, product_id, quantity)
  VALUES (1, 5, 10);

INSERT INTO product_shipment (shipment_id, product_id, quantity)
  VALUES (2, 3, 6);

INSERT INTO product_shipment (shipment_id, product_id, quantity)
  VALUES (3, 4, 2);

INSERT INTO product_shipment (shipment_id, product_id, quantity)
  VALUES (3, 1, 12);

INSERT INTO product_shipment (shipment_id, product_id, quantity)
  VALUES (3, 5, 1);

INSERT INTO product_shipment (shipment_id, product_id, quantity)
  VALUES (4, 5, 500);

INSERT INTO product_shipment (shipment_id, product_id, quantity)
  VALUES (5, 5, 523);
  
INSERT INTO product_shipment (shipment_id, product_id, quantity)
  VALUES (6, 1, 100);

INSERT INTO product_shipment (shipment_id, product_id, quantity)
  VALUES (7, 5, 1);
