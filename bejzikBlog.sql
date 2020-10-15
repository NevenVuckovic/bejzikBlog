-- create table posts (
--     id int primary key auto_increment,
--     title varchar(30) not null,
--     body varchar(1000) not null,
--     author varchar(20) not null,
--     created_at DATETIME NOT NULL DEFAULT NOW()
-- )

-- insert into posts (title, body, author) values 
--     ('Prvi Naslov', 'loremipsum', 'Lj. Ipsumovic'),
--     ('Drugi Naslov', 'loremipsumloremispum', 'Ljore I.'),
--     ('treci Naslov', 'loremipsumloremispumloremipsum', 'Lj.I.')

-- create table comments (
--     id int primary key auto_increment,
--     author varchar(20) not null default 'anon',
--     text varchar(500) not null,
--     post_id int not null,
--     FOREIGN KEY(post_id) REFERENCES posts(id)
-- )

-- insert into comments (author, text, post_id) values 
--     ('bukovski', 'lorem ipsumem', 2),
--     ('kinaski', 'ipsumem lorem', 2),
--     ('andric', 'drina', 1)