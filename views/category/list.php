<h1>Danh mục</h1>

<div>
    <?php foreach ($categories as $cate) : ?>
        <div>
            <?php echo $cate['cate_name'] ?>
        </div>
    <?php endforeach ?>
</div>