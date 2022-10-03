FROM mysql:8

COPY new_dump.sql /docker-entrypoint-initdb.d

CMD [ "mysqld", "--init-file=/docker-entrypoint-initdb.d/new_dump.sql" ]