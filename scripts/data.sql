
insert into news (title, content, created_date)
Values ('Title: Ipsum', 
'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed gravida malesuada erat. Donec sed lectus. Aliquam bibendum fermentum dolor. Curabitur nisl nunc, porttitor et, convallis vitae, fringilla id, lacus. Etiam tempor rutrum turpis. Fusce sed velit. Aenean justo. Aenean nisi mauris, porttitor ac, posuere a, semper eget, lectus. Morbi pretium, odio ac gravida iaculis, enim orci fermentum odio, ac faucibus ligula eros vel diam. Integer volutpat varius mi. Vivamus sapien lorem, tincidunt quis, fermentum a, commodo vitae, pede.

Integer imperdiet felis vitae enim. Donec ac mi. Phasellus id metus. Proin est. Ut vitae metus vitae nibh sollicitudin suscipit. Morbi pellentesque, sapien et luctus molestie, nisl turpis tincidunt lacus, a ullamcorper diam felis sed risus. Sed porttitor quam. Quisque mollis arcu at mi tincidunt molestie. Curabitur imperdiet pharetra odio. Pellentesque euismod rutrum felis. Duis et arcu. Vestibulum viverra ante et mi. Nulla interdum neque sed lorem. Vestibulum blandit augue a dolor. Nam lorem felis, pellentesque nec, molestie eu, sagittis ac, ante. Nulla facilisi.

Aliquam et lectus ut ante sodales gravida. Nam mauris turpis, mollis vulputate, lobortis faucibus, fringilla non, lacus. Pellentesque vitae tortor. Mauris mollis faucibus justo. Sed at lacus ut est gravida aliquet. Curabitur blandit, lectus eu venenatis imperdiet, metus orci dictum arcu, sed viverra elit felis non lorem. Proin orci. Aenean consequat, tortor quis malesuada vehicula, enim elit pellentesque metus, ac bibendum eros metus ac augue. Morbi placerat tempor lacus. In nec nulla sed augue tincidunt suscipit. Morbi sit amet nulla eget eros rhoncus pulvinar. Curabitur sodales tellus id libero. In eu dui. Phasellus ultricies sollicitudin quam. Nulla nec neque. Vestibulum elementum dolor.

Vestibulum eu felis eget metus sollicitudin varius. Duis nibh. Sed risus. Suspendisse nec mi eget enim feugiat tempor. Mauris neque. Fusce diam nisl, volutpat quis, fringilla sit amet, lacinia pellentesque, erat. Mauris malesuada accumsan ante. Pellentesque vel lorem. Suspendisse potenti. Curabitur a nisl et augue egestas semper. Suspendisse in nulla. Nullam eros est, dictum id, porttitor nec, convallis eget, augue. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.

Donec congue tristique nulla. Sed justo. Morbi luctus, ante a pellentesque lobortis, pede metus cursus erat, sit amet suscipit erat orci non urna. Donec venenatis eleifend libero. Sed accumsan volutpat lectus. Nam eleifend. Donec semper ultricies justo. In auctor lacus non massa fermentum ullamcorper. Suspendisse pulvinar metus in ligula. Sed tempor eros et nunc. Maecenas nec purus. Nunc porta enim nec neque. Praesent quis odio at nulla vulputate rhoncus. Fusce tristique mollis justo.',
'2008-11-16 18:14:00');

insert into mercenary_group values ('sword', 'Sword');
insert into mercenary_group values ('axe', 'Axe');
insert into mercenary_group values ('staff', 'Staff');
insert into mercenary_group values ('spear', 'Spear');
insert into mercenary_group values ('bow', 'Bow');
insert into mercenary_group values ('gun', 'Gun');
insert into mercenary_group values ('cannon', 'Cannon');

