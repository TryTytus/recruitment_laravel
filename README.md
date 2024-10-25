# API Endpoints
### Listowanie książek
- GET /books
- Opis: Zwraca listę książek z paginacją.
### Wyszukiwanie książek
- GET /search/books
- Opis: Wyszukuje książki według tytułu, autora lub klienta wypożyczającego.
### Szczegóły książki
- GET /books/{id}
- Opis: Zwraca szczegóły książki.
### Wypożyczanie książki
- PATCH /borrowBook/{book_id}
- Opis: Wypożycza książkę dla wybranego klienta.
### Zwrot książki
- PATCH /returnBook/{book_id}
- Opis: Zwraca książkę do biblioteki.
### Lista klientów
- GET /clients
- Opis: Zwraca listę klientów.
### Szczegóły klienta
- GET /clients/{id}
- Opis: Zwraca szczegóły klienta wraz z wypożyczonymi książkami.
### Dodawanie klienta
- POST /clients
- Opis: Dodaje nowego klienta.
### Usuwanie klienta
- DELETE /clients/{id}
- Opis: Usuwa klienta.
