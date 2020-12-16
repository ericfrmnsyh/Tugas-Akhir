CREATE DATABASE Forum;

create table Forum.user
(
   user_username    char(12) not null,
   user_password    varchar(64) not null,
   user_email       varchar(100) not null,
   user_phone       varchar(15),
   primary key (user_username)
);

create table Forum.expert
(
   expert_username    char(12) not null,
   expert_password    varchar(64) not null,
   expert_email       varchar(100) not null,
   expert_phone       varchar(15),
   primary key (expert_username)
);

create table Forum.diskusi
(
   id_diskusi           int(7) not null auto_increment,
   user_username        char(12) not null,
   expert_username      char(12) not null,
   pertanyaan    	varchar(255) not null,
   tgl_bertanya         date not null,
   primary key (id_diskusi, user_username, expert_username)
);

create table Forum.menjawab
(
   id_diskusi           int(7) not null,
   user_username        char(12) not null,
   expert_username      char(12) not null,
   jawaban       	varchar(255) null,
   tgl_menjawab         date not null,
   primary key (id_diskusi, user_username, expert_username)
);

alter table Forum.diskusi add constraint FK_Bertanya foreign key (user_username)
      references Forum.user (user_username) on delete restrict on update cascade;

alter table Forum.diskusi add constraint FK_Menjawab foreign key (expert_username)
      references Forum.expert (expert_username) on delete restrict on update cascade;
