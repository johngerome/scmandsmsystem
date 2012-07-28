<?php foreach ($books as $books_item): ?>

    <h2><?php echo $books_item['book_name'] ?></h2>
    <div id="main">
        <?php echo $books_item['price'] ?>
    </div>
    <p><a href="books/<?php echo $books_item['book_id'] ?>">read More..</a></p>

<?php endforeach ?>