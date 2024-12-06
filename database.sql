CREATE TABLE product (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT DEFAULT NULL,
    size INTEGER NOT NULL
);

CREATE INDEX product_name_idx ON product(name);

INSERT INTO product (name, description, size) VALUES
('Product One', NULL, 10),
('Product Two', 'example', 20);