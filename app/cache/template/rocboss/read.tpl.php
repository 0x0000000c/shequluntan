
<?php include $this->_include('_part_header.tpl.php', __FILE__) ?>
<link rel="stylesheet" type="text/css" href="<?php echo $css ?>rebox.css">
<script src="<?php echo $js ?>rebox.js"></script>
<script src="<?php echo $js ?>more.js"></script>
<?php if ($loginInfo['groupid'] == 9) { ?>
    <script src="<?php echo $js ?>manage.js"></script>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.view-content').rebox({ selector: '.picPre' });
        $('#original').rebox({ selector: '.reply-content .picPre' });
        $('#more').rebox({ selector: '.reply-content .picPre' });
        $('#more').more({'tid':'<?php echo $topicInfo['tid'] ?>', 'amount':'30', 'address': '<?php echo $root ?>getReplyList'});
    });
</script>
<div id="container">
    <div class="main-outlet container">
        <div class="content left">
            <div class="nav-head">
                <?php echo $topicInfo['title'] ?>
            </div>
            <ul>
            <li class="topic-view">
                <div class="topic-left">
                    <a href="<?php echo $root ?>user/<?php echo $topicInfo['uid'] ?>" class="avatar">
                        <img src="<?php echo $topicInfo['avatar'] ?>">
                    </a>
                </div>
                <div class="topic-body">
                    <p>
                        <span class="floor">
                            <span class="time">
                                <?php if ($topicInfo['client'] != '') { ?>
                                    <i class="icon icon-location"></i> <?php echo $topicInfo['client'] ?> &nbsp;&nbsp;
                                <?php } ?>
                                <i class="icon icon-time"></i> <?php echo $topicInfo['posttime'] ?>
                            </span>
                        </span>
                        <a href="<?php echo $root ?>user/<?php echo $topicInfo['uid'] ?>" class="nickname">
                            <?php echo $topicInfo['username'] ?>
                        </a>
                    </p>
                    <div class="view-content">
                        <?php echo $topicInfo['content'] ?>
                        <div class="clear"></div>
                        <?php if ($topicInfo['tagArray'] != array()) { ?>
                            <p class="showTag">
                            <?php if(is_array($topicInfo['tagArray'])) foreach($topicInfo['tagArray'] as $tagName) { ?>
                                <a href="<?php echo $root ?>tag/<?php echo $tagName ?>" class="tag"><?php echo $tagName ?></a>
                            <?php } ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="topicBottom">
                        <div class="right-admin x1">
                            <?php if ($loginInfo['uid'] > 0) { ?>
                                <a class="praiseTopic btn-circle right" href="javascript:praiseTopic(<?php echo $topicInfo['tid'] ?>, <?php echo $topicInfo['ispraise'] ?>);" tip-title="<?php if ($topicInfo['ispraise'] == 0) { ?>点赞<?php }else{ ?>取消赞<?php } ?>">
                                    <?php if ($topicInfo['ispraise'] == 0) { ?>
                                        <i class="icon icon-appreciate x2"></i>
                                    <?php }else{ ?>
                                        <i class="icon icon-appreciatefill x2"></i>
                                    <?php } ?>
                                </a>
                            <?php } ?>
                            <?php if ($loginInfo['uid'] > 0) { ?>
                                <a class="favorTopic btn-circle right" href="javascript:favorTopic(<?php echo $topicInfo['tid'] ?>, <?php echo $topicInfo['isfavorite'] ?>);" tip-title="<?php if ($topicInfo['isfavorite'] == 0) { ?>收藏<?php }else{ ?>取消收藏<?php } ?>">
                                    <?php if ($topicInfo['isfavorite'] == 0) { ?>
                                        <i class="icon icon-favor x2"></i>
                                    <?php }else{ ?>
                                        <i class="icon icon-favorfill x2"></i>
                                    <?php } ?>
                                </a>
                            <?php } ?>
                            <?php if ($loginInfo['groupid'] == 9) { ?>
                                <a class="topTopic btn-circle right" href="javascript:topTopic(<?php echo $topicInfo['tid'] ?>, <?php echo $topicInfo['istop'] ?>);" tip-title="<?php if ($topicInfo['istop'] == 0) { ?>置顶<?php }else{ ?>取消置顶<?php } ?>">
                                    <?php if ($topicInfo['istop'] == 0) { ?>
                                        <i class="icon icon-location x2"></i>
                                    <?php }else{ ?>
                                        <i class="icon icon-locationfill x2"></i>
                                    <?php } ?>
                                </a>
                                <a class="lockTopic btn-circle right" href="javascript:lockTopic(<?php echo $topicInfo['tid'] ?>, <?php echo $topicInfo['islock'] ?>);" tip-title="<?php if ($topicInfo['islock'] == 0) { ?>锁定<?php }else{ ?>解锁<?php } ?>">
                                    <?php if ($topicInfo['islock'] == 0) { ?>
                                        <i class="icon icon-unlock x2"></i>
                                    <?php }else{ ?>
                                        <i class="icon icon-lock x2"></i>
                                    <?php } ?>
                                </a>
                            <?php } ?>
                            <?php if ($loginInfo['uid'] == $topicInfo['uid'] || $loginInfo['groupid'] == 9) { ?>
                                <a class="deleteTopic btn-circle right" href="javascript:deleteTopic(<?php echo $topicInfo['tid'] ?>);" tip-title="连续点击删除帖子">
                                    <i class="icon icon-delete x2"></i>
                                </a>
                            <?php } ?>
                        </div>
                        <div class="clear"></div>
                        
                        <?php if ($topicInfo['praiseArray'] != array()) { ?>
                        <div class="topic-praise">
                            <span class="p-tips">以下用户赞了本帖</span>
                            <?php if(is_array($topicInfo['praiseArray'])) foreach($topicInfo['praiseArray'] as $c) { ?>
                            <a href="<?php echo $root ?>user/<?php echo $c['praiseUid'] ?>">
                                <img src="<?php echo $c['praiseAvatar'] ?>" title="<?php echo $c['praiseUsername'] ?>觉得很赞" alt="<?php echo $c['praiseUsername'] ?>" class="avatarC">
                            </a>
                            <?php } ?>
                        </div>
                        <?php }else{ ?>
                        <div class="topic-praise" style="display: none;">
                            <span class="p-tips">以下用户赞了本帖</span>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="clear"></div>
                </div>
                </li>


                <div id="original">
                    <?php if(is_array($replyList)) foreach($replyList as $reply) { ?>
                    <div class="reply-list" id="d-reply-<?php echo $reply['pid'] ?>">
                        <span class="pid" id="reply-<?php echo $reply['pid'] ?>" data-username="<?php echo $reply['username'] ?>"></span>
                        <div class="reply-left">
                            <a href="<?php echo $root ?>user/<?php echo $reply['uid'] ?>" class="uid">
                                <img src="<?php echo $reply['avatar'] ?>" alt="<?php echo $reply['username'] ?>" class="avatar">
                            </a>
                        </div>
                        <div class="reply-content">
                            <div class="reply-detail">
                                <span class="content"><?php echo $reply['content'] ?></span>
                            </div>
                            <div class="reply-bottom">
                                <span class="reply-bottom-span">
                                    <a href="<?php echo $root ?>user/<?php echo $reply['uid'] ?>" class="uid">
                                        <span class="username"><?php echo $reply['username'] ?></span>
                                    </a>
                                </span>
                                <?php if ($reply['client'] != '') { ?>
                                <span class="client reply-bottom-span">
                                    <i class="icon icon-location"></i> <?php echo $reply['client'] ?>
                                </span>
                                <?php } ?>
                                <span class="posttime reply-bottom-span">
                                    <i class="icon icon-time"></i> <?php echo $reply['posttime'] ?>
                                </span>
                                <?php if ($reply['uid'] == $loginInfo['uid'] || $loginInfo['groupid'] == 9) { ?>
                                <span class="reply-admin right">
                                    <a class="deleteReply" href="javascript:deleteReply(<?php echo $reply['pid'] ?>);">
                                        <i class="icon icon-delete x1"></i>删除
                                    </a>
                                </span>
                                <?php } ?>
                                <?php if ($loginInfo['uid'] > 0) { ?>
                                <a class="showFloorReply right" href="javascript:showFloorReply(<?php echo $reply['pid'] ?>, '@<?php echo $reply['username'] ?> ');">
                                    <i class="icon icon-forward x1"></i>评论
                                </a>
                                <?php } ?>
                                <span class="floor right" id="floor-more-<?php echo $reply['pid'] ?>">
                                <?php if (!empty($reply['floor'])) { ?>
                                    <?php if(is_array($reply['floor'])) foreach($reply['floor'] as $floor) { ?>
                                        <div id="floor-list-<?php echo $floor['floorId'] ?>" class="floor-list">
                                            <span class="floor-avatar">
                                                <a href="<?php echo $root ?>user/<?php echo $floor['floorUid'] ?>">
                                                    <img src="<?php echo $floor['avatar'] ?>">
                                                </a>
                                            </span>
                                            <span class="floor-username">
                                                <a href="<?php echo $root ?>user/<?php echo $floor['floorUid'] ?>">
                                                    <?php echo $floor['floorUser'] ?>
                                                </a>
                                            </span>
                                            <span class="floor-admin right">
                                                <?php if ($floor['floorUid'] != $loginInfo['uid'] && $loginInfo['uid'] > 0) { ?>
                                                <a href="javascript:showFloorReply(<?php echo $floor['floorPid'] ?>,'@<?php echo $floor['floorUser'] ?> ');" title="回复TA">
                                                    <i class="icon icon-forward x1"></i>回复
                                                </a>
                                                <?php } ?>
                                                <?php if ($floor['floorUid'] == $loginInfo['uid'] || $loginInfo['groupid'] == 9) { ?>
                                                <a class="delete-btn" href="javascript:deleteFloor(<?php echo $floor['floorId'] ?>);">
                                                    <i class="icon icon-delete x1"></i>删除
                                                </a>
                                                <?php } ?>
                                            </span>
                                            <span class="floor-time right"><?php echo $floor['floorTime'] ?></span>
                                            <div class="clear"></div>
                                            <span class="floor-content"><?php echo $floor['floorContent'] ?></span>
                                        </div>
                                    <?php } ?>
                                    <div class="floor-more">
                                        <?php if (count($reply['floor']) >= 5) { ?>
                                            <a href="javascript:getMoreFloor(<?php echo $reply['pid'] ?>, 1);">
                                                <i class="icon icon-unfold x1"></i> 点击加载更多评论
                                            </a>
                                        <?php }else{ ?>
                                            已加载全部评论
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                
                <div id="more">
                    <a href="javascript:;" class="get_more"><i class="icon icon-unfold x2"></i> 点击加载更多回复</a>
                    <div class="reply-list" root-user-data="<?php echo $root ?>user/">
                        <span class="pid"></span>
                        <div class="reply-left">
                            <a href="" class="uid">
                                <img src="" alt="" class="avatar"/>
                            </a>
                        </div>
                        <div class="reply-content">
                            <div class="reply-detail">
                                <span class="content"></span>
                            </div>
                            <div class="reply-bottom">
                                <span class="reply-bottom-span">
                                    <a href="" class="uid">
                                        <span class="username"></span>
                                    </a>
                                </span>
                                <span class="client reply-bottom-span"></span>
                                <span class="posttime reply-bottom-span"></span>
                                <span class="reply-admin right"></span>
                                <?php if ($loginInfo['uid'] > 0) { ?>
                                    <a class="showFloorReply right"><i class="icon icon-forward x1"></i>评论</a>
                                <?php } ?>
                                <span class="floor right"></span>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="clear"></div>
                <?php include $this->_include('_part_reply_post.tpl.php', __FILE__) ?>
            </ul>
        </div>
        <div class="side">
            <?php include $this->_include('_part_side.tpl.php', __FILE__) ?>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php include $this->_include('_part_footer.tpl.php', __FILE__) ?>