insert into mercenary values ('swordsman', 'Swordsman', 340, 240, 400, 130, 250, 125, null, 'sword');
insert into mercenary values ('viking', 'Viking', 330, 110, 280, 140, 310, -50, null, 'axe');
insert into mercenary values ('monk', 'Monk', 190, 140, 150, 260, 160, 500, null, 'staff');
insert into mercenary values ('shaman', 'Shaman', 150, 130, 180, 230, 150, 450, null, 'staff');
insert into mercenary values ('witch', 'Witch', 120, 250, 150, 280, 180, 500, null, 'staff');
insert into mercenary values ('exorcist', 'Exorcist', 290, 170, 260, 240, 240, 285, null, 'sword');
insert into mercenary values ('beast_trainer', 'Beast Trainer', 280, 170, 800, 160, 290, 175, null, 'axe');
insert into mercenary values ('spearman', 'Spearman', 310, 210, 330, 120, 240, 110, null, 'spear');
insert into mercenary values ('gunner', 'Gunner', 150, 220, 180, 220, 170, 225, null, 'gun');
insert into mercenary values ('archer', 'Archer', 160, 220, 180, 230, 140, 250, null, 'bow');
insert into mercenary values ('prophet', 'Prophet', 170, 210, 200, 240, 190, 450, null, 'bow');
insert into mercenary values ('artilleryman', 'Artilleryman', 200, 160, 200, 220, 210, 275, null, 'cannon');
insert into mercenary values ('lady_knight', 'Lady Knight', 370, 260, 750, 160, 280, 145, null, 'sword');
insert into mercenary values ('princess', 'Princess', 150, 130, 180, 300, 180, 475, null, 'staff');
insert into mercenary values ('oracle', 'Oracle', 170, 150, 250, 250, 170, 500, null, 'staff');
insert into mercenary values ('spartan', 'Spartan', 341, 220, 363, 122, 244, 100, null, 'spear');
insert into mercenary values ('inventor', 'Inventor', 160, 240, 200, 275, 190, 400, null, 'gun');
insert into mercenary values ('janissary', 'Janissary', 157, 247, 198, 225, 173, 225, null, 'gun');
insert into mercenary values ('cannoneer', 'Cannoneer', 230, 190, 220, 240, 225, 280, null, 'cannon');

insert into skill values ('sword', 'Sword');
insert into skill values ('spear', 'Spear');
insert into skill values ('axe', 'Axe');
insert into skill values ('bow', 'Bow');
insert into skill values ('gun', 'Gun');
insert into skill values ('cannon', 'Cannon');
insert into skill values ('staff', 'Staff');
insert into skill values ('helmet', 'Helmet');
insert into skill values ('armor', 'Armor');
insert into skill values ('pants', 'Pants');
insert into skill values ('gauntlet', 'Gauntlet');
insert into skill values ('shoes', 'Shoes');
insert into skill values ('shield', 'Shield');
insert into skill values ('orb', 'Orb');
insert into skill values ('arrow', 'Arrow');
insert into skill values ('bullet', 'Bullet');
insert into skill values ('cannonball', 'Cannonball');
insert into skill values ('food', 'Food');
insert into skill values ('medicine', 'Medicine');
insert into skill values ('ring', 'Ring');
insert into skill values ('machine', 'Machine');
insert into skill values ('building', 'Building');
insert into skill values ('crystal', 'Crystal');
insert into skill values ('action', 'Action');
insert into skill values ('license', 'License');
insert into skill values ('manastone', 'Mana Stone');
insert into skill values ('charm', 'Charm');
insert into skill values ('tool', 'Tool');
insert into skill values ('fishing', 'Fishing');
insert into skill values ('stationary', 'Stationary');
insert into skill values ('book', 'Book');
insert into skill values ('sewing', 'Sewing');
insert into skill values ('scroll', 'Scroll');
insert into skill values ('quest', 'Quest');

insert into resource_category ('action', 'Action');
insert into resource_category ('armor', 'Armor');
insert into resource_category ('arrow', 'Arrow');
insert into resource_category ('axe', 'Axe');
insert into resource_category ('book', 'Book');
insert into resource_category ('bow', 'Bow');
insert into resource_category ('box', 'Box');
insert into resource_category ('building', 'Building');
insert into resource_category ('bullet', 'Bullet');
insert into resource_category ('cannon', 'Cannon');
insert into resource_category ('cannonball', 'Cannonball');
insert into resource_category ('charm', 'Charm');
insert into resource_category ('crystal', 'Crystal');
insert into resource_category ('culturalasset', 'Cultural Asset');
insert into resource_category ('element', 'Element');
insert into resource_category ('cannon', 'Cannon');
insert into resource_category ('cannon', 'Cannon');
insert into resource_category ('cannon', 'Cannon');
insert into resource_category ('cannon', 'Cannon');
insert into resource_category ('cannon', 'Cannon');
insert into resource_category ('cannon', 'Cannon');
insert into resource_category ('cannon', 'Cannon');
insert into resource_category ('cannon', 'Cannon');
insert into resource_category ('cannon', 'Cannon');
insert into resource_category ('cannon', 'Cannon');

insert into resource (id, name, fixedprice) values (1,'Copper Flakes',100);
insert into resource (id, name, fixedprice) values (2,'Maple',100);
insert into resource (id, name, fixedprice) values (3,'Coral',100);
insert into resource (id, name, fixedprice) values (4,'Pearl',500);
insert into resource (id, name, fixedprice) values (5,'Iron Sand',150);
insert into resource (id, name, fixedprice) values (6,'Jade',500);
insert into resource (id, name, fixedprice) values (7,'Earth Element Shard',100);
insert into resource (id, name, fixedprice) values (8,'Charcoal',400);
insert into resource (id, name, fixedprice) values (9,'Refined Iron Ore',1000);
insert into resource (id, name, fixedprice) values (10,'Copper Ore',300);
insert into resource (id, name, fixedprice) values (11,'Crystal',1000);
insert into resource (id, name, fixedprice) values (12,'Common Leather',300);
insert into resource (id, name, fixedprice) values (13,'Embroidery Thread',300);
insert into resource (id, name, fixedprice) values (14,'Oak',300);
insert into resource (id, name, fixedprice) values (15,'Sea Element Shard',1000);
insert into resource (id, name, fixedprice) values (16,'Gold Ore',1350);
insert into resource (id, name, fixedprice) values (17,'Silver Ore',900);
insert into resource (id, name, fixedprice) values (18,'Fusing Agent',2000);
insert into resource (id, name, fixedprice) values (19,'Warrior''s Sign',200000);
insert into resource (id, name, fixedprice) values (20,'Still-Beating Heart',140000);
insert into resource (id, name, fixedprice) values (21,'Refined Iron Ingot',5000);
insert into resource (id, name, fixedprice) values (22,'Thick Animal Bone',6500);
insert into resource (id, name, fixedprice) values (23,'Copper Ingot',500);
insert into resource (id, name, fixedprice) values (24,'Silver Ingot',1500);
insert into resource (id, name, fixedprice) values (25,'Platinum Ore',600);
insert into resource (id, name, fixedprice) values (26,'Emerald',5000);
insert into resource (id, name, fixedprice) values (27,'Pine',500);
insert into resource (id, name, fixedprice) values (28,'Flame Element Shard',400);
insert into resource (id, name, fixedprice) values (29,'Coal',1000);

--insert into craftable (name, skill, experience, minlevel, batchsize, workload) values ('Spirit Axe', 'axe', ?, 1, 1, 450);
--insert into craftable (name, skill, experience, minlevel, batchsize, workload) values ('Ocean Axe', 'axe', ?, 4, 1, 2800);
--insert into craftable (name, skill, experience, minlevel, batchsize, workload) values ('Rakshasa Axe', 'axe', ?, 9, 1, 9200);
--insert into craftable (name, skill, experience, minlevel, batchsize, workload) values ('Destroyer Axe', 'axe', ?, 15, 1, 25300);
--insert into craftable (name, skill, experience, minlevel, batchsize, workload) values ('Walachia Axe', 'axe', ?, 23, 1, 69600);
--insert into craftable (name, skill, experience, minlevel, batchsize, workload) values ('Blood Knight Axe', 'axe', ?, 28, 1, 125200);
--insert into craftable (name, skill, experience, minlevel, batchsize, workload) values ('Anu Warrior Axe', 'axe', ?, 32, 1, 191400);
--insert into craftable (name, skill, experience, minlevel, batchsize, workload) values ('Gilgamesh Axe', 'axe', ?, 35, 1, 287100);
