<header>
    <h1 id="title"><?php print(ucwords($cnt['title'])); ?></h1>
    <div id="info">
        <div id="avatar"></div>
        <div id="info-wrapper">
            <div class="author"><?php print($cnt['author']); ?></div>
            <div><?php print(substr($cnt['date'], 0, 10)); ?></div>
        </div>
    </div>
</header>
<section id="content" class="markdown-body"><?php print(json_decode($cnt['content'])); ?></section>