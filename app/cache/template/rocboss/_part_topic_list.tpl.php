
<ul>
    <?php if(is_array($topicArray)) foreach($topicArray as $t) { ?>
    <li class="topic-item">
        <div class="posts-group cf">
            <div class="upvote ">
                <a class="upvote-link vote-up" href="<?php echo $root ?>read/<?php echo $t['tid'] ?>" title="<?php echo $t['praiseArray']['count'] ?>人觉得很赞">
                    <i class="icon icon-appreciatefill x2<?php if ($t['praiseArray']['myPraise'] == 1) { ?> vote-selected<?php } ?>"></i>
                    <span class="vote-count">
                        <?php echo $t['praiseArray']['count'] ?>
                    </span>
                </a>
            </div>
            <div class="topic-url">
                <a class="post-url" href="<?php echo $root ?>read/<?php echo $t['tid'] ?>" title="<?php echo $t['title'] ?>">
                    <?php echo $t['title'] ?>
                </a>
                <span class="post-tagline">
                    <?php if (isset($t['istop']) && $t['istop'] > 0) { ?>
                        <span class="toping" title="置顶"><i class="icon icon-locationfill x1"></i></span>
                    <?php } ?>
                    <?php if (isset($t['hasPictures']) && $t['hasPictures'] == true ) { ?>
                        <span class="picturing" title="图片"><i class="icon icon-camerafill x1"></i></span>
                    <?php } ?>
                    <?php if ($t['tagArray'] != array()) { ?>
                        <?php if(is_array($t['tagArray'])) foreach($t['tagArray'] as $tagName) { ?>
                            <a href="<?php echo $root ?>tag/<?php echo $tagName ?>" class="tag"><?php echo $tagName ?></a>
                        <?php } ?>
                    <?php } ?>
                </span>
            </div>
            <ul class="topic-meta right">
                <li class="topic-avatar">
                    <div class="user-image">
                        <a href="<?php echo $root ?>user/<?php echo $t['uid'] ?>">
                            <img class="avatar" height="60" src="<?php echo $t['avatar'] ?>" width="60" alt="<?php echo $t['username'] ?>">
                        </a>
                    </div>
                    <div class="user-tooltip">
                        <a href="<?php echo $root ?>user/<?php echo $t['uid'] ?>">
                            <img alt="<?php echo $t['username'] ?>" class="avatar avatar-big" src="<?php echo $t['avatar'] ?>">
                        </a>
                        <h3 class="user-nickname"><?php echo $t['username'] ?></h3>
                        <?php if ($t['signature'] != '') { ?>
                        <h4 class="user-title">签名：<?php echo $t['signature'] ?></h4>
                        <?php } ?>
                        <p class="user-bio"><?php echo $t['posttime'] ?> 发布</p>
                        <?php if ($t['client'] != '') { ?>
                        <p class="user-client">
                            （来自 <?php echo $t['client'] ?>）
                        </p>
                        <?php } ?>
                    </div>
                </li>
                <li class="topic-comment">
                    <div class="topic-comment-detail">
                        <a class="topic-comments" href="<?php echo $root ?>read/<?php echo $t['tid'] ?>#original">
                            <i class="icon icon-comment x2"></i> <?php echo $t['comments'] ?></span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <a class="topic-link" href="<?php echo $root ?>read/<?php echo $t['tid'] ?>" target="_blank"></a>
    </li>
    <?php } ?>
</ul>
<div id="pager">
    <?php if ($topicArray == array() ) { ?> 
        暂无数据 
    <?php }else{ ?> 
        <?php echo $page ?> 
    <?php } ?>
</div>