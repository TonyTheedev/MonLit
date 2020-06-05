--dropping database
select pg_terminate_backend (pg_stat_activity.pid)
from pg_stat_activity
where pg_stat_activity.datname = 'pgluxedatabase';
drop database monlit_db
--

create database monlit_db

