<?php

/*Задача: Из созданной вами базы данных, необходимо получить список книг, которые написаны 3-мя соавторами.
То есть, получить отчет «книга — количество соавторов» и отсеять те, у которых соавторов меньше 3х.*/

use ...\...\Request //ПОЯСНЕНИЕ: Предположим, что где-то есть класс Request
use Models\Library\Book

class getBooks
{
    /**
     * Selection books by number Authors
     *
     * @param \ ... \Request $request
     * @param Models\Library\Book $book
     * @return array
     */
    public function getByNumberAuthors(Request $request, Book $book)
    {
        /*ПОЯСНЕНИЕ: Предположим, что в приложении одним из способов реализовано создание объекта Request со всеми данными запроса и уже создан объект Models\Library\Book к этому моменту*/
        /*ПОЯСНЕНИЕ: Либо можно прямо тут получить из $_GET нужный параметр, предварительно сделав проверку и создать объект Models\Library\Book*/
        $books = array();

        $search_number = $request->get['number'] ?? 1;

        //create array id_book => number_authors
        $numberAuthorsBook = array();
        $relationsAuthorBook = $book->getAuthorToBook(); /*ПОЯСНЕНИЕ: получим данные из таблицы 'author_to_book'*/
        foreach ($relationsAuthorBook as $item) {
            $id_book = $item['id_book'];
            $numberAuthorsBook[$id_book] = isset($numberAuthorsBook[$id_book]) ? $numberAuthorsBook[$id_book] + 1 : 1;
        }

        foreach ($numberAuthorsBook as $id_book => $number_authors) {
            if ($number_authors >= $search_number) {
                $book_info = $book->getBook($id_book); /*ПОЯСНЕНИЕ: получим данные о книге из таблицы 'book'*/
                $books[] = array(
                    'name'           => $book_info['name'],
                    'number_authors' => $number_authors
                );
            }
        }

        return $books;

        /*ПОЯСНЕНИЕ: писать запросы из Models\Library\Book не стал, так как они простые получаются :*/
    }

    /*ПОЯСНЕНИЕ: два других метода в рамках проекта, создал для наглядности, что они есть, без реализации*/
    /**
     * ...
     */
    public function getAll(...)
    {
        ...
    }

    /**
     * ...
     */
    public function getByAttributes(...)
    {
        ...
    }
}