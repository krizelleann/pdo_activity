CREATE TABLE IF NOT EXISTS attendances (
    id INT AUTO_INCREMENT PRIMARY KEY,
    attendee_name VARCHAR(100),
    concert_date DATE,
    ticket_type VARCHAR(50),
    price DECIMAL(10,2),
    seat_number VARCHAR(10)
);


INSERT INTO attendances (attendee_name, concert_date, ticket_type, price, seat_number)
VALUES
('Jezrel mae', '2026-06-15', 'VIP', 150.00, 'A5'),
('Park Jimin', '2026-06-16', 'VIP', 150.00, 'A2'),
('Lara Jones', '2026-06-20', 'VIP', 200.00, 'A5'),
('Charlie Puth', '2026-06-21', 'General', 80.00, 'C12'),
('Oliver Moy', '2026-06-17', 'General', 75.00, 'C10'),
('Krizelle Ann', '2026-06-15', 'General', 75.00, 'B14');
