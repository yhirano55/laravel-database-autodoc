# Database Schema

## failed_jobs

| Field | Type | Null | Key | Default | Extra | Comment |
|:------|:-----|:-----|:----|:--------|:------|:--------|
| id | bigint(20) unsigned | NO | PRI |  | auto_increment |  |
| connection | text | NO |  |  |  |  |
| queue | text | NO |  |  |  |  |
| payload | longtext | NO |  |  |  |  |
| exception | longtext | NO |  |  |  |  |
| failed_at | timestamp | NO |  | CURRENT_TIMESTAMP |  |  |

## migrations

| Field | Type | Null | Key | Default | Extra | Comment |
|:------|:-----|:-----|:----|:--------|:------|:--------|
| id | int(10) unsigned | NO | PRI |  | auto_increment |  |
| migration | varchar(255) | NO |  |  |  |  |
| batch | int(11) | NO |  |  |  |  |

## users

| Field | Type | Null | Key | Default | Extra | Comment |
|:------|:-----|:-----|:----|:--------|:------|:--------|
| id | bigint(20) unsigned | NO | PRI |  | auto_increment |  |
| name | varchar(255) | NO |  |  |  |  |
| email | varchar(255) | NO | UNI |  |  |  |
| email_verified_at | timestamp | YES |  |  |  |  |
| password | varchar(255) | NO |  |  |  |  |
| remember_token | varchar(100) | YES |  |  |  |  |
| created_at | timestamp | YES |  |  |  |  |
| updated_at | timestamp | YES |  |  |  |  |

