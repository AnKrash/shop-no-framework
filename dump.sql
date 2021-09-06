CREATE database app;
USE app;

create table product_types
(
    id   int primary key auto_increment,
    name varchar(255) unique not null
);

create table products
(
    id              int         not null primary key auto_increment,
    sku             varchar(20) not null,
    name            varchar(20) not null,
    price           int         not null,
    product_type_id int         not null,
    size            int         null,
    height          int         null,
    width           int         null,
    length          int         null,
    weight          int         null
);

alter table products
    add constraint products_product_types__fk
        foreign key (product_type_id) references product_types (id);

insert into product_types (id, name) VALUES (1,'DVD'),(2,'Furniture'),(3,'Book');
