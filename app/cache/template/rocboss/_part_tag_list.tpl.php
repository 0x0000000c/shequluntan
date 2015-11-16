
<ul>
    <?php if(is_array($list)) foreach($list as $t) { ?>
    <li class="topic-item">
        <div class="posts-group cf">

            <div class="topic-url">
                <a class="post-url" href="<?php echo $root ?>tag/<?php echo $t['tagname'] ?>" title="<?php echo $t['tagname'] ?>">
                    <?php echo $t['tagname'] ?>
                </a>
            </div>
        </div>
        <a class="topic-link" href="<?php echo $root ?>read/<?php echo $t['tid'] ?>" target="_blank"></a>
    </li>
    <?php } ?>
</ul>
<div id="pager">
    <?php if ($list == array() ) { ?>
        暂无数据
    <?php }else{ ?>
        <?php echo $page ?>
    <?php } ?>
</div>
