CREATE DATABASE chapinmarket;

\c chapinmarket

CREATE SCHEMA supermercado;
CREATE SCHEMA ventaCompra;

CREATE TABLE supermercado.sucursal(
    id VARCHAR(2) NOT NULL,
    Nombre VARCHAR(30) NOT NULL,
    NoCajas INT NOT NULL,
    NoBodegas INT NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE supermercado.producto(
    idP VARCHAR(5) NOT NULL,
    Nombre VARCHAR(25) NOT NULL,
    Precio DECIMAL(10,2) NOT NULL,
    Descripcion VARCHAR(100),
    PRIMARY KEY (idP)
);

CREATE TABLE supermercado.inventario(
    idi VARCHAR(5) NOT NULL,
    SucursalID VARCHAR(2) NOT NULL,
    ProductoID VARCHAR(5) NOT NULL,
    CantidadBodega INT NOT NULL,
    CantidadEstante INT,
    NumeroPasillo INT,
    PRIMARY KEY (idi),
    FOREIGN KEY (SucursalID) REFERENCES supermercado.sucursal(id),
    FOREIGN KEY (ProductoID) REFERENCES supermercado.producto(idP)
);

CREATE TABLE supermercado.empleados(
    ID VARCHAR(4) NOT NULL,
    Nombre VARCHAR(25) NOT NULL,
    Apellido VARCHAR(25) NOT NULL,
    Usuario VARCHAR(25) NOT NULL,
    contrasenia VARCHAR(10) NOT NULL,
    rol VARCHAR(15) NOT NULL,
    SucursalActual VARCHAR(2) NOT NULL,
    Caja INT,
    PRIMARY KEY(ID),
    FOREIGN KEY(SucursalActual) REFERENCES supermercado.sucursal(id)
);

 CREATE TABLE ventaCompra.cliente(
    Nombre VARCHAR(100) NOT NULL,
    NIT VARCHAR(8) NOT NULL,
    Telefono VARCHAR(8),
    Total DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (NIT)
 );

 CREATE TABLE ventaCompra.tarjeta(
    idTarjet VARCHAR(10) NOT NULL,
    TipoTarjeta VARCHAR(8) NOT NULL,
    puntos INT NOT NULL,
    Clienteid VARCHAR(15) NOT NULL,
    PRIMARY KEY (idTarjet),
    FOREIGN KEY(Clienteid) REFERENCES ventaCompra.cliente(NIT)
 );

 CREATE TABLE ventaCompra.Factura(
    NoFactura INT NOT NULL,
    NitCliente VARCHAR(8) NOT NULL,
    Fecha DATE NOT NULL,
    Cajeroid VARCHAR(4) NOT NULL,
    sucursalV VARCHAR(2) NOT NULL,
    TotalConDesc DECIMAL(10, 2) NOT NULL,
    TotalSinDesc DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY(NoFactura),
    FOREIGN KEY(sucursalV) REFERENCES supermercado.sucursal(id),
    FOREIGN KEY(Cajeroid) REFERENCES supermercado.empleados(ID),
    FOREIGN KEY(NitCliente) REFERENCES ventaCompra.cliente(NIT)

 );

 CREATE TABLE ventaCompra.venta(
    factura INT NOT NULL,
    ProductoID VARCHAR(5) NOT NULL,
    unidades INT NOT NULL,
    monto DECIMAL(10,2) NOT NULL,
    PRIMARY KEY(factura,ProductoID),
    FOREIGN KEY (factura) REFERENCES ventaCompra.Factura(NoFactura),
    FOREIGN KEY (ProductoID) REFERENCES supermercado.producto(idP)
 );

INSERT INTO supermercado.sucursal (id, Nombre, NoCajas, NoBodegas)
VALUES ('S1', 'Norte', 6, 2),
        ('S2', 'Sur', 5, 1),
        ('S3', 'Central', 7, 2);

 INSERT INTO supermercado.empleados (ID, Nombre, Apellido, Usuario, contrasenia, rol, SucursalActual)
VALUES ('01', 'Alan', 'Morales', 'admin', '1234', 'Administrador', 'S1');
--S1
 INSERT INTO supermercado.empleados (ID, Nombre, Apellido, Usuario, contrasenia, rol, SucursalActual, Caja)
VALUES ('S111', 'Juan', 'Perez','JuanP','Juan123', 'Cajero','S1', 1),
        ('S112', 'Ana', 'Rodriguez', 'AnaR', 'Ana123', 'Cajero', 'S1', 2),
        ('S113', 'Carlos', 'Sanchez', 'CarlosS', 'Carlos123', 'Cajero', 'S1', 3),
        ('S114', 'Laura', 'Garcia', 'LauraG', 'Laura123', 'Cajero', 'S1',4),
        ('S115', 'Jose','Lopez', 'JoseL', 'Jose123', 'Cajero', 'S1',5),
        ('S116', 'Maria', 'Martinez', 'MariaM', 'Maria123', 'Cajero', 'S1', 6);
        --Inventario
 INSERT INTO supermercado.empleados (ID, Nombre, Apellido, Usuario, contrasenia, rol, SucursalActual)
VALUES ('S117', 'Javier', 'Fernandez', 'JavierF', 'Javier123','Inventario', 'S1'),
        ('S118', 'Sofia', 'Gonzalez', 'SofiaG', 'Sofia123', 'Inventario', 'S1'),
        ('S119', 'Luis', 'Torres', 'LuisT', 'Luis123', 'Inventario', 'S1'),
        ('S120', 'Paula','Ruiz', 'PaulaR', 'Paula123', 'Inventario','S1'),
        --Bodega      
        ('S121', 'Alejandro', 'Ramirez', 'AlejandroR','Alejan123','Bodega', 'S1');

--S2
 INSERT INTO supermercado.empleados (ID, Nombre, Apellido, Usuario, contrasenia, rol, SucursalActual, Caja)
VALUES ('S211', 'Carmen', 'Morales','CarmenM','Carmen456', 'Cajero','S2', 1),
        ('S212', 'Manuel', 'Castro', 'Manuel', 'Manuel456', 'Cajero', 'S2', 2),
        ('S213', 'Marta', 'Jimenez', 'MartaJ', 'Marta456', 'Cajero', 'S2', 3),
        ('S214', 'Pedro', 'Ortiz', 'PerdroO', 'Pedro456', 'Cajero', 'S2',4),
        ('S215', 'Raquel','Silva', 'RaquelS', 'Raquel465', 'Cajero', 'S2',5),
        ('S216', 'Daniel', 'Vargas', 'DanielV', 'Daniel456', 'Cajero', 'S2', 3);
        --Inventario
 INSERT INTO supermercado.empleados (ID, Nombre, Apellido, Usuario, contrasenia, rol, SucursalActual)
VALUES ('S217', 'Adriana', 'Herrera', 'AdrianaH', 'Adriana456','Inventario', 'S2'),
        ('S218', 'Sergio', 'Navarro', 'SergioN', 'Sergio456', 'Inventario', 'S2'),
        ('S219', 'Isabel', 'Mendoza', 'IsabelM', 'Isabel456', 'Inventario', 'S2'),
        ('S220', 'Gabriela','Gonzales', 'GabrielaG', 'Gaby456', 'Inventario','S2'),
        --Bodega      
        ('S221', 'Andres', 'Perez', 'AndresP','Andres456','Bodega', 'S2');


INSERT INTO supermercado.empleados (ID, Nombre, Apellido, Usuario, contrasenia, rol, SucursalActual, Caja)
VALUES ('S311', 'Patricia', 'Rodriguez','PatriciaR','Pati789', 'Cajero','S3', 1),
        ('S312', 'Francisco', 'Torres', 'FranciscoT', 'Frans789', 'Cajero', 'S3', 2),
        ('S313', 'Carolina', 'Lopez', 'CarolinaL', 'Carol789', 'Cajero', 'S3', 3),
        ('S314', 'Ricardo', 'Ruiz', 'RicardoR', 'Ricardo789', 'Cajero', 'S3',4),
        ('S315', 'Elena','Fernandez', 'ElenaF', 'Elena789', 'Cajero', 'S3',5),
        ('S316', 'Antonio', 'Morales', 'AntorioM', 'Antonio789', 'Cajero', 'S3', 2);
        --Inventario
 INSERT INTO supermercado.empleados (ID, Nombre, Apellido, Usuario, contrasenia, rol, SucursalActual)
VALUES ('S317', 'Silvia', 'Sanchez', 'SilviaS', 'Silvia789','Inventario', 'S3'),
        ('S318', 'Diego', 'Martinez', 'DiegoM', 'Diego789', 'Inventario', 'S3'),
        ('S319', 'Beatriz', 'Medina', 'BeatrizM', 'Beatriz789', 'Inventario', 'S3'),
        ('S320', 'Sergio','Rodriguez', 'SergioR', 'Sergio789', 'Inventario','S3'),
        --Bodega      
        ('S321', 'Rafael', 'Castillo', 'RafaelC','Rafael789','Bodega', 'S3');

INSERT INTO ventaCompra.cliente (Nombre, NIT, Telefono, Total)
VALUES ('Juan Pérez', '12345678', '55555555', 1000.00),
        ('Ana Rodríguez', '87654321', '66666666', 1500.50),
        ('Carlos Sánchez', '23456789', '77777777', 800.75),
        ('Laura García', '34567890', '88888888', 2000.00),
        ('José López', '45678901', '99999999', 1200.25),
        ('María Martínez', '56789012', '11111111', 1600.75),
        ('Javier Fernández', '67890123', '22222222', 900.50),
        ('Sofia González', '78901234', '33333333', 1750.00);
   /*********************************  
   * PRODUCTOS
 ***********************************/
INSERT INTO supermercado.producto (idP, Nombre, Precio, Descripcion)
VALUES
    ('P1001', 'Arroz', 5.99, 'Arroz de grano largo, 1 kg'),
    ('P1002', 'Leche', 2.49, 'Leche entera, 1 litro'),
    ('P1003', 'Pan', 1.99, 'Pan blanco fresco'),
    ('P1004', 'Manzanas', 0.75, 'Manzanas frescas, 1 kg'),
    ('P1005', 'Pasta', 1.29, 'Pasta de trigo, 500g'),
    ('P1006', 'Aceite de Oliva', 8.99, 'Aceite de oliva virgen extra, 1 litro'),
    ('P1007', 'Huevos', 2.99, 'Huevos frescos, docena'),
    ('P1009', 'Cerveza', 3.49, 'Cerveza lager, 6 pack'),
    ('P1010', 'Lavadora', 5000.00, 'Lavadora de carga frontal de 7 kg.'),
    ('P1011', 'Refrigerador', 5100.00, 'Refrigerador de dos puertas con capacidad de 500 litros.'),
    ('P1012', 'Estufa', 1600.00, 'Estufa de gas de 6 quemadores y horno eléctrico.'),
    ('P1013', 'Secadora', 4290.00, 'Secadora eléctrica de carga frontal de 8 kg.'),
    ('P1014', 'Horno', 450.00, 'Horno eléctrico de acero inoxidable.'),
    ('P1015', 'Microondas', 650.00, 'Microondas de 1000 watts con función de grill.'),
    ('P1016', 'Licuadora', 580.00, 'Licuadora de 10 velocidades con vaso de vidrio.'),
    ('P1017', 'Batidora', 690.00, 'Batidora de mano de 5 velocidades con accesorios.'),
    ('P1018', 'Tostadora', 350.00, 'Tostadora de 2 rebanadas con función de descongelamiento.'),
    ('P1019', 'Cafetera', 580.00, 'Cafetera de cápsulas con depósito de agua de 2 litros.'),
    ('P1020', 'Aspiradora', 4500.00, 'Aspiradora sin cable con tecnología Cyclone.'),
    ('P1021', 'Plancha', 220.00, 'Plancha de vapor con suela de cerámica.'),
    ('P1022', 'Ventilador', 465.00, 'Ventilador de torre con control remoto.'),
    ('P1023', 'Refrigerador', 12000.00, 'Refrigerador de dos puertas con capacidad de 700 litros.'),
    ('P1024', 'Deshumidificador', 1600.00, 'Deshumidificador portátil de 70 pintas.'),
    ('P1025', 'Calefactor', 495.00, 'Calefactor eléctrico con termostato programable.'),
    ('P1026', 'Cafetera', 490.00, 'Cafetera de cápsulas con depósito de agua de 5 litros.'),
    ('P1027', 'Microondas', 835.00, 'Microondas de 1000 watts.'),
    ('P1028', 'Cafetera express', 649.00, 'Cafetera express de acero inoxidable.'),
    ('P1029', 'Estufa', 1500.00, 'Estufa de gas de 6 quemadores.'),
    ('P1030', 'Licuadora', 470.00, 'Licuadora personal de 900 watts con vasos portátiles.'),
    ('P1031', 'Plancha de pelo', 540.00, 'Plancha de pelo profesional de cerámica.'),
    ('P1032', 'Batidora de mano', 575.00, 'Batidora de mano de 3 velocidades con accesorios.'),
    ('P1033', 'Vaporera', 325.00, 'Vaporera eléctrica de acero inoxidable.'),
    ('P1034', 'Lavavajillas', 3490.00, 'Lavavajillas de 60 cm con sistema de secado automático'),
    ('P1035', 'Horno', 475.00, 'Horno eléctrico con sistema de limpieza automática'),
    ('P1036', 'Aspiradora', 5140.00, 'Aspiradora sin cable con tecnología ciclónica'),
    ('P1037', 'Plancha', 265.00, 'Plancha de vapor con tecnología OptimalTEMP'),
    ('P1038', 'Estufa eléctrica', 7350.00, 'Estufa eléctrica de aceite con termostato regulable'),
    ('P1039', 'Licuadora', 265.00, 'Licuadora con jarra de cristal y 2 velocidades');

/***********************************
 * INVENTARIO
 ***********************************/


 INSERT INTO supermercado.inventario 
 VALUES ('1', 'S1', 'P1001', 75),
        ('2', 'S1', 'P1002', 85),
        ('3', 'S1', 'P1003', 100),
        ('4', 'S1', 'P1004', 85),
        ('5', 'S1', 'P1005', 10);



 INSERT INTO supermercado.inventario 
 VALUES ('6', 'S2', 'P1001', 75),
        ('7', 'S2', 'P1002', 85),
        ('8', 'S2', 'P1003', 100),
        ('9', 'S2', 'P1004', 85),
        ('10', 'S2', 'P1005', 10);

        
 INSERT INTO supermercado.inventario 
 VALUES ('11', 'S3', 'P1001', 75),
        ('12', 'S3', 'P1002', 85),
        ('13', 'S3', 'P1003', 100),
        ('14', 'S3', 'P1004', 85),
        ('15', 'S3', 'P1005', 10);

        /*
        FACTURA
        */

INSERT INTO ventaCompra.Factura 
        VALUES (1, '12345678', '29/09/2023', 'S211', 'S2', 5000.00, 0.00);        


INSERT INTO ventaCompra.venta 
        VALUES(1, 'P1001', 4, 300.00),
                (1, 'P1002', 5, 200.00),
                (1, 'P1003', 5, 700.00);

INSERT INTO ventaCompra.venta VALUE