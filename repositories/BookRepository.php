<?php

namespace repositories;

use mysqli;

class BookRepository
{
    public static function all(mysqli $db)
    {
        return $db->query("select id, name, type_id, price, rating, image from book")
            ->fetch_all(MYSQLI_ASSOC);
    }

    public static function fiction(mysqli $db): array
    {
        return self::getBooksByType($db, 'fiction');
    }

    public static function education(mysqli $db): array
    {
        return self::getBooksByType($db, 'education');
    }

    public static function comic(mysqli $db): array
    {
        return self::getBooksByType($db, 'comic');
    }

    protected static function getBooksByType(mysqli $db, string $type): array
    {
        $stmt = $db->prepare("select id, name, type_id, price, rating, image from book where book.type_id = ?");
        $stmt->bind_param("s", $type);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }


    // $data contains keys ['id', 'name', 'price', 'rating', 'book_type']
    public static function createOrUpdate(mysqli $db, array $data): int|string
    {
        $sql = "insert into book (id, name, price, rating, type_id) values(?, ?, ?, ?, ?) on duplicate key update name=?, price=?, rating=?, type_id=?;";
        $db->prepare($sql)->execute([
            $data['id'], $data['name'], $data['price'], $data['rating'], $data['book_type'],
            $data['name'], $data['price'], $data['rating'], $data['book_type'],
        ]);
        return $db->insert_id;
    }

    public static function getById(mysqli $db, int $id): array
    {
        $stmt = $db->prepare("select book.id, book.name, type_id, 
                    price, rating, image, bt.name as book_type_name 
                from book
                    join book_type bt on book.type_id = bt.id
                where book.id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function delete(mysqli $db, int $id) : bool
    {
        return $db->prepare("delete from users where id = ?")
            ->execute([$id]);
    }
}