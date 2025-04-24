# Book Management System


## Entities and Attributes

### Book
- `id` (big integer, primary key)
- `publisher_id` (unsigned big integer, foreign key → `publishers.id`)
- `title` (string)
- `description` (text)


### Author
- `id` (big integer, primary key)
- `country_id` (unsigned big integer, foreign key → `countries.id`)
- `name` (string)


### Genre
- `id` (big integer, primary key)
- `name` (string)


### Publisher
- `id` (big integer, primary key)
- `country_id` (unsigned big integer, foreign key → `countries.id`)
- `name` (string, unique)
- `email` (string, unique)


### Country
- `id` (big integer, primary key)
- `country_name` (string)
- `nationality` (string)
- `alpha2_code` (string, length 2)
- `alpha3_code` (string, length 3)


### Pivot Tables

#### author_book
- `id` (big integer, primary key)
- `book_id` (unsigned big integer, foreign key → `books.id`)
- `author_id` (unsigned big integer, foreign key → `authors.id`)


#### book_genre
- `id` (big integer, primary key)
- `book_id` (unsigned big integer, foreign key → `books.id`)
- `genre_id` (unsigned big integer, foreign key → `genres.id`)


## Relationships

1. **Books ↔ Authors** (Many-to-Many)
   - A book can have multiple authors.
   - An author can write multiple books.
   - Implemented via pivot table `author_book`.

2. **Books ↔ Genres** (Many-to-Many)
   - A book can belong to multiple genres.
   - A genre can include multiple books.
   - Implemented via pivot table `book_genre`.

3. **Publisher → Books** (One-to-Many)
   - A publisher can publish multiple books.
   - A book belongs to one publisher (via `publisher_id`).

4. **Country → Publishers** (One-to-Many)
   - A country can have multiple publishers based there.
   - A publisher belongs to one country (via `country_id`).

5. **Country → Authors** (One-to-Many)
   - A country can be the origin for multiple authors.
   - An author belongs to one country (via `country_id`).
---

