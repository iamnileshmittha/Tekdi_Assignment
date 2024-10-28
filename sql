CREATE TABLE Employee (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    address VARCHAR(255) UNIQUE NOT NULL,
    phone VARCHAR(15) UNIQUE NOT NULL, -- Use VARCHAR for phone numbers
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Employee (name, email, address, phone, password)
VALUES ('John Doe', 'john.doe@example.com', '123 Main St, Anytown, USA', '123-456-7890', 'securepassword123');

select * from Employee;
