CREATE DATABASE Forum;

create table Forum.user
(
   username    char(12) not null,
   password    varchar(64) not null,
   email       varchar(100) not null,
   phone       varchar(15),
   primary key (username)
);

create table Forum.expert
(
   username    char(12) not null,
   password    varchar(64) not null,
   email       varchar(100) not null,
   phone       varchar(15),
   primary key (username)
);

create table Forum.diskusi
(
   ID            	int(7) not null auto_increment,
   username_user        char(12) not null,
   username_expert      char(12) not null,
   pertanyaan    	varchar(255) not null,
   jawaban       	varchar(255) null,
   TGL_KEMBALI          date not null,
   primary key (ID, username_user, username_expert)
);

alter table Forum.diskusi add constraint FK_Bertanya foreign key (username_user)
      references Forum.user (username) on delete restrict on update cascade;

alter table Forum.diskusi add constraint FK_Menjawab foreign key (username_expert)
      references Forum.expert (username) on delete restrict on update cascade;
