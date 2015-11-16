
<link rel="stylesheet" type="text/css" href="<?php echo $css ?>simditor.css" />
<script type="text/javascript" src="<?php echo $js ?>module.js"></script>
<script type="text/javascript" src="<?php echo $js ?>hotkeys.js"></script>
<script type="text/javascript" src="<?php echo $js ?>simditor.js"></script>

<script src="<?php echo $js ?>rebox.js"></script>
<script src="<?php echo $js ?>post.js"></script>

<section>
    <ol class="bz-breadcrumb">
        <li><a href="<?php echo $root ?>admin">管理中心</a></li>
        <li class="bz-active">帖子管理</li>
    </ol>

    <form method="post" id="form">
        <table class="bz-table">
            <thead>
                <tr>
                    <th width="30">TID</th>
                    <th>帖子标题</td>
                    <th>用户</td>
                    <th>发布时间</td>
                    <th width="140">操作</td>
                </tr>
            </thead>
            <tbody>
            <?php if(is_array($topicArray)) foreach($topicArray as $topic) { ?>
                <tr id="topic-<?php echo $topic['tid'] ?>">
                <td align="center">
                    <input type="checkbox" class="checkbox" name="tid[]" value="<?php echo $topic['tid'] ?>" />
                </td>
                <td align="left">
                    <a href="<?php echo $root ?>read/<?php echo $topic['tid'] ?>" title="<?php echo $topic['title'] ?>" target="_blank" style="white-space:nowrap; text-overflow:ellipsis; -o-text-overflow:ellipsis; overflow: hidden; max-width:600px; display:block;">
                        <?php echo $topic['title'] ?>
                    </a>
                </td>
                <td align="left">
                    <a href="<?php echo $root ?>user/<?php echo $topic['uid'] ?>" title="<?php echo $topic['username'] ?>" target="_blank" style="white-space:nowrap; text-overflow:ellipsis; -o-text-overflow:ellipsis; overflow: hidden;">
                        <?php echo $topic['username'] ?>
                    </a>
                </td>
                <td align="center">
                    <?php echo $topic['posttime'] ?>
                </td>
                <td align="center">
                    <a href="javascript:editTopicForm(<?php echo $topic['tid'] ?>);" class="bz-button bz-button-primary" title="编辑"><i class="iconfont icon-edit x2"></i></a>
                    <a href="javascript:delTopic(<?php echo $topic['tid'] ?>);" onclick="if(!(confirm('确定要删除吗？'))) return false;" class="bz-button bz-button-sm" title="删除" id="delTopic-<?php echo $topic['tid'] ?>"><i class="iconfont icon-shanchu x2"></i></a>
                </td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>
                        <input onclick="selectAll()" type="checkbox" name="controlAll" style="controlAll" id="controlAll"/>
                    </th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                        <a href="javascript:void(delAllTopic());" onclick="if(!(confirm('确定要删除所选吗？'))) return false;" class="bz-button bz-button-sm" style="font-weight: normal;"><i class="iconfont icon-shanchu x2"></i>删除所选</a>
                    </th>
                </tr>
            </tfoot>
        </table>
    </form>
    <div class="pagination">
        <?php if (empty($topicArray)) { ?>
            暂无数据
        <?php }else{ ?>
            <?php echo $page ?>
        <?php } ?>
    </div>
</section>